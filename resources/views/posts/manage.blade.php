<x-layout>
   @include('partials._breadcrumbs', ['page' => $page])
   <div class="row  justify-content-between">
      <div class="col-md-6 offset-md-3">
         <table class="table ">
            <tbody>
               @unless ($posts->isEmpty())
                  @foreach ($posts as $post)
                     
                  <tr class="p-3">
                     <td class="text-primary mt-3">
                     <div class="mt-3">
                        <a href="/posts/{{ $post->id }}/detail">
                              {{ $post->title }}
                        </a>
                     </div>
                     </td>
                     <td class="">
                        <div class="mt-3">
                           <a href="/posts/{{ $post->id }}/edit"
                              class="mt-5">
                              <i class="fa-solid btn fa-pen-to-square"></i>Edit
                           </a>
                        </div>
                     </td>
                     <td class=" mt-3 mb-0">
                        <form class="pt-2"  action="/posts/{{ $post->id }}/delete" method="POST">
                           @csrf
                           @method('DELETE')
                           <button class="btn"><i class="fa-solid fa-trash pt-4"></i> Delete </button>
                        </form>
                     </td>
                  </tr>
                  
                  @endforeach
                  @else
                  <tr class="border-gray-300">
                     <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No post Found!</p>
                     </td>
                  </tr>
               @endunless
            </tbody>
         </table>
      </div>
      <div class="row col-md-3 mt-3">
         <div class=" ">
            <a class="btn btn-danger" href="/post/create">Create Post</a>
         </div>
      </div>
   </div>
</x-layout>