@php
  $page = 'Posts';
$postsPicsUrl = [ 'assets/img/blog/blog-1.jpg',  'assets/img/blog/blog-2.jpg' , 'assets/img/blog/blog-1.jpg', 'assets/img/blog/blog-6.jpg', 'assets/img/blog/blog-3.jpg' ,  'assets/img/blog/blog-6.jpg', 'assets/img/blog/blog-1.jpg', 'assets/img/blog/blog-4.jpg' ,  'assets/img/blog/blog-5.jpg', 'assets/img/blog/blog-6.jpg'];

$postsAuthors = ['assets/img/blog/blog-author.jpg', 'assets/img/blog/blog-author-6.jpg',  'assets/img/blog/blog-author-2.jpg', 'assets/img/blog/blog-author.jpg', 'assets/img/blog/blog-author-3.jpg', 'assets/img/blog/blog-author-6.jpg', 'assets/img/blog/blog-author-4.jpg', 'assets/img/blog/blog-author-5.jpg', 'assets/img/blog/blog-author.jpg', 'assets/img/blog/blog-author-6.jpg' ];
  // dd($posts);

  $posts = $cluster['posts'];
  // dd($cluster['categories']);
  // dd($posts[0]->category->post);
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
          {{-- @php
            dd($post);
          @endphp --}}
              <x-article-card :post="$post" :author="$postsAuthors[$key]" :image="$postsPicsUrl[$key]" /><!-- End post list item -->  
            @endforeach
            @else
            <h3 class="align-items-center">No listing found </h3>
          @endunless

        </div><!-- End blog posts list -->

        <div class="pagination d-flex justify-content-center">
          <ul>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div><!-- End pagination -->

      </div>

    </section><!-- End Blog Section -->

  
</x-layout>