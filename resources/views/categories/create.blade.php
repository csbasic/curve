<x-layout>
   @include('partials._breadcrumbs', ['page' => 'Create', 'link' => 'Categories', 'path' => '/categories'])
      <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row g-4 justify-content-center">

            <div class="col-lg-8">

               <article class="article">
                  <div class="reply-form p-4">
                     <form method="POST" action="/category/save" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-4">
                           <label for="name" class="inline-block text-lg mb-2">Category Name</label>
                           <input
                              type="text"
                              class="border border-gray-200 rounded p-2 w-full "
                              name="name"
                              placeholder="Economy"
                              value="{{ old('name') }}"
                           />
                           @error('name')
                              <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row col-md-3 mt-3">
                           <button
                              class="btn btn-danger py-2 px-4 hover:bg-black">
                              Save Category
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