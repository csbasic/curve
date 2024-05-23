<x-layout>
   @include('partials._breadcrumbs', ['page' => 'Roles', ])

   <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-md-8">
         <div class="row">
            <div @can('create', \App\Models\Role::class)class="col-md"@endcan>
               <table class="table">
                  <tbody>
                     @foreach ($roles as $role)
                        <tr class="p-3">
                           <td class="text-primary mt-3">
                              <div class="mt-3">
                                 <a href="/roles/{{ $role->id }}/detail/?from=roles-list">
                                       {{ $role->name }}
                                 </a>
                              </div>
                           </td>
                           <td class="" width="120">
                              <div class="mt-3">
                                 <a href="/roles/{{ $role->id }}/edit"
                                    class="mt-5 text-dark"></i>Edit
                                    <i class="bi bi-pencil"></i>
                                 </a>
                              </div>
                           </td>
                           <td class=" mt-3 mb-0" width="120">
                              <form class="pt-2"  action="/roles/{{ $role->id }}/delete" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button onclick="return confirm('Are you sure?')" class="btn text-danger"> Delete <i class="bi bi-pencil"></i>
                                 </button>
                              </form>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="col-md-2 mt-4">
               @can('create', \App\Models\Role::class)
                  <a href="/role/create" class="btn btn-outline-danger">Create Role</a>
               @endcan
            </div>
      
         
      </div>
   </div>
</x-layout>