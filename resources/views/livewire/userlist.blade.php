<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                            </div>
                            <input id="myInput" type="text" wire:model.live="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required=""onfocus="this.value=''" >
                        </div>
                        
                        <button onclick="document.getElementById('myInput').value = ''" wire:click="clearFilters()" style="background-color:red" type="reset"
                            class="btn btn-danger" >X</button>

                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                            <select wire:model.live="admin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">All</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                @foreach($users as $user)
                <div wire:key="{{$user->id}}" class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                @include('livewire.includes.table-sortable-th',[
                                'name' => 'name',
                                'displayName' => 'Name'
                                ])
                                @include('livewire.includes.table-sortable-th',[
                                'name' => 'email',
                                'displayName' => 'Email'
                                ])
                                @include('livewire.includes.table-sortable-th',[
                                'name' => 'is_admin',
                                'displayName' => 'Role'
                                ])
                                @include('livewire.includes.table-sortable-th',[
                                'name' => 'created_at',
                                'displayName' => 'Joined'
                                ])
                                <th scope="col" class="px-4 py-3">image</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <div>
                            <tr  class="border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$user->name}}</th>
                                <td class="px-4 py-3"> {{$user->email}}</td>
                                <td class="px-4 py-3 text-green-500">
                                    {{$user->is_admin ? 'Admin' : 'Member'}}</td>
                                <td class="px-4 py-3"> {{$user->created_at}}</td>
                                @if($user->image)
                                <td><img class="rounded w-15 h-15 mt-5" src="{{asset($user->image)}}"></td>
                                @endif
                                <td  class="px-4 py-3 flex items-center justify-end">
                                    <button wire:click="viewUser({{$user->id}})" :key="$user->id" style="background-color:green"
                                        type="submit" class="btn btn-primary">view</button>
                                    <button  onclick="confirm('Are you sure you want to remove the user from this group?') || event.stopImmediatePropagation()" wire:click="deleteUser({{$user->id}})"
                                        style="background-color:red" type="submit"
                                        class="btn btn-danger">delete</button>
                                </td>
                            </tr>
                            </div>
                           

                        </tbody>
                    </table>
                </div>
                @endforeach

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live="perpage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </section>
    @if($selctUser)
    <x-modal  wire:key="{{$user->id}}" name="user-details" title="view User">
        @slot('body')
        name : {{$selctUser->name}}
        <br>
        email : {{$selctUser->email}}
        @endslot
    </x-modal>
    @endif

</div>