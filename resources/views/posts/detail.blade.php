
@php
   $page =   $page ;
  //  $post = $post[0];
  //  dd($post->category);
   $tags = explode(",", $post->tags);
  //  dd($tags);
@endphp
<x-layout>
   @include('partials._breadcrumbs', ['page' => $page])
   <!-- Blog-details Section - Blog Details Page -->
    <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="article">

              <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{ $post->title }}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{ $post->author_name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p>
                  {{ $post->description }}
                </p>

              </div>--><!-- End post content -->

           <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">{{ $post->category->name }}</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  @foreach ($tags as $tag)
                    <li><a href="#">{{ $tag }}</a></li>
                  @endforeach
                </ul>
              </div>  <!--  End meta bottom -->

            </article><!-- End post article -->

          

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>
              </div><!-- End sidebar categories-->

              

              <div class="sidebar-item tags">
                <h3 class="sidebar-title">Tags</h3>
                <ul class="mt-3">
                  @foreach ($tags as $tag)
                    <li><a href="#">{{ $tag }}</a></li>
                  @endforeach
                  
                
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End Sidebar -->

          </div>

        </div>

      </div>

    </section><!-- End Blog-details Section -->
</x-layout>