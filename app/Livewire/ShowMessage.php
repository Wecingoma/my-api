<?php

namespace App\Livewire;

use Livewire\Component;

class ShowMessage extends Component
{


    public bool $show = false;

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function mount()
    {
        $this->show = true; // Initialize the show property
    } 
    public function load()  {
        sleep(rand(1, 5)); // Simulate a delay

    }
    
    public function render()
    {   
        // sleep(rand(1, 5));
        return view('livewire.show-message');
    }
}
