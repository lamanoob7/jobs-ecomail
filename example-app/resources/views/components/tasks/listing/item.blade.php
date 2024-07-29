<tr>
    <th scope="row">
        <a class="" href="{{ route('task.edit', $task) }}">Edit</a>

    </th>
    <td>
        {{ $task->name }}
    </td>
    <td>{{ $task->priority }}</td>
    <td>{{ $task->target_date->format('d. m. Y') }}</td>
</tr>
