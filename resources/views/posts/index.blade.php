@php
  $page = 'Posts';
  $posts = $cluster['posts'];
@endphp

<x-layout>

    <!-- Blog Page Title & Breadcrumbs -->
    @include('partials._breadcrumbs', ['page' => $page])
    <!-- End Page Title -->

    <!-- Blog Section - Blog Page -->
    <section id="blog" class="blog">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 posts-list">

          @unless (!count($posts) > 0)
            @foreach ($posts as $key => $post)
              <x-article-card :post="$post" /><!-- End post list item -->  
            @endforeach
            @else
            <h3 class="align-items-center">No listing found </h3>
          @endunless

        </div><!-- End blog posts list -->
       
        {{--   <div class="pagination d-flex justify-content-center">
          <ul>
            
          <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li> 
          </ul>
        </div>--}}
        <!-- End pagination -->

      </div>
      <div class="pagination justify-content-center  ">
          {{ $posts->links() }}
      </div> 
    </section><!-- End Blog Section -->

  
</x-layout>