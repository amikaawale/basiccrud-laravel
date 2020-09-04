@extends('layouts.admin')


@section('breadcrumb')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('todo.create') }}" class="btn btn-link btn-float has-text">
                        <i class="icon-add text-primary"></i><span>Create New</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Todos</li>
                <li class="active">List</li>
            </ul>
        </div>
    </div>


@endsection

@section('content')

    <div class="panel">
        <div class="panel-body">
                    @if($todos)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="bg-blue">
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($todos as $todo)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $todo->title }}</td>
                            <td>
                                <a href="{{ route('todo.edit',['todo'=>$todo->id]) }}" class="text-blue" title="Edit"><i class="icon-pencil7"></i></a>

                                <a onclick="event.preventDefault();
                                                if(confirm('Are you sure')){
                                                document.getElementById('form-delete-{{ $todo->id }}').submit()
                                                }"
                                        class="text-danger" title="Delete"><i class="icon-trash"></i>
                                </a>
                                <form style="display: none;" id="{{ 'form-delete-'.$todo->id }}" method="post" action="{{ route('todo.delete',$todo->id) }}">
                                    @csrf
                                    @method('delete')
                                </form>

                                @include('todos.complete')

                                <a href="{{ route('todo.show',['todo'=>$todo->id]) }}" class="text-green" title="Edit"><i class="icon-eye"></i></a>


                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No Todos available.Create one.</p>
            @endif
        </div>
    </div>


@endsection