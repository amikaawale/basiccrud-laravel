@extends('layouts.admin')


@section('breadcrumb')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ route('roles.create') }}" class="btn btn-link btn-float has-text">
                        <i class="icon-add text-primary"></i><span>Create New</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Roles</li>
                <li class="active">List</li>
            </ul>
        </div>
    </div>


@endsection

@section('content')

    <div class="panel">
        <div class="panel-body">
                    @if(count($roles) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Role</th>
                            <th>Slug</th>
                            <th>Permissions</th>
                            <th>Tools</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Role</th>
                            <th>Slug</th>
                            <th>Permissions</th>
                            <th>Tools</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role['id'] }}</td>
                                <td>{{ $role['name'] }}</td>
                                <td>{{ $role['slug'] }}</td>
                                <td>
                                    @if ($role->permissions != null)

                                        @foreach ($role->permissions as $permission)
                                            <span class="label label-default">
                                               {{ $permission->name }}
                                             </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="/roles/{{ $role['id'] }}"><i class="icon-eye"></i></a>
                                    <a href="/roles/{{ $role['id'] }}/edit"><i class="icon-pencil7"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#deleteModal" data-roleid="{{$role['id']}}"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No Roles available.Create one.</p>
            @endif
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "delete" If you realy want to delete this role.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="">
                        @method('DELETE')
                        @csrf
                        {{-- <input type="hidden" id="role_id" name="role_id" value=""> --}}
                        <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var role_id = button.data('roleid')

            var modal = $(this)
            // modal.find('.modal-footer #role_id').val(role_id)
            modal.find('form').attr('action','/roles/' + role_id);
        })
    </script>
@endsection
