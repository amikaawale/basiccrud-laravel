@extends('layouts.admin')



@section('content')
<div class="panel">
    <div class="panel-body">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    {{--@include('layouts.flash')--}}
                <form action="/upload" method="post" enctype="multipart/form-data">
                         @csrf
                         <input type="file" name="image"  class="form-control"/>
                         <input type= "submit"  class="btn btn-primary" value="Upload"/>
                     </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
