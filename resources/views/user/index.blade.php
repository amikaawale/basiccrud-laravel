@extends('layouts.admin')


@section('breadcrumb')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('user.create') }}" class="btn btn-link btn-float has-text">
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
                    @if($users)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="bg-blue">
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
{{--                            @if(!\Auth::user()->hasRole('admin') && $user->hasRole('admin')) @continue; @endif--}}
                            <tr {{ Auth::user()->id == $user->id ? 'bgcolor=#ddd' : '' }}>
                            <td>{{ $user->index + 1}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->roles->isNotEmpty())
                                @foreach($user->roles as $role)
                                   <span class="label label-default">{{ $role->name }}</span>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                    @if($user->permissions->isNotEmpty())
                                        @foreach($user->permissions as $permission)
                                            <span class="label label-default">{{ $permission->name }}</span>
                                        @endforeach
                                    @endif
                            </td>
                            <td>
                                <a href="{{ route('user.edit',['user'=>$user->id]) }}" class="text-blue" title="Edit"><i class="icon-pencil7"></i></a>
                                <a href="{{ route('user.show',['user'=>$user->id]) }}" class="text-green" title="Edit"><i class="icon-eye"></i></a>
                                <a href=""  data-toggle="modal" data-target="#deleteModal" data-userid="{{ $user->id }}">
                                    <i class="icon-trash"></i>
                                </a>
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

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Select "Delete" if you really want to delete user.</p>

                </div>
                <div class="modal-footer">
                    <form method="post" action="">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <a class="btn btn-danger" onclick="$(this).closest('form').submit();">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
     <script>

         $('#deleteModal').on('show.bs.modal',function (e){
            var button = $(e.relatedTarget);
            var user_id = button.data('userid');

            var modal = $(this);
            // modal.find('.modal.footer #user_id').val(user_id);
            modal.find('form').attr('action','/user/'+user_id);

         });

     </script>
@endsection
