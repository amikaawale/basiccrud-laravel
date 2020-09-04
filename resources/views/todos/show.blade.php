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

      <div class="panel flat-panel">
          <div class="panel-body">

              <table class="table table-bordered">
                  <tr>
                      <td>Title</td>
                      <td>{{ $todo->title }}</td>
                  </tr>
                  <tr>
                      <td>Description</td>
                      <td>{{ $todo->description }}</td>
                  </tr>
                  @if(count($todo->steps))
                  <tr>
                      <td>Todo Steps</td>
                      <td>
                          <ul>
                              @foreach($todo->steps as $step)
                                  <li>{{ $step->name }}</li>
                              @endforeach
                          </ul>
                      </td>
                  </tr>
                  @endif
              </table>
          </div>
      </div>

    </div>



@endsection

