<div>
<button x-data x-on:click="$dispatch('open-modal',{name:'createuser'})" style="background-color:green" type="submit" class="btn btn-primary">Create User</button>
<!-- <button wire:click="updatelist" style="background-color:green" type="submit" class="btn btn-primary">update list user</button> -->
<!-- <button x-data x-on:click="$dispatch('open-modal',{name:'model'})" style="background-color:green" type="submit" class="btn btn-primary">list user</button> -->
<x-modal name="model" title="List User">
  @slot('body')
  @livewire('userlist')
  @endslot
</x-modal>

<x-modal name="createuser" title="Create User">
  @slot('body')
  @livewire('createuser')
  @endslot
</x-modal>

</div>
