<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller{
    public function indx()
    {

        $user = auth()->user();
        $tasks = Task::where('user_id', $user->id)
            ->orderBy('completed_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(){
        request()->validate([
            'description' => 'required|max:255',
        ]);

        $task = new Task();
        $task->description = request('description');
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect('/');
    }

    public function update($id){
        $task = Task::where('id',$id)->first();

        $task->completed_at = now();
        $task->save();
        return redirect('/');
    }

    public function delete($id){
        $task = Task::where('id',$id)->first();

        $task->delete();
        return redirect('/');
    }
}
