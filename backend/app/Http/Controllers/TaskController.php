<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:15',
            'description' => 'required|string|max:35',
            'due_date' => 'required|date_format:Y-m-d H:i|after:now'
        ]);

        $fields['user_id'] = 4;
        $fields['status'] = 'active';

        Task::create($fields);

        return [
            'message' => 'The task has been added'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:15',
            'description' => 'required|string|max:35',
            'due_date' => 'required|date_format:Y-m-d H:i|after:now',
        ]);

        $task->update($fields);

        return [
            'message' => 'Task has been updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return [
            'message' => 'The task has been deleted'
        ];
    }
}
