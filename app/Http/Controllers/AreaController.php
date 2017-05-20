<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::paginate(10);
        return view('area.index',compact('areas'));
    }

    public function store(Request $request)
    {

        //validate form
        $this->validate($request, [
            'name' => 'required|min:2|max:255'
        ]);
        $data = $request->all();
        Area::create($data);
        $notification= array('title' => 'Data Store', 'body' => 'Area created Successfully');
        return redirect()->route('area.index')->with('success',$notification);
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        $notification= array('title' => 'Data Remove', 'body' => 'Area deleted Successfully');
        return redirect()->route('area.index')->with('success',$notification);
    }

}
