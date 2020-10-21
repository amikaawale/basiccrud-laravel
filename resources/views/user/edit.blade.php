@extends('layouts.admin')


@section('breadcrumb')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('user.index') }}" class="btn btn-link btn-float has-text">
                        <i class="icon-add text-primary"></i><span>User List</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Users</li>
                <li class="active">{{ $user->name }}</li>
            </ul>
        </div>
    </div>


@endsection

@section('content')

    <div class="panel">
        <div class="panel-body">
              <h2>Edit User</h2>
              <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
                   @method('PATCH')
                   @csrf()
                   <div class="form-group">
                       <label>Username</label>
                       <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                   </div>

                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
                  </div>

                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" value="" >
                  </div>

                  <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" value="" >
                  </div>

                  <div class="form-group">
                      <label for="role">Select Role</label>

                      <select class="role form-control" name="role" id="role">
                          <option value="">Select Role...</option>
                          @if(count($roles))
                          @foreach ($roles as $role)
                              <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}"
                               {{ $userRole && $role->id == $userRole->id ? 'selected':'' }}
                              >
                                  {{$role->name}}</option>
                          @endforeach
                          @endif
                      </select>
                  </div>

                  <div id="permissions_box" >
                      <label for="roles">Select Permissions</label>
                      <div id="permissions_ckeckbox_list">
                      </div>
                  </div>

                  @if($user->permissions->isNotEmpty())
                      @if($rolePermissions != null)
                          <div id="user_permissions_box" >
                              <label for="roles">User Permissions</label>
                              <div id="user_permissions_ckeckbox_list">
                                  @foreach ($rolePermissions as $permission)
                                      <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}" {{ in_array($permission->id, $userPermissions->pluck('id')->toArray() ) ? 'checked="checked"' : '' }}>
                                          <label class="custom-control-label" for="{{$permission->slug}}">{{$permission->name}}</label>
                                      </div>
                                  @endforeach
                              </div>
                          </div>
                      @endif
                  @endif

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
            var user_permissions_box = $('#user_permissions_box');
            var user_permissions_ckeckbox_list = $('#user_permissions_ckeckbox_list');

            permissions_box.hide(); // hide all boxes


            $('#role').on('change', function() {
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');

                permissions_ckeckbox_list.empty();
                user_permissions_box.empty();

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
