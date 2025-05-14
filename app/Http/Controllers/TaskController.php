<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Fetch all tasks
        return response()->json(Task::all());
    }

public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|string|in:pending,completed',
                'priority' => 'required|string|in:low,medium,high',
                'order' => 'required|integer',
            ]);

            try {
                $task = Task::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->status,
                    'priority' => $request->priority,
                    'order' => $request->order,
                    'user_id' => auth()->user()->id,  // Assumes the user is authenticated
                ]);

                return response()->json($task, 201);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Task creation failed', 'message' => $e->getMessage()], 500);
            }
        }

    public function show($id)
    {
        // Show a single task
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        // Update task
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return response()->json($task);
    }

    public function destroy($id)
    {
        // Delete a task
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
}
