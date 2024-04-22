@props(['post', 'author', 'image'])
@php
   // dd($post->user);

   // $cat = $post->category;
   // $cat = explode(',', $cat)[0];
   // dd($authors);
@endphp

{{-- @props(['post']) --}}

<div {{ $attributes->merge(['class' => 'col-xl-4 col-lg-6']) }} >
     <article>
         <div class="post-img">
            {{-- <img src="assets/img/blog/index.jpg" alt="" class="img-fluid"> --}}
         {{-- {{ dd(asset("storage/".$post->image)) }} --}}
            <img src='{{$post->image ? asset("storage/".$post->image) : asset('assets/img/index.jpg') }}' alt="" class="img-fluid">
            {{-- <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a> --}}
         </div>
         

         <p class="post-category">{{ $post->category['name'] }}</p>

         <h2 class="title">
            <a href="/posts/{{ $post->id }}/detail">{{ $post->title }}</a>
         </h2>

         <div class="d-flex align-items-center">
            <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
               <p class="post-author">{{ $post->user['name'] }}</p>
               <p class="post-date">
                  <time datetime="2022-01-01">{{ date_format($post->created_at, "D M, Y - h:i") }}</time>
               </p>
            </div>
            
         </div>
   </article>
</div><!-- End post list item -->