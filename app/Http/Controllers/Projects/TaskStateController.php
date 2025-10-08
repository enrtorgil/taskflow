<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\TaskState;
use Illuminate\Http\Request;

class TaskStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('task_states.index');
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
    public function show(TaskState $taskState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskState $taskState)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskState $taskState)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskState $taskState)
    {
        //
    }
}
