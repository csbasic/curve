@if (session('message'))
   <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed-top  mx-auto">
      <p>
         {{ session('message') }}
      </p>
   </div>
@endif

{{-- @if (session('message'))
            <div class="mt-1" x-data="{show: true}" x-init="setTimeout(() => show = false, 4500)" x-show="show">
                    <span class="font-bold uppercase" style="margin-right: 10px font-weight-bold">
                        Welcome {{ auth()->user()->name }}
                    </span> |
            </div>
            @endif --}}