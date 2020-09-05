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
                    <input type="text" name="step[]" class="form-control"
                           placeholder="{{'Describe Step'.($step + 1) }}">
                </div>
                <div class="col-md-2">
                    <a wire:click="remove({{ $loop->index }})" class="text-danger"><i class="icon-cross"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
