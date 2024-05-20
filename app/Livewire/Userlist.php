<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Userlist extends Component
{

    public User $selctUser;
    public $perpage = '5';
    protected $queryString = ['search'];
    public $search = '';
    public $admin = '';
    public $sortBy = "created_at";
    public $sortDir = "DESC";
    use WithPagination;

    public function viewUser($user)
    {
        \Log::info("-----------------");
        \Log::info($user);
        $this->selctUser = User::find($user);
        \Log::info($this->selctUser);
        $this->dispatch('open-modal', name: 'user-details');
    }
    // #[Computed]

    // public function users(){
    //   return User::search($this->search)
    //   ->when($this->admin !=='',function($query){
    //     $query->where('is_admin','=',$this->admin);
    //   })
    //   ->orderBy($this->sortBy,$this->sortDir)
    //   ->paginate($this->perpage);
    // }
    public function deleteUser($user)
    {
        User::find($user)->delete();
     
        // $this->dispatch('delete-user');
    }
    public function setSortBy($sortByField)
    {

        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }
    public function clearFilters()
    {

        $this->reset(['search']);
        $this->search = '';
        $this->queryString = '';
    }
    // #[On('delete-user')]
    #[On('create-user')]
    public function render()
    {
        $users = User::search($this->search)
            ->when($this->admin !== '', function ($query) {
                $query->where('is_admin', '=', $this->admin);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perpage);
        return view('livewire.userlist', [
            'users' => $users,
        ]);
    }
}
