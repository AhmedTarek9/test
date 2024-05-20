<div>
<h1><bold>Create A new User</bold></h1>
@if(session('success'))
    <span class="alert alert-success">{{session('success')}}</span>
    @endif
<form wire:submit="CreateNewUser">
  <div class="form-group">
    <input wire:model="name" type="name" class="form-control"  aria-describedby="emailHelp" placeholder="Enter name">
    @error('name')

            <span class="text-danger-500 text-xs">{{$message}}</span>

    @enderror
  </div>
  <div class="form-group">
    <input wire:model="email" type="email" class="form-control"  placeholder="email">
    @error('email')

<span class="text-danger-500 text-xs">{{$message}}</span>

@enderror
  </div>
  <div class="form-group">
    <input wire:model="password" type="password" class="form-control"  placeholder="password">
    @error('password')

<span class="text-danger-500 text-xs">{{$message}}</span>

@enderror
  </div>

  <div class="form-group">
    <input wire:model="image" type="file" class="form-control" id="image"  placeholder="image">
    @error('image')

<span class="text-danger-500 text-xs">{{$message}}</span>

@enderror
  </div>
  <div wire:loading.delay>
    <span class="text-green-500">Sending ......</span>
  </div>
  <button wire:loading.remove style="background-color:blue" type="submit" class="btn btn-primary">Submit</button>
 
</form>
</div>