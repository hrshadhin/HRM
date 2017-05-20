<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Flat;
use App\MyNotify;

class FlatController extends Controller
{
    public function create()
    {
        $floors = [
          '-1' => 'Basement',
          '0' => 'Ground',
          '1' => '1st',
          '2' => '2nd',
          '3' => '3rd',
          '4' => '4th',
          '5' => '5th',
          '6' => '6th',
          '7' => '7th',
          '8' => '8th',
          '9' => '9th',
          '10' => '10th',
          '11' => '11th',
          '12' => '12th',
          '13' => '13th',
          '14' => '14th',
          '15' => '15th',
          '16' => '16th',
          '17' => '17th',
          '18' => '18th',
          '19' => '19th',
          '20' => '20th',
          '21' => '21th',
          '22' => '22th',
          '23' => '23th',
          '24' => '24th',
          '25' => '25th',
          '26' => '26th',
          '27' => '27th',
          '28' => '28th',
          '29' => '29th',
          '30' => '30th'
        ];
        $types = [
          '1' => 'A',
          '2' => 'B',
          '3' => 'C',
          '4' => 'D',
          '5' => 'E',
          '6' => 'F',
          '7' => 'G',
          '8' => 'H',
          '9' => 'I',
          '10' => 'J',
          '11' => 'K',
          '12' => 'L'
        ];
        $today = Carbon::today();
        return view('flat.create',compact('today','floors','types'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'projects_id' => 'required',
            'entryDate' => 'required',
            'floor' => 'required',
            'type' => 'required',
            'size' => 'required',
            'parking' => 'required',
        ]);
        $data = $request->all();
        $data['users_id'] = auth()->user()->id;
        Flat::create($data);
        //notification code
        $project = Project::where('id',$data['projects_id'])->first();
        $myNoti = new MyNotify();
        $myNoti->title = $project->name;
        $myNoti->value = $data['description'];
        $myNoti->notiType = "tolet";
        $myNoti->save();
        //end mynoti
        $notification= array('title' => 'Data Store', 'body' => 'Flat allocated Successfully');
        return redirect()->route('flat.index')->with('success',$notification);
    }

    public function index()
    {
        $flats = Flat::orderBy('id','asc')->with('project')->with('entry')->paginate(10);
        return view('flat.index',compact('flats'));
    }
    public function show($id)
    {
        $flat = flat::with('entry')->findOrFail($id);
        return $flat;
    }
    public function edit($id)
    {
        $flat = Flat::findOrFail($id);
        return view('flat.edit',compact('flat'));
    }
    public function update(Request $request,$id)
    {
        //validate form
        $this->validate($request, [
            'parking' => 'required'
        ]);
        $flat = Flat::findOrFail($id);
        $flat->parking = $request->get('parking');
        if($request->get('parking')=="Yes"){
            $flat->parkingNo = $request->get('parkingNo');
        }
        $flat->save();
        if((int)$request->get('status')==0){
            //notification code
            $project = Project::where('id',$flat->projects_id)->first();
            $myNoti = new MyNotify();
            $myNoti->title = $project->name;
            $myNoti->value = $flat->description;
            $myNoti->notiType = "tolet";
            $myNoti->save();
            //end mynoti
        }
        $notification= array('title' => 'Data Update', 'body' => 'Flat updated Successfully');
        return redirect()->route('flat.index')->with('success',$notification);
    }
    public function destroy($id)
    {
        $flat = Flat::findOrFail($id);
        $flat->delete();
        $notification= array('title' => 'Data Remove', 'body' => 'Flat deleted Successfully');
        return redirect()->route('flat.index')->with('success',$notification);
    }

    public function flatByProject($project)
    {
        return Flat::select('id','description AS value')->where('projects_id',$project)->where('status',0)->get();

    }



}
