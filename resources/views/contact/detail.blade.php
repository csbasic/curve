@php
   $subtitle = "Contact Detail subtitle Curve is determined at bridging the gap that has been created by misconceptions and self in order to recue our the world which has denied essense for impression.";
@endphp

<x-layout>
   @include('partials._breadcrumbs', ['page' => 'Detail', 'link' => 'Contacts','path' => "/contacts", 'subtitle' => $subtitle])
       <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5 justify-content-center">

          <div class="col-lg-10 ">

            <article class="article">

               <h2 class="title">{{ $contact->subject }}</h2>

               <div class="meta-top">
                  <ul>
                     <li class="d-flex align-items-center">
                        <i class="bi bi-person"></i> 
                        <a href="blog-details.html">{{ $contact->name }}</a>
                     </li>
                  <li class="d-flex align-items-center">
                     <i class="bi bi-clock"></i> 
                     <time datetime="2022-01-01">{{ date_format($contact->created_at, "D M, Y - h:i") }}</time>
                    
                  </li>
                  <li class="d-flex align-items-center">
                     <i class="bi bi-email"></i> 
                     {{ $contact->email }}
                  </li>
                </ul>
               </div>

               <div class="content">
                  <p>
                     {{ $contact->message }}
                  </p>
               </div>
            
            </article>
         </div>

        </div>

      </div>

    </section>
</x-layout>