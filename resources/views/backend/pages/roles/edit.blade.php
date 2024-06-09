@extends('backend.layouts.sui_master')

@section('content')

<form action="{{ route('roles.update', $role->id) }}" method="POST" class="relative mb-32 p-32" style="height: auto;">
    @csrf
    @method('PUT')
    <div class="absolute top-0 left-0 flex flex-col w-full h-auto p-4 bg-white border-0 shadow-soft-xl dark:bg-gray-950 dark:shadow-soft-dark-xl rounded-2xl">
        <h5 class="mb-4 font-bold dark:text-white">Edit Role</h5>
        <div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 sm:w-6/12">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Role Name</label>
                    <input type="text" name="name" id="name" value="{{ $role->name }}" placeholder="Role Name" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                </div>
                <div class="w-full max-w-full px-3 mt-4 sm:mt-0 sm:w-6/12">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="guard_name">Guard</label>
                    <input type="text" name="guard_name" id="guard_name" value="{{ $role->guard_name }}" placeholder="Guard Name" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                </div>
            </div>

            <div class="flex flex-wrap mt-4 -mx-3">
                <div class="w-full px-3">
                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Permissions</label>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="select_all" class="mr-2">
                        <label for="select_all" class="font-bold text-xs text-slate-700 dark:text-white/80">Select All</label>
                    </div>
                    @foreach($permissionGroups as $group => $permissions)
                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <input type="checkbox" id="group_{{ $group }}" class="group-checkbox mr-2">
                                <label for="group_{{ $group }}" class="font-bold text-sm text-slate-700 dark:text-white/80">{{ ucfirst($group) }}</label>
                            </div>
                            <div class="flex flex-wrap gap-4 pl-6">
                                @foreach($permissions as $permission)
                                    <div class="flex items-center" style="min-width: 150px;">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission_{{ $permission->id }}" class="permission-checkbox group_{{ $group }} mr-2" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                        <label for="permission_{{ $permission->id }}" class="text-sm text-slate-700 dark:text-white/80">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex mt-6">
                <button type="submit" class="inline-block px-6 py-3 ml-auto font-bold text-white uppercase transition-all bg-gradient-to-tl from-gray-900 to-s dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 rounded-lg hover:scale-102 active:opacity-85 hover:shadow-soft-xs">Update Role</button>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('select_all');
    const groupCheckboxes = document.querySelectorAll('.group-checkbox');
    const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

    selectAllCheckbox.addEventListener('change', function () {
        permissionCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        groupCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    groupCheckboxes.forEach(groupCheckbox => {
        groupCheckbox.addEventListener('change', function () {
            const group = groupCheckbox.id.split('_')[1];
            const groupPermissions = document.querySelectorAll(`.group_${group}`);
            groupPermissions.forEach(permissionCheckbox => {
                permissionCheckbox.checked = groupCheckbox.checked;
            });
        });
    });
});
</script>

@endsection
