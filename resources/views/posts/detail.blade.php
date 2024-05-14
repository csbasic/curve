@php
   $tags = explode(",", $post->tags);
  $link = "";
  $path = "";
   $subtitle = "Post Detail Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less  informed than the masses.";
  
  $from = $_GET['from'];
    if(isset($from) && $from == 'manage-posts') {
      $path = "/posts/manage";
      $link = "Manage Posts";
  } if (isset($from) && $from == "") {
    $path = "/posts";
    $link = "Recent Posts";
  } 
    
@endphp  

<x-layout>

   @include('partials._breadcrumbs', ['page' => $page, 'link' => $link, 'path' => $path, 'subtitle' => $subtitle])

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
                  <li class="d-flex align-items-center">
                    <i class="bi bi-person"></i> 
                    <a href="blog-details.html">{{ $post->user->name }}</a>
                  </li>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-clock"></i> 
                    <time datetime="2022-01-01">{{ date_format($post->created_at, "D M, Y - h:i") }}</time>
                    
                  </li>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-chat-dots"></i> 
                      12 Comments
                  </li>
                </ul>
              </div>
              <div class="content">
                <p>
                  {{ $post->description }}
                </p>

              </div>

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
              </div> 

            </article>

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div>

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  
                  @foreach ($categories as $category)
                    <li><a href="#">{{  $category->name }} <span>{{ $category->posts->count() }}</span></a></li>
                  @endforeach
                
                </ul>
              </div>

              <div class="sidebar-item tags">
                <h3 class="sidebar-title">Tags</h3>
                <ul class="mt-3">
                  @foreach ($tags as $tag)
                    <li><a href="#">{{ $tag }}</a></li>
                  @endforeach
                </ul>
              </div>

            </div>

          </div>

        </div>

      </div>

    </section>
</x-layout>