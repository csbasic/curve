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
                              class="mt-5 text-dark"></i>Edit
                              <i class="bi bi-pencil"></i>
                           </a>
                        </div>
                     </td>
                     <td class=" mt-3 mb-0">
                        <form class="pt-2"  action="/posts/{{ $post->id }}/delete" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="button" onclick="alert('Do you really want to take this action!')" class="btn text-danger"> Delete <i class="bi bi-pencil"></i>
                           </button>
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
            <a class="btn btn-outline-danger" href="/post/create">Create Post</a>
         </div>
      </div>
   </div>
</x-layout>