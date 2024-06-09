@extends('backend.layouts.sui_master')

@section('content')

<form action="{{ route('permissions.store') }}" method="POST" class="relative mb-32 p-4 max-w-md mx-auto">
    @csrf
    <div class="relative flex flex-col visible w-full h-auto min-w-0 p-4 break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
        <h5 class="mb-4 font-bold dark:text-white">Create New Permission</h5>
        <div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Permission Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g., edit articles" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full px-3 mt-4">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="group">Permission Group</label>
                    <input type="text" name="group" id="group" placeholder="e.g., User Management" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    @error('group')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full px-3 mt-4">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="guard_name">Guard Name</label>
                    <select name="guard_name" id="guard_name" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option value="web">Web</option>
                        <option value="api">API</option>
                    </select>
                    @error('guard_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex mt-6">
                <button type="submit" class="inline-block px-6 py-3 mb-0 ml-auto font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-s">Create Permission</button>
            </div>
        </div>
    </div>
</form>

@endsection
