@extends('layouts.admin')


@section('breadcrumb')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('roles.index') }}" class="btn btn-link btn-float has-text">
                        <i class="icon-add text-primary"></i><span>List Roles</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Roles</li>
                <li class="active">Create</li>
            </ul>
        </div>
    </div>


@endsection

@section('content')

    <div class="panel">
        <div class="panel-body">
              <h2>Add New Role</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="/roles">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="role_name">Role name</label>
                    <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..." value="{{ old('role_name') }}" required>
                </div>
                <div class="form-group">
                    <label for="role_slug">Role Slug</label>
                    <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role Slug..." value="{{ old('role_slug') }}" required>
                </div>
                <div class="form-group" >
                    <label for="roles_permissions">Add Permissions</label>
                    <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="{{ old('roles_permissions') }}">
                </div>

                <div class="form-group pt-2">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>



        </div>
    </div>


@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);
            });
        });
    </script>
@endsection
