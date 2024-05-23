@php
   $subtitle = 'Profile View Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less informed than the masses';
   $from = $_GET['from'];
   if(isset($from) && $from == 'users-list') {
      $path = "/users";
      $link = "Users";
   } 
   
@endphp

<x-layout>
   @include('partials._breadcrumbs', ['page' => $page, 'subtitle' => $subtitle])
    
   <!-- Section of user profile -->
   <section id="service-details" class="service-details">

      <div class="container">

         <div class="row gy-5">
            <div class="col-lg-9 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
               <section id="team" class="team">
                  <div class="container">
                     <div class="row gy-5">
                        <div class="col-lg-5 col-md-5 member pr-0" data-aos="fade-up" data-aos-delay="100" style="padding: 0px!important; margin-right: 0px!important;">
                           <div class="member-img">
                              <img src="{{ $user->profile_pic? asset('storage/'. $user->profile_pic) : asset('assets/img/team/team-1.jpg') }}" class="img-fluid" alt="Profile Pic">
                              <div class="social">
                                 <a href="#"><i class="bi bi-twitter"></i></a>
                                 <a href="#"><i class="bi bi-facebook"></i></a>
                                 <a href="#"><i class="bi bi-instagram"></i></a>
                                 <a href="#"><i class="bi bi-linkedin"></i></a>
                              </div>
                           </div>
                        </div>

                        <div class="col-lg-6 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                           <div class="member-info">
                           <h4>{{ $user->name }}</h4>
                           <span>@if ($user->occupation) {{ $user->occupation }}@endif</span>
                           <p>@if ($user->bio) {{ $user->bio }}@endif</p>
                           </div>
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-danger mt-4 h" style="background-color: #E84545; "> Edit Profile</a>
                        </div>

                     </div>
                  </div>
               </section>
            </div>

            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
               <div class="help-box d-flex flex-column justify-content-center align-items-center mt-0">
               <i class="bi bi-telephone help-icon"></i>
               <h4>Have a Question?</h4>
               <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>@if ($user->occupation) {{ $user->phone }}@endif</span></p>
               <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">{{ $user->email }}</a></span></p>
               </div>
            </div>
         </div>
      
         <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div style="margin-top: 30px">
               <div class="col-lg-9 ps-lg-5 pt-6">

                  @can('create', \App\Models\User::class)
                     <a href="/users" class="btn btn-outline-danger" style="width: 180px">Manage Users</a>
                  @endcan
                  
                  @can('create', \App\Models\Category::class)
                     <a href="/categories" class="btn btn-outline-danger" style="white; width: 180px">Categories</a>
                  @endcan

                  @can('update', \App\Models\Contact::class)
                     <a href="/contacts" class="btn btn-outline-danger" style="width: 180px">Manage Contacts</a>
                  @endcan

                  @can('update', \App\Models\Role::class)
                     <a href="/roles" class="btn btn-outline-danger" style="width: 180px">Manage Roles</a>
                  @endcan
                  
               </div>
            </div>
         </div>

      </div>

   </section>
   <!-- End Section of user profile -->
</x-layout>