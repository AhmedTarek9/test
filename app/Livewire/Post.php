<?php

namespace App\Livewire;

use App\Models\posts;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;

    protected $queryString = ['search'];
    public $search = '';
    public $editname;
    public $name;
    public $editid;
    public function CreateNewPost()
    {
        $this->validate([
            'name' => 'required|min:2|max:10',

        ]);
        posts::create([
            'name' => $this->name,
        ]);
        $this->reset(['name']);
        //request()->session()->flash('success','create post succesfully');
        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Post Created',
            position: 'center'
        );

    }

    public function delete($post)
    {
        posts::find($post)->delete();
        //$this->dispatch('create-post');
        // dd($post);
    }

    public function toogle($post)
    {
        $posts = posts::find($post);
        $posts->completed = !$posts->completed;
        $posts->save();
    }
    public function edit($post)
    {
        $this->editname = posts::find($post)->name;
        $this->editid = $post;
    }

    public function cancelPost()
    {
        $this->reset('editname', 'editid');
    }

    public function updatePost()
    {
        $this->validate([
            'editname' => 'required|min:2|max:10',

        ]);
        posts::find($this->editid)->update([
            'name' => $this->editname,
        ]);
        $this->cancelPost();
    }
    // #[Computed]
    // public function posts2()
    // {
    //     return posts::latest()->where('name', 'like', "%{$this->search}%")->paginate(5);
    // }

    public function render()
    {
        $posts = posts::latest()->where('name', 'like', "%{$this->search}%")->paginate(5);
        return view('livewire.post', ['posts' => $posts]);
    }
}
