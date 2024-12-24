<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request){
        $query = Project::where('manager_id', auth()->id());

        if ($request->has('name') && $request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
    
        $projects = $query->get();
    
        return view('projects.index', compact('projects'));
    }
     public function create()
    {
       return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'project_code' => 'required|string|unique:projects,project_code',
        ]);
    
        $validatedData['manager_id'] = Auth::id();
    
        // Create the project
        $project = Project::create($validatedData);
    
        return redirect()->route('projects.index')->with('success', 'Project Added successfully.');
    }
    
    public function edit($id){
        $project = Project::find($id);
        return view('projects.edit',compact('project'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'project_code' => 'required|string|unique:projects,project_code',
        ]);

        $project = Project::findOrFail($id);

        $project->update([
            'name' =>$request->input('name'),
            'project_code' => $request->input('project_code'),
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
