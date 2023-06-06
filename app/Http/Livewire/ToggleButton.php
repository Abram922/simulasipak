<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{

    public Model $model;
    public string $field;

    public bool $status;


    public string $designTemplate = 'bootstrap';

    public function mount(){
        $this->status = (bool) $this->model->getAttribute($this->field);
    }
    
    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();

    }



    public function render()
    {
        return view('livewire.toggle-button');
    }

    // public function render()
    // {
    //     return view('.user.board.boardpengajaran-livewire');
    // }
    /**
     * Summary of render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // public function render()
    // {
    //     return view('livewire.' . $this->designTemplate . '.toggle-button');
    // }


}
