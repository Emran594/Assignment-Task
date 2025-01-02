<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ManagerController extends Controller
{
    public function index(){
        $employee = User::where('role', '!=' ,'manager')->count();
        $projects = Project::count();
        $tasks = Task::count();
        $pendingTask = Task::where('status','pending')->count();
        $doneTask = Task::where('status','done')->count();
        return view('manager/dashboard',compact('employee','projects','tasks','pendingTask','doneTask'));
    }
}
