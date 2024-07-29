
<table class="table text-grey-darkest">
    <thead class="bg-grey-dark text-white text-normal">
    <tr>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Priority</th>
        <th scope="col">Target Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $task)
        @include('components.tasks.listing.item', ['task' => $task])
    @endforeach
    </tbody>
</table>

{{ $tasks->onEachSide(3)->links() }}

@empty($tasks)
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        <p>No set task</p>
    </div>
@endempty
