@extends('backend.layouts.sui_master')

@section('content')

<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">

    <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
      <h6>Roles table</h6>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
      <div class="p-0 overflow-x-auto">
        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
          <thead class="align-bottom">
            <tr>
              <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Name</th>
              <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Guard</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Permissions</th>
              <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($roles as $role)
            <tr>
              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                <div class="flex px-2 py-1">
                  <div class="flex flex-col justify-center">
                    <h6 class="mb-0 leading-normal text-sm">{{ $role->name }}</h6>
                  </div>
                </div>
              </td>
              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                <p class="mb-0 font-semibold leading-tight text-xs">{{ $role->guard_name }}</p>
              </td>
              <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                @foreach($role->permissions as $permission)
                  <span class="bg-gradient-to-tl from-green-600 to-lime-400 px-3.6 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $permission->name }}</span>
                @endforeach
              </td>
              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                <div class="flex items-center">
                    <a href="{{ route('roles.edit', $role->id) }}" class="flex items-center font-semibold leading-tight text-xs text-slate-400 mr-4">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block delete-role-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="flex items-center font-semibold leading-tight text-xs text-red-500 delete-role-button" onclick="confirmDeleteRole(this)">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>



                    {{-- <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block delete-role-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="flex items-center font-semibold leading-tight text-xs text-red-500 delete-role-button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form> --}}
                </div>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDeleteRole(deleteButton) {
    Swal.fire({
        title: 'Delete Role',
        text: 'Are you sure you want to delete this role?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Find the closest form element to the delete button
            const form = deleteButton.closest('form');
            if (form) {
                // If the form is found, submit it
                form.submit();
            } else {
                // If the form is not found, show an error message
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Could not find the form to submit!'
                });
            }
        }
    });
}


</script>
@endsection

