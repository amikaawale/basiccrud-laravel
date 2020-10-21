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
                <li class="active">User</li>
                <li class="active">{{ $user->name }}</li>
            </ul>
        </div>
    </div>


@endsection

@section('content')

    <div class="panel">
        <div class="panel-body">
              <table class="table table-bordered">
                  <tr>
                      <td>Profile</td>
                      <td>
                          @if($user->avatar)
                              <img src="{{ asset('/storage/images/'.$user->avatar) }}" alt="avatar" width="30"/>
                          @else
                              <img src="{{ asset('/assets/images/download.jpeg') }}" alt="avatar" width="30"/>
                          @endif
                      </td>
                  </tr>
                  <tr>
                      <td>Name</td>
                      <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                      <td>Roles</td>
                      <td></td>
                  </tr>
                  <tr>
                      <td>Permissions</td>
                      <td></td>
                  </tr>
              </table>
        </div>
    </div>


@endsection
