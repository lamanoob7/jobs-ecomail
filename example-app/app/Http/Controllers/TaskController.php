<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('task.index', ['tasks' => Task::paginate(20)]);
    }

    /**
     * Show the form to create a new blog post.
     */
    public function create(): View
    {
        return view('task.create');
    }

    /**
     * Store a new blog post.
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->target_date = $request->target_date;
        $task->finished_at = $request->finished_at;
        $task->save();

        return to_route('task.index', ['task' => $task->id]);
    }
}
