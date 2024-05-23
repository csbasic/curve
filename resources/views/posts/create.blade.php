@php
   $subtitle = "Create Post Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less  informed than the masses.";
@endphp
<x-layout>
   @include('partials._breadcrumbs', ['page' => $page, 'link' => 'Manage', 'path' => '/posts/manage', 'subtitle' => $subtitle])
   <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row g-4 justify-content-center">

            <div class="col-lg-8">

               <article class="article">
                  <div class="reply-form p-4">
                     <form method="POST" action="/post/save" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-4">
                           <label for="title" class="inline-block text-lg mb-2"
                              >Post Title</label
                           >
                           <input
                              type="text"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="title"
                              placeholder="Example: The Latest Features with Laravel 11"
                              value="{{ old('title') }}"
                           />
                           @error('title')
                              <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row mt-4">
                           <label for="category_id" class="inline-block text-lg mb-2">Post Categories</label>
                     
                           <select class="border border-gray-200 rounded p-2 w-full" id="category_id" name="category_id">
                              @foreach ($categories as $category)
                                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                           </select>
                           @error('category_id')
                              <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                           @enderror
                        </div>

                     
                        <div class="row mt-4">
                           <label for="tags" class="inline-block text-lg mb-2">
                              Tags (Comma Separated)
                           </label>
                           <input
                              type="text"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="tags"
                              placeholder="Example: Laravel, Backend, Postgres, etc"
                              value="{{ old('tags') }}"
                           />
                           @error('tags')
                              <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row mt-4">
                           <label for="image" class="inline-block text-lg mb-2">
                              Post Picture
                           </label>
                           <input
                              type="file"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="image"
                              value="{{ old('image') }}"
                           />
                           @error('image')
                              <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row mt-4">
                           <label
                              for="description"
                              class="inline-block text-lg mb-2"
                           >
                              Post Description
                           </label>
                           <textarea
                              class="border border-gray-200 rounded p-2 w-full"
                              name="description"
                              rows="10"
                              placeholder="Include tasks, requirements, salary, etc"
                           >{{ old('description') }}</textarea>
                           @error('description')
                              <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row col-md-3 mt-3">
                           <button
                              class="btn btn-danger py-2 px-4 hover:bg-black">
                              Save Post
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