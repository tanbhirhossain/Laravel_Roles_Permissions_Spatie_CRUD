@extends('backend.layouts.sui_master')

@section('content')

<form class="relative mb-32" style="height: auto;" action="{{ route('users.update', $user->id) }}" method="post">
    @csrf
    @method('PUT')
    <div active="" form="user" class="absolute top-0 left-0 flex flex-col visible w-full h-auto min-w-0 p-4 break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
        <h5 class="mb-4 font-bold dark:text-white">User Information</h5>
        <div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Name">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" placeholder="eg. Michael Prior" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                </div>
                <div class="w-full max-w-full px-3 mt-4 flex-0 sm:mt-0 sm:w-6/12">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Email Address">Email Address</label>
                    <input type="email" name="email" value="{{ $user->email }}" placeholder="eg. user@example.com" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                </div>
            </div>
            <div class="flex flex-wrap mt-4 -mx-3">
                <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Password">Password</label>
                    <input type="password" name="password" placeholder="******" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                </div>
                <div class="w-full max-w-full px-3 mt-4 flex-0 sm:mt-0 sm:w-6/12">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="role">Role</label>
                    <select name="role" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                           <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                       @endforeach
                    </select>
                </div>
            </div>
            <div class="flex mt-6">
                <button type="submit" class="w-full inline-block px-6 py-3 mb-0 ml-auto font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Update User</button>
            </div>
        </div>
    </div>
</form>

@endsection
