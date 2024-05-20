<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Counter extends Component
{
    use WithPagination ;
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $image;
    public $imageurl;

    function updatelist(){
        $this->dispatch('create-user'); 
    }

    public function render()
    {
    
        return view('livewire.counter');
    }
}