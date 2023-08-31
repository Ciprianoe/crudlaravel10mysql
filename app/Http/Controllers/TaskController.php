<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {   
      // $tasks = Task::latest()->get();  
        $tasks = Task::latest()->paginate(3);     
        return view('tasks.index',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'due_date'=>'required',
            'status'=>'required',
        ]);
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task):View
    {
      
        //dd($tasks);
        return view('tasks.edit', ['task'=> $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task):RedirectResponse
    
    {
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada sin problemas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('warning', 'Tarea '. $task->id .' eliminada');

    }
}
