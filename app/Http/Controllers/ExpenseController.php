<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\ExpenseItem;
use Carbon\Carbon;
use DB;
class ExpenseController extends Controller
{
    public function create()
    {

        $today = Carbon::today();        
        $expenseTotal = Expense::count()+1;
        $expenseNo = "E";
        if($expenseTotal<10){
            $expenseNo .= "00".(string)$expenseTotal;
        }
        elseif($expenseTotal<100){
            $expenseNo .= "0".(string)$expenseTotal;
        }
        else{
            $expenseNo .= (string)$expenseTotal;
        }
        return view('expense.create',compact('today','expenseNo'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'projects_id' => 'required|integer',
            'expenseNo' => 'required',
            'entryDate' => 'required',
            'items' => 'required',
            'amounts' => 'required'
        ]);

        $items = $request->get('items');
        $amounts = $request->get('amounts');
        $data = $request->all();
        $data['users_id'] = auth()->user()->id;

        DB::beginTransaction();
        try {
            try {
                $expense = Expense::create($data);
            }catch(\Exception $e)
            {
                DB::rollback();
                throw $e;
            }

            $totalAmount = 0;
            $dataItems = [];
            foreach ($items as $index => $item){
                $dataItem = [
                    'expenses_id' => $expense->id,
                    'name' => $item,
                    'amount' => $amounts[$index]
                ];
                $totalAmount += $amounts[$index];
                array_push($dataItems,$dataItem);
            }
            $expense->amount = $totalAmount;
            $expense->save();

            try{
                ExpenseItem::insert($dataItems);
            }catch(\Exception $e)
            {
                DB::rollback();
                throw $e;
            }

        }
        catch(\Exception $e){
            $trimmed = str_replace(array("\r", "\n","'","`"), ' ', $e->getMessage());
            $notification= array('title' => 'Data Store Failed', 'body' => $trimmed);
            return redirect()->route('expense.create')->with("error",$notification);
        }
        DB::commit();

        $notification= array('title' => 'Data Store', 'body' => 'Expense added successfully');
        return redirect()->route('expense.create')->with('success',$notification);
    }

    public function index()
    {
        $expenses = Expense::orderBy('entryDate','desc')->with('project')->with('entry')->paginate(10);
        return view('expense.index',compact('expenses'));
    }

    public function show($id)
    {
        $expense = Expense::with('item')->findOrFail($id);
        return $expense;
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        $notification= array('title' => 'Data Remove', 'body' => 'Expense deleted Successfully');
        return redirect()->route('expense.index')->with('success',$notification);
    }


}
