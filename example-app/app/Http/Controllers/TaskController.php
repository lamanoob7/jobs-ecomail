<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::orderBy('priority')
                    ->orderBy('target_date')
                    ->orderBy('name')
                    ->paginate(15);
        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form to create a new task.
     */
    public function create(): View
    {
        return view('task.create');
    }

    /**
     * Store a new task.
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->target_date = $request->target_date;
        $task->finished_at = $request->finished_at;
        $task->save();

        return to_route('task.index', ['task' => $task->id]);
    }

    /**
     * Show the form to edit a new task.
     */
    public function edit(string $id): View
    {
        return view('task.edit', [
            'task' => Task::findOrFail($id)
        ]);
    }

    /**
     * Update a task.
     */
    public function update(StoreTaskRequest $request, string $id): RedirectResponse
    {
        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->target_date = $request->target_date;
        $task->finished_at = $request->finished_at;
        $task->save();

        return to_route('task.index', ['task' => $task->id]);
    }

    /**
     * Soft delete task.
     */
    public function delete(string $id): RedirectResponse
    {
        $task = Task::find($id);
        if($task  && !$task->trashed()){
            $task->deleted_at = Carbon::now();
            $task->save();
        }

        return to_route('task.index', ['task' => $task->id]);
    }
}
