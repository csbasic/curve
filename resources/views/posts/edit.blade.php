<x-layout>
   @include('partials._breadcrumbs', ['page' => $page])

   <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row g-4">

            <div class="col-lg-7 offset-lg-3">

               <article class="article">
                  <div class="reply-form p-4">
                     <form method="POST" action="/posts/{{ $post->id }}/update" enctype="multipart/form-data">
                        {{-- csrf stops cross site request fugery --}}
                        @csrf
                        @method('put')
                        <div class="row mt-4">
                              <label for="title" class="inline-block text-lg mb-2"
                                 >Post Title</label
                              >
                              <input
                                 type="text"
                                 class="border border-gray-200 rounded p-2 w-full"
                                 name="title"
                                 placeholder="Example: The Latest Features with Laravel 11"
                                 value="{{ $post->title }}"
                              />
                              @error('title')
                                 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                              @enderror
                        </div>

                        <input
                           type="hidden"
                           class="border border-gray-200 rounded p-2 w-full"
                           name="user_id"
                           placeholder="Example: The Latest Features with Laravel 11"
                           value="{{ $post->user_id }}"
                        />
                        @error('user_id')
                           <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                     
                        <div class="row mt-4">
                              <label for="tags" class="inline-block text-lg mb-2">
                                 Tags (Comma Separated)
                              </label>
                              <input
                                 type="text"
                                 class="border border-gray-200 rounded p-2 w-full"
                                 name="tags"
                                 placeholder="Example: Laravel, Backend, Postgres, etc"
                                 value="{{ $post->tags }}"
                              />
                              @error('tags')
                                 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
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
                                 value="{{ $post->image }}"
                              />

                              <img class="w-48 mb-6 mt-4"
                                 src=" {{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/index.jpg') }}"
                                 alt="" 
                              />

                              @error('image')
                                 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
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
                              >{{ $post->description }}</textarea>
                              @error('description')
                                 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                              @enderror
                        </div>

                        <div class="row col-md-3 mt-3">
                           <button
                              class="btn btn-danger py-2 px-4 hover:bg-black">
                              Update Post
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