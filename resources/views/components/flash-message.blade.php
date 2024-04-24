@if (session('message'))
   <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed-top  mx-auto">
      <p>
         {{ session('message') }}
      </p>
   </div>
@endif
