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
                      <input type="password" name="password" class="form-control" value="" required>
                  </div>

                  <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" value="" required>
                  </div>

                  <div class="form-group">
                      <input type="submit" name="update" class="btn btn-primary">
                  </div>


              </form>



        </div>
    </div>


@endsection
