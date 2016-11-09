<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Project;

class ProjectController extends Controller
{
    public function create()
    {
        return view('project.create');
    }
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'area' => 'required',
            'plotNo' => 'required|min:2|max:50',
            'roadNo' => 'required|min:2|max:50',
            'sectorNo' => 'required|min:2|max:50',
            'address' => 'required|min:2|max:255',
            'serialNo' => 'required|min:2|max:50',
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:2|max:65535',
        ]);
        Project::create($request->all());
        return redirect()->route('project.index');
    }

    public function index()
    {
        $projects = Project::orderBy('id','asc')->paginate(5);
        return view('project.index',compact('projects'));
    }
    public function edit($id)
    {
        $areas = [
            'Dhanmondi' => 'Dhanmondi',
            'Gulshan' => 'Gulshan',
            'Jatrabari' => 'Jatrabari',
            'Khilkhet' => 'Khilkhet',
            'Mohammadpur' => 'Mohammadpur',
            'Savar' => 'Savar',
            'Uttara' => 'Uttara'
        ];
        $project = Project::findOrFail($id);
        return view('project.edit',compact('project','areas'));
    }
    public function update(Request $request,$id)
    {
        //validate form
        $this->validate($request, [
            'area' => 'required',
            'plotNo' => 'required|min:2|max:50',
            'roadNo' => 'required|min:2|max:50',
            'sectorNo' => 'required|min:2|max:50',
            'address' => 'required|min:2|max:255',
            'serialNo' => 'required|min:2|max:50',
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:2|max:65535',
        ]);
        $project = Project::findOrFail($id);
        $project->fill($request->all())->update();
        return redirect()->route('project.index');
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('project.index');
    }

}
