@php

  $subtitle = "Posts List Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less  informed than the masses.";

  $page = 'Posts';
  $posts = $cluster['posts'];
@endphp

<x-layout>

    @include('partials._breadcrumbs', ['page' => $page, 'subtitle' => $subtitle])

    <section id="blog" class="blog">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 posts-list">

          @unless (!count($posts) > 0)
            @foreach ($posts as $key => $post)
              <x-article-card :post="$post" :from="''" /> 
            @endforeach
            @else
            <h3 class="align-items-center">No listing found </h3>
          @endunless

        </div>
      </div>
      <div class="pagination justify-content-center  ">
          {{ $posts->links() }}
      </div> 
    </section>

  
</x-layout>