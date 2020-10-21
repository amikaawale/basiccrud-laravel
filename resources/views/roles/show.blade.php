@extends('layouts.admin')


@section('breadcrumb')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('roles.index') }}" class="btn btn-link btn-float has-text">
                        <i class="icon-list text-primary"></i><span>List Roles</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Role</li>
                <li class="active">{{ $role->name }}</li>
            </ul>
        </div>
    </div>


@endsection

@section('content')

    <div class="panel">
        <div class="panel-body">
            <div class="card">
                <div class="card-header">
                    <h3>Name: {{$role['name']}}</h3>
                    <h4>Slug: {{$role['slug']}}</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Permissions</h5>
                    <p class="card-text">
                        @if ($role->permissions != null)

                            @foreach ($role->permissions as $permission)
                                <span class="label label-default">
                                    {{ $permission->name }}
                                </span>
                            @endforeach

                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>


@endsection
