<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Createuser extends Component
{
    use WithPagination ;
    use WithFileUploads;
    #[Validate('required|min:2|max:10',as:'compNY')] 
    public $name='';
    #[Validate('required|email|min:2|max:10')] 
    public $email;
    #[Validate('required|min:2|max:20')] 
    public $password;
    #[Validate('required|image|min:2|max:20')] 
    public $image;
    public $imageurl;
    public function render()
    {
        return view('livewire.createuser');
    }
    public function CreateNewUser()
    {
        $this->validate();
        $this->imageurl=$this->image->store('uploads','public');
       $user= User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
            'image'=> $this->imageurl
        ]);
        $this->reset(['name','email','password','image']);
        request()->session()->flash('success','user create succesfully');
        $this->dispatch('close-modal', name: 'user-createuser');
        $this->dispatch('create-user'); 
    }
}
