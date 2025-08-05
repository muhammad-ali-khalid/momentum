<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::where('user_id', auth()->id())->get();
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

        $fields['status'] = 'active';

        $task = $request->user()->tasks()->create($fields);

        return ['task' => $task, 'time' => now()];
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        Gate::authorize('access', $task);

        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        Gate::authorize('access', $task);

        $fields = $request->validate([
            'title' => 'string|max:15',
            'description' => 'string|max:35',
            'due_date' => 'date_format:Y-m-d H:i|after:now',
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
        Gate::authorize('access', $task);

        $task->delete();

        return [
            'message' => 'The task has been deleted'
        ];
    }
}
