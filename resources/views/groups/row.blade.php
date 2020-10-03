<tr>
    <td>{{ $group->number }}</td>
    <td>{{ $group->course }}</td>
    <td>{{ $group->faculty }}</td>
    <td>{{ $group->students_count }}</td>
    <td>
        {{ Form::open([
            'method' => 'DELETE',
            'route' => ['groups.destroy', 'group' => $group],
        ]) }}
        <a href="{{ route('groups.edit', ['group' => $group]) }}"
           class="btn btn-primary btn-sm">
            <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
        </a>
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-pencil-alt"></i> {{ __('Delete') }}
        </button>
        {{ Form::close() }}
    </td>
</tr>
