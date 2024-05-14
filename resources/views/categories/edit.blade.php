<x-layout>
   
   @include('partials._breadcrumbs', ['page' => 'Edit', 'link' => 'Categories', 'path' => '/categories'])
      <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row g-4 justify-content-center">

            <div class="col-lg-8">

               <article class="article">
                  <div class="reply-form p-4">
                     <form method="POST" action="/category/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                           <label for="name" class="inline-block text-lg mb-2">
                              Category Name
                           </label>
                           <input
                              type="text"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="name"
                              placeholder="Example: The Latest Features with Laravel 11"
                              value="{{ $category->name }}"
                           />
                           @error('name')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row col-md-3 mt-3">
                           <button class="btn btn-danger py-2 px-4 hover:bg-black">
                              Update Category
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