<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Project;
use App\Area;

class ProjectController extends Controller
{
    public function create()
    {
        $areas = Area::pluck('name','id');
        $today = Carbon::today();
        return view('project.create',compact('areas','today'));
    }
    public function store(Request $request)
    {

        //validate form
        $this->validate($request, [
            'projectId' => 'required|min:2|max:255',
            'projectType' => 'required',
            'name' => 'required|min:2|max:255',
            'entryDate' => 'required',
            'areas_id' => 'required',
            'address' => 'required|min:2|max:500',
            'description' => 'max:1000',
            'storied' => 'required|min:2|max:500',
            'noOfUnits' => 'required|numeric',
            'noOfFloor' => 'required|numeric',
            'noOfCarParking' => 'required|numeric',
            'unitSize' => 'required|numeric',
            'lift' => 'required',
            'generator' => 'required',
        ]);
        $data = $request->all();
        $data['users_id'] = auth()->user()->id;
        Project::create($data);
        $notification= array('title' => 'Data Store', 'body' => 'Project created Successfully');
        return redirect()->route('project.index')->with('success',$notification);
    }

    public function index()
    {
        $projects = Project::orderBy('id','asc')->with('area')->paginate(10);
        return view('project.index',compact('projects'));
    }

    public function show($id)
    {
        $project = Project::with('entry')->findOrFail($id);
        return $project;
    }
    public function edit($id)
    {
        $areas = Area::pluck('name','id');
        $project = Project::findOrFail($id);
        return view('project.edit',compact('project','areas'));
    }
    public function update(Request $request,$id)
    {
        //validate form
        $this->validate($request, [
            'projectId' => 'required|min:2|max:255',
            'projectType' => 'required',
            'name' => 'required|min:2|max:255',
            'entryDate' => 'required',
            'areas_id' => 'required',
            'address' => 'required|min:2|max:500',
            'description' => 'max:1000',
            'storied' => 'required|min:2|max:500',
            'noOfUnits' => 'required|numeric',
            'noOfFloor' => 'required|numeric',
            'noOfCarParking' => 'required|numeric',
            'unitSize' => 'required|numeric',
            'lift' => 'required',
            'generator' => 'required',
        ]);
        $project = Project::findOrFail($id);
        $project->fill($request->all())->update();
        $notification= array('title' => 'Data Update', 'body' => 'Project updated Successfully');
        return redirect()->route('project.index')->with('success',$notification);;
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        $notification= array('title' => 'Data Remove', 'body' => 'Project deleted Successfully');
        return redirect()->route('project.index')->with('success',$notification);
    }

}
