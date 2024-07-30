<?php

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('task_index', function () {
    $task = Task::factory()->create();

    $response = $this->get(route('task.index'));

    $response->assertStatus(200);
    $response->assertSeeText('Job Ecomail');
    $response->assertSeeText($task->name);
});

test('task_create', function () {
    $response = $this->get(route('task.create'));

    $response->assertStatus(200);
    $response->assertSeeText('Task name');
});

test('task_store', function () {
    $taskName = fake()->name;
    $tasksCount = Task::withTrashed()->where('name', '=', $taskName)->count();
    $this->assertSame(0, $tasksCount);

    $response = $this->post(route('task.store'), [
        'name' => $taskName,
        'description' => 'test description',
        'priority' => "7",
        'target_date' => '07/30/2024',
        'finished_at' => "",
    ]);

    $response->assertRedirect();

    $tasksCountNew = Task::withTrashed()->where('name', '=', $taskName)->count();
    $this->assertSame(1, $tasksCountNew);
});

test('task_edit', function () {
    $task = Task::factory()->create();
    $response = $this->get(route('task.edit', $task));

    $response->assertStatus(200);
    $response->assertSeeText('Task name');
});

test('task_update', function () {
    $task = Task::factory()->create();

    $taskNewName = fake()->name;

    $tasksNewCount = Task::withTrashed()->where('name', '=', $taskNewName)->count();
    $this->assertSame(0, $tasksNewCount);

    $tasksOldCount = Task::withTrashed()->where('name', '=', $task->name)->count();
    $this->assertSame(1, $tasksOldCount);

    $response = $this->put(route('task.update', $task), [
        'name' => $taskNewName,
        'description' => 'test description',
        'priority' => "7",
        'target_date' => '07/30/2024',
        'finished_at' => "",
    ]);

    $response->assertRedirect();


    $tasksNewCount = Task::withTrashed()->where('name', '=', $taskNewName)->count();
    $this->assertSame(1, $tasksNewCount);

    $tasksOldCount = Task::withTrashed()->where('name', '=', $task->name)->count();
    $this->assertSame(0, $tasksOldCount);
});

test('task_delete', function () {
    $task = Task::factory()->create();

    $response = $this->get(route('task.delete', $task));
    $response->assertRedirect();

    $this->assertSoftDeleted($task);
});
