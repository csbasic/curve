@php
  
@endphp
<div data-aos="fade" class="page-title">
  
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <div class="container section-title part-vertical" data-aos="fade-up">
            <h2>Curve</h2><p class="mb-0">
              @isset($subtitle)
                {{ $subtitle }}
                @else
              Curve is determined at bridging the gap that has been created by misconceptions and self in order to recue our the world which has denied essense for impression.'
              @endisset
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
          @isset($link)
            <li>@isset($path)
              <a href="@isset($path){{ $path }}@endisset">{{ $link }}</a>
              @else
              {{ $link }}
            @endisset</li>
          @endisset
          <li class="current">{{ $page }}</li>
      </ol>
    </div>
  </nav>
</div>
