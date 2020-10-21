@extends('layouts.admin')


@section('breadcrumb')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('user.index') }}" class="btn btn-link btn-float has-text">
                        <i class="icon-list text-primary"></i><span>List User</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Users</li>
                <li class="active">List</li>
            </ul>
        </div>
    </div>


@endsection

@section('content')

    <div class="panel">
        <div class="panel-body">
              <h2>Add User</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


              <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                   @csrf()
                   <div class="form-group">
                       <label>Username</label>
                       <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                   </div>

                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                  </div>

                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" value="" required>
                  </div>

                  <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" value="" required>
                  </div>

                  <div class="form-group">
                      <label for="role">Select Role</label>

                      <select class="role form-control" name="role" id="role">
                          <option value="">Select Role...</option>
                          @foreach ($roles as $role)
                              <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div id="permissions_box" >
                      <label for="roles">Select Permissions</label>
                      <div id="permissions_ckeckbox_list">
                      </div>
                  </div>

                  <div class="form-group">
                      <input type="submit" name="update" class="btn btn-primary">
                  </div>


              </form>



        </div>
    </div>


@endsection

@section('scripts')

    <script>

        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');

            permissions_box.hide(); // hide all boxes


            $('#role').on('change', function() {
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');

                permissions_ckeckbox_list.empty();

                $.ajax({
                    url: "/user/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {

                    console.log(data);

                    permissions_box.show();
                    // permissions_ckeckbox_list.empty();

                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(
                            '<div class="custom-control custom-checkbox">'+
                            '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                            '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                            '</div>'
                        );

                    });
                });
            });
        });

    </script>

@endsection
