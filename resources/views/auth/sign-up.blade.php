@php
   $page =   $signup ;
@endphp
<x-layout>

   <div data-aos="fade" class="page-title">
   <div class="heading">
      <div class="container">
         <div class="row d-flex justify-content-center text-center">
         <div class="col-lg-8">
            <h1 style="font-size: 3cm">Curve</h1>
            <h4 style="">Sign Up</h4>
            
         </div>
         </div>
      </div>
   </div>
   
   </div>

   <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

         <div class="row g-4 justify-content-center">

            <div class="col-lg-7">

               <article class="article">
                  <div class="reply-form p-4">

                  
                     <p class="">Sign up to publish articles</p>
                     <form action="/authenticate/sign-up" method="POST">
                        @csrf
                        <div class="row">
                           <label for="name">Enter Name</label>
                           <div class="col form-group">
                              <input 
                                 name="name" 
                                 type="text" 
                                 class="form-control" 
                                 placeholder="Sean Jay"
                                 value="{{ old("name") }}"
                              >
                              @error("name")
                                 <p class="text-danger fw-lighter">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                        <div class="row mt-3">
                           <label for="email">Enter Email</label>
                           <div class="col form-group">
                              <input 
                                 name="email" 
                                 type="text" 
                                 class="form-control" placeholder="seanjay@curve.com"
                                 value="{{ old("email") }}"
                              >
                              @error("email")
                                 <p class="text-danger fw-lighter">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                        <div class="row mt-3">
                           <label for="password">Enter Password</label>
                           <div class="col form-group">
                              <input 
                                 name="password" 
                                 type="password" 
                                 class="form-control"
                                 placeholder="........"
                              >
                              @error("password")
                                 <p class="text-danger fw-lighter">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>

                        <div class="row mt-3">
                           <label for="password_confirmation">Confirm Password</label>
                           <div class="col form-group">
                              <input 
                                 name="password_confirmation" 
                                 type="password" 
                                 class="form-control"
                                 placeholder="........"
                              >
                              @error("password_confirmation")
                                 <p class="text-danger fw-lighter">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>

                        <div class="text-center mt-2">
                           <button type="submit" class="text-white">Sign Up</button>
                        </div>

                     </form>
                  </div> 
               </article>

               <div class=" mt-3 pt-1 ">
                  <span>Have an account? </span>   <a class="font-weight-bold" href="/sign-in">Sign In</a>
               </div>

            </div>
         </div>
      </div>
  </section>

</x-layout>