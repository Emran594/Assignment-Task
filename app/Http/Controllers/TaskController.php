<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::with(['project', 'teammate']);
    
        // Apply filters for Project
        if ($request->has('project_id') && $request->project_id) {
            $query->where('project_id', $request->project_id);
        }
    
        // Apply filters for Status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
    
        // Apply filters for Teammate
        if ($request->has('teammate_id') && $request->teammate_id) {
            $query->where('teammate_id', $request->teammate_id);
        }
    
        // For teammates, filter only their tasks
        if (auth()->user()->role === 'teammate') {
            $query->where('teammate_id', auth()->id());
        }
    
        $tasks = $query->get();
        $projects = Project::all(); // For project dropdown filter
        $teammates = User::where('role', 'teammate')->get(); // For teammate dropdown filter
    
        return view('tasks.index', compact('tasks', 'projects', 'teammates'));
    }
    
     public function create()
    {
        $projects = Project::all();
        $teammates = User::where('role', 'teammate')->get();
        return view('tasks.create', compact('projects', 'teammates'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'teammate_id' => 'nullable|exists:users,id',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Working,Done',
        ]);
    
        Task::create($request->all());
    
        return redirect()->route('tasks.index')->with('success', 'Task assigned successfully!');
    }
    
    public function edit($id){
        // $project = Project::find($id);
        // return view('projects.edit',compact('project'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'project_code' => 'required|string|unique:projects,project_code',
        ]);

        // $project = Project::findOrFail($id);

        // $project->update([
        //     'name' =>$request->input('name'),
        //     'project_code' => $request->input('project_code'),
        // ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        // $project = Project::findOrFail($id);

        // $project->delete();
        // return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }


}
