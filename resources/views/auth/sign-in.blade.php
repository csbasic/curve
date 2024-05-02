
@php
   $page =   $signin ;
@endphp
<x-layout>

   <div data-aos="fade" class="page-title">
      <div class="heading">
         <div class="container">
            <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
               <h1 style="font-size: 3cm">Curve</h1>
               <h4 style="">Sign In</h4>
               
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
                  
                     <p>Sign in to publish articles</p>
                     <form action="/authenticate/sign-in" method="POST">
                        @csrf
                        <div class="row">
                           <label for="email">Enter Email</label>
                           <div class="col form-group">
                              <input 
                                 name="email" 
                                 type="text" 
                                 class="form-control" 
                                 placeholder="Enter email"
                                 value="{{ old("email") }}"
                              >
                              @error("email")
                                 <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                        <div class="row mt-3">
                           <label for="password">Enter Email</label>
                           <div class="col form-group">
                              <input 
                                 name="password" 
                                 class="form-control" 
                                 type="password"
                                 placeholder="........"
                                 value="{{ old("password") }}"
                              >
                              @error("password")
                                 <p class="text-danger fw-lighter">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>

                        <div class="text-center mt-2">
                           <button type="submit" class="btn btn-danger">Sign In</button>
                        </div>

                     </form>
                  </div> 
               </article>

               <div class=" mt-3 pt-1 ">
                  <span>Don't have an account? </span>   <a class="font-weight-bold" href="/sign-up">Sign Up</a>
               </div>

            </div>
         </div>
      </div>
  </section>
   
</x-layout>
