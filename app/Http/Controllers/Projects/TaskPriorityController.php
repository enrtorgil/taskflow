<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\TaskPriority;
use Illuminate\Http\Request;

class TaskPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('task_priorities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskPriority $taskPriority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskPriority $taskPriority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskPriority $taskPriority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskPriority $taskPriority)
    {
        //
    }
}
