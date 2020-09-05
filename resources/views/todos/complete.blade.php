@if($todo->completed)

    <a onclick="event.preventDefault(); if(confirm('Are you sure?')){ document.getElementById('form-incomple-{{ $todo->id }}').submit()}"
          class="text-green" title="Mark As Incomplete"><i class="icon-check"></i> </a>
    <form style="display: none;" id="{{ 'form-incomple-'.$todo->id }}" method="post" action="{{ route('todo.incomplete',$todo->id) }}">

        @csrf
        @method('put')

    </form>

@else
    <a onclick="event.preventDefault(); if(confirm('Are you sure?')){ document.getElementById('form-comple-{{ $todo->id }}').submit()}"
          class="text-grey" title="Mark As Complete"><i class="icon-check"></i></a>
    <form style="display: none;" id="{{ 'form-comple-'.$todo->id }}" method="post" action="{{ route('todo.complete',$todo->id) }}">

        @csrf
        @method('put')

    </form>

@endif