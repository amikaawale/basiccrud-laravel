@extends('layouts.admin')


@section('breadcrumb')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('todo.index') }}" class="btn btn-link btn-float has-text">
                        <i class="icon-list text-primary"></i><span>Todo List</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">
                    <a href="{{ route('todo.index') }}">Todos</a>
                </li>
                <li class="active">{{ $todo->title }}</li>
            </ul>
        </div>
    </div>


@endsection





@section('content')

    <div class="row">


        <form action="{{ route('todo.update',$todo->id) }}" method="post" class="py-5">
            @csrf
            @method('patch')

            <div class="col-md-6">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Basic Description<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $todo->description }}</textarea>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                @livewire('edit-step',['steps' => $todo->steps])
            </div>

            <div class="col-md-12">
                <input type="submit" value="Update" class="btn btn-primary float-right">
            </div>

        </form>

    </div>


@endsection

