{{--<div>--}}
    {{--<div class="flex justify-center pb-4 px-4">--}}
        {{--<h2 class="text-lg pb-4">Add Step for task</h2>--}}
        {{--<span wire:click="increment" class="mx-5 py-2 px-3 bg-blue-400 cursor-pointer rounded text-white"> + Add More</span>--}}
    {{--</div>--}}


    {{--@foreach($steps as $step)--}}

        {{--<div class="flex justify-content-center mb-5" wire:key="{{ $loop->index }}">--}}

            {{--<input type="text" name="stepName[]" class="py-2 px-2 border rounded" value="{{ $step['name'] }}"--}}
                   {{--placeholder="{{'Describe Step'.($loop->index + 1) }}">--}}
            {{--<input type="hidden" name="stepId[]" value="{{ $step['id'] }}">--}}
            {{--<span wire:click="remove({{ $loop->index }})" class="mx-5 py-2 px-3 bg-red-400 cursor-pointer rounded text-white">Remove</span>--}}

        {{--</div>--}}

    {{--@endforeach--}}

{{--</div>--}}

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Task Steps
            <a wire:click="increment" class="btn btn-xs btn-primary">&nbsp; + Add More</a>
        </h5>
    </div>
    <div class="panel-body">
        @foreach($steps as $step)
            <div class="row" wire:key="{{ $loop->index }}" style="margin-bottom: 10px;">
                <div class="col-md-10" >
                    <input type="text" name="stepName[]" class="form-control" value="{{ $step['name'] }}"
                           placeholder="{{'Describe Step'.($loop->index + 1) }}">
                </div>
                <input type="hidden" name="stepId[]" value="{{ $step['id'] }}">

                <div class="col-md-2">
                    <a wire:click="remove({{ $loop->index }})" class="text-danger"><i class="icon-cross"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>



