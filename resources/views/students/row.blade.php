<tr>
    <td>{{ $student->fullName }}</td>
    <td>{{ $student->birthday->format('d.m.Y') }}</td>
    <td>
        @isset($student->group)
        <a href="{{ route('students.index', ['search' => $student->group->number]) }}">
            {{ $student->group->number }}
        </a>
        @endisset
    </td>
    <td>
        {{ Form::open([
            'method' => 'DELETE',
            'route' => ['students.destroy', 'student' => $student],
        ]) }}
        <a href="{{ route('students.edit', ['student' => $student]) }}"
           class="btn btn-primary btn-sm">
            <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
        </a>
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-pencil-alt"></i> {{ __('Delete') }}
        </button>
        {{ Form::close() }}
    </td>
</tr>
