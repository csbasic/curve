@php
  $subtitle = "Contact Form Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less  informed than the masses.";
@endphp

<x-layout>
  
   @include('partials._breadcrumbs', ['page' => $page, 'subtitle' => $subtitle])
   <section id="contact" class="contact">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>A108 Adam Street</p>
                  <p>New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                  <p>+1 6678 254445 41</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                  <p>contact@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday</p>
                  <p>9:00AM - 05:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <form action="/message/save" method="POST" enctype="multipart/form-data"  >
              @csrf
              
              <div class="row gy-4">

                <div class="col-md-6">
                  <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    placeholder="Your Name" 
                    required
                    value="{{ old('name') }}"
                  />
                  @error('title')
                    <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-md-6 ">
                  <input 
                    type="email" 
                    class="form-control" 
                    name="email" 
                    placeholder="Your Email" 
                    required
                  />
                  @error('email')
                    <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-md-12">
                  <input 
                    type="text" 
                    class="form-control" 
                    name="subject" 
                    placeholder="Subject" 
                    required
                  />
                  @error('subject')
                    <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-md-12">
                  <textarea
                    class="form-control" 
                    name="message" 
                    rows="6" 
                    placeholder="Message" 
                    required>{{ old('description') }}</textarea>
                
                  @error('message')
                    <p class="text-danger fs-6 fw-lighter">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-md-12 text-center">
                  <button class="text-white" type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- End Contact Section -->
</x-layout>