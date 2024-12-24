<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeammateController extends Controller
{
    public function team(){
        return view('teammate.dashboard');
    }
    
    public function index(){
        $teammates = User::where('role', 'teammate')->get();
        return view('teammate.page',compact('teammates'));
    }
     public function create()
    {
        return view('teammate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'employee_id' => 'required|unique:users',
            'position' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'position' => $request->position,
            'password' => Hash::make($request->password),
            'role' => 'teammate', // Assign the teammate role
        ]);

        return redirect()->route('teammates.index')->with('success', 'Teammate added successfully.');
    }
    
    public function edit($id){
        $teammate = User::find($id);
        return view('teammate.edit',compact('teammate'));
    }
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'employee_id' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        // Find the teammate by ID
        $teammate = User::findOrFail($id);

        // Update teammate details
        $teammate->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'employee_id' => $request->input('employee_id'),
            'position' => $request->input('position'),
        ]);

        // Redirect back with a success message
        return redirect()->route('teammates.index')->with('success', 'Teammate updated successfully.');
    }

    public function destroy($id)
{
    $teammate = User::findOrFail($id);

    $teammate->delete();
    return redirect()->route('teammates.index')->with('success', 'Teammate deleted successfully.');
}

    public function tasklist(Request $request){
        $query = Task::with(['project', 'teammate']);

        // Apply filters for Project
        if ($request->has('project_id') && $request->project_id) {
            $query->where('project_id', $request->project_id);
        }
    
        // Apply filters for Status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
    
        // For teammates, filter only their tasks
        if (auth()->user()->role === 'teammate') {
            $query->where('teammate_id', auth()->id());
        }
    
        $tasks = $query->get();
        $projects = Project::all(); // For the project dropdown filter
        return view('teammate.tasklist',compact('tasks','projects'));
    }

    public function updateStatus(Request $request, Task $task)
{
    $request->validate([
        'status' => 'required|in:Pending,Working,Done',
    ]);

    if ($task->teammate_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    $task->update(['status' => $request->status]);

    return redirect()->route('teammate.tasklist')->with('success', 'Task status updated successfully!');
}


    
}
