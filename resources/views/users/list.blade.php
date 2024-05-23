@php
   $subtitle = "Users List Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less  informed than the masses.";
@endphp
<x-layout>
   @include('partials._breadcrumbs', ['page' => $page, 'subtitle' => $subtitle, 'from' => 'users-list'])

   <div class="row  justify-content-center"  data-aos="fade-up" data-aos-delay="100">
      <div class="col-md-10">
         <table class="table ">
            <tbody>
               @foreach ($users as $user)
                  @if ($user->id != auth()->id())
                     <tr class="p-3">
                        <td class="text-primary mt-3">
                        <div class="">
                           
                           @isset($user->profile_pic)
                              <img class="profile-pic" width=50" margin-right: 10px" src="{{ asset('storage/'.$user->profile_pic) }}" alt="Prifile Pic" />
                                 @else
                                 <img class="profile-pic" width=50" src="{{ asset('storage/user/profile-pic.jpg') }}" alt="Prifile Pic" />
                           @endisset
                        </div>
                        </td>
                        <td class="text-primary mt-3">
                           <div class="mt-3">
                              <a href="/users/{{ $user->id }}/detail/?from=users-list">
                                    {{ $user->name }}
                              </a>
                           </div>
                        </td>
                        <td width="80" class="">
                           <div class="mt-3">
                              @if ($user->role_id == \App\Models\Role::IS_ADMIN)
                                 <i>Administrator</i>  
                              @elseif ($user->role_id == \App\Models\Role::IS_EDITOR)
                              <i>Editor</i>                            
                                 @else   
                                 <i>User</i>
                              @endif
                           </div>
                        </td>
                        <td width="80" class="">
                           <div class="mt-3">
                              <a href="/users/{{ $user->id }}/edit"
                                 class="mt-5 text-dark"></i>Edit
                                 <i class="bi bi-pencil"></i>
                              </a>
                           </div>
                        </td>
                        <td width="130" class="">
                           <div class="mt-3">
                              <a href="/users/{{ $user->id }}/role/edit"
                                 class="mt-5 text-dark"></i>Assign Role
                                 <i class="bi bi-pencil"></i>
                              </a>
                           </div>
                        </td>
                        <td width="120" class=" mt-3 mb-0">
                           <form class="pt-2"  action="/users/{{ $user->id }}/delete" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="button" onclick="alert('Do you really want to take this action!')" class="btn text-danger"> Delete <i class="bi bi-trash"></i>
                              </button>
                           </form>
                        </td>
                     </tr>
                  @endif
               @endforeach
            </tbody>
         </table>
      </div>
   </div>

</x-layout>