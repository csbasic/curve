   @php
      $userId = auth()->id();
      $subtitle = 'Edit Profile Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less informed than the masses';
   @endphp

<x-layout>

   @include('partials._breadcrumbs', ['page' =>  $page, 'link' => 'Profile', 'path' => "/users/$userId/detail", 'subtitle' => $subtitle])

   <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row g-4">

            <div class="col-lg-7 offset-lg-3">

               <article class="article">
                  <div class="reply-form p-4">
                     <form method="POST" action="/users/{{ $user->id }}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                           <label for="name" class="inline-block text-lg mb-2"
                              >Name</label
                           >
                           <input
                              type="text"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="name"
                              placeholder="Sean Jay"
                              value="{{ $user->name }}"
                           />
                           @error('name')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row mt-4">
                           <label for="phone" class="inline-block text-lg mb-2"
                              >Phone</label>
                           <input
                              type="text"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="phone"
                              placeholder="+1245 87825"
                              value="{{ $user->phone }}"
                           />
                           @error('phone')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row mt-4">
                           <label for="occupation" class="inline-block text-lg mb-2"
                              >Occupation</label
                           >
                           <input
                              type="text"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="occupation"
                              placeholder="Lawyer"
                              value="{{ $user->occupation }}"
                           />
                           @error('occupation')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                        </div>
                     
                     
                        <div class="row mt-4">
                           <label for="profile_pic" class="inline-block text-lg mb-2">
                              Profile Pic
                           </label>
                           <input
                              type="file"
                              class="border border-gray-200 rounded p-2 w-full"
                              name="profile_pic"
                              value="{{ $user->profile_pic }}"
                           />

                           <div class="row justify-content-center">
                              <img width="30" class="w-48 mb-6 mt-4 col-6"
                              src=" {{  asset('storage/' . $user->profile_pic) }}"
                              alt="Profile Pic" 
                              />
                           </div>

                           @error('profile_pic')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row mt-4">
                           <label
                              for="bio"
                              class="inline-block text-lg mb-2"
                           >
                              Bio
                           </label>
                           <textarea
                              class="border border-gray-200 rounded p-2 w-full"
                              name="bio"
                              rows="10"
                              placeholder="Hi there, I'am Sean Jay!"
                           >{{ $user->bio }}</textarea>
                           @error('bio')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="row col-md-3 mt-3">
                           <button
                              class="btn btn-danger py-2 px-4 hover:bg-black">
                              Update Profile
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