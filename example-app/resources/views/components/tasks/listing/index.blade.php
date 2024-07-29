{{-- @each('view.name', $jobs, 'job', 'view.empty') --}}
@foreach ($tasks as $task)
    <x-tasks-listing-item :$task />
@endforeach

@empty($tasks)
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        <p>No set task</p>
    </div>
@endempty
