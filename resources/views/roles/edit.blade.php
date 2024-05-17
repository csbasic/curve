@php
   $subtitle = "Create Post Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less  informed than the masses.";
@endphp
<x-layout>
   @include('partials._breadcrumbs', ['page' => 'Update', 'link' => 'Roles', 'path' => '/roles', 'subtitle' => $subtitle])
   <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row g-4 justify-content-center">

            <div class="col-lg-6">

               <article class="article">
                  <div class="reply-form p-4">
                     <form method="POST" action="/roles/{{ $role->id }}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                           <label for="name" class="inline-block text-lg mb-2">Role name</label>
                           <input
                              type="text"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="name"
                              placeholder="Administrator"
                              value="{{ $role->name }}"
                           />
                           @error('name')
                              <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                           @enderror
                        </div>


                        <div class="row col-md-4 mt-3">
                           <button
                              class="btn btn-danger py-2 px-4 hover:bg-black">
                              Update Role
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