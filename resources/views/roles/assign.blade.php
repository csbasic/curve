@php
   $subtitle = "Assign Role Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less  informed than the masses.";
@endphp
<x-layout>
   @include('partials._breadcrumbs', ['page' => 'Create', 'link' => 'Users', 'path' => '/users', 'subtitle' => $subtitle])
   <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row g-4 justify-content-center">

            <div class="col-lg-8">

               <article class="article">
                  <div class="reply-form p-4">
                     <form method="POST" action="/users/{{ Request::segment(2) }}/role/assign" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                           <label for="role_id" class="inline-block  mb-2">Roles</label>
                           
                           <select class="border border-gray-200 rounded p-2 w-full" id="role_id" name="role_id">
                              <option selected>Select Role</option>
                              @foreach ($roles as $role)
                                 <option value="{{ $role->id }}">{{ $role->name }}</option>
                              @endforeach
                           </select>
                           @error('role_id')
                              <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row col-md-3 mt-3">
                           <button
                              class="btn btn-danger py-2 px-4 hover:bg-black">
                              Assign Role
                           </button>
                        </div>
                     </form>
                  </div>
               </article>
            </div>
         </div>
      </div>
   </section>
</x-layout>