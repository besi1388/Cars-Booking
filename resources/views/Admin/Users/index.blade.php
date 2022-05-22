<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
            <div class="alert alert-secces" role="alert">
                {{ session('status') }}
            </div>
                
            @endif
            
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        @php
        $i = 0;
        @endphp
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ ++$i }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white  whitespace-nowrap">
                    {{ $user->name }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ $user->email }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white   whitespace-nowrap">
                 @if ($user->status == 0) Inactive @else Active @endif 
                        
                    
                </td>
                   
                    <td class="px-6 py-4 ">
                        <div class="flex space-x-2">

                            <a href="{{ route('admin.status', $user->id) }}" 
                                class="px-4 py-2  bg-blue-500 hover:bg-blue-700 rounded-lg text-white"> 
                                @if ($user->status == 1) Inactive @else Active @endif </a>

                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" 
                            class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                    </form>
                        </div>
                    </td> 
                    
            </tr>         
            @endforeach
            
            
        </tbody>
    </table>
    </div>
    
        </div>
    </div>
</x-admin-layout>