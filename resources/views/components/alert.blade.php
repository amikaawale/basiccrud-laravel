<div class="row">
    <div class="col-md-12">
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    {{ $slot }}
    @if(session()->has('message'))
        {{--{{ session()->forget('message') }}--}}
            <div class="alert disabled alert-success">
                <i class="fa fa-check-circle"></i> &nbsp;
                {{ session()->get('message') }}
            </div>
    @elseif(session()->has('error'))
            <div class="alert disabled alert-danger">
                <i class="fa fa-exclamation-triangle"></i> &nbsp;
                {{ session()->get('error') }}
            </div>
    @endif

    @if ($errors->any())
        <div class="py-4 px-2 bg-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
</div>