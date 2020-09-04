<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\step;

class EditStep extends Component
{

    public $steps = [];

    public function mount($steps)
    {

        $this->steps = $steps->toArray();

    }


    public function increment()
    {
//        $this->step++;
        $this->steps[]  = count($this->steps);
    }

    public function remove($index)
    {
        $step = $this->steps[$index];

        if(isset($step['id'])){
            step::find($step['id'])->delete();
        }
        unset($this->steps[$index]);
    }


    public function render()
    {
        return view('livewire.edit-step');
    }
}
