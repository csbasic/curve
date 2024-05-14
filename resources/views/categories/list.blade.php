@php
   $subtitle = "categories List Subtitle We need not to have biases if the goal of dispensing information is to educate the masses. Our world is dying and crumbling because those who wants to educate others are less  informed than the masses.";
@endphp
<x-layout>
   @include('partials._breadcrumbs', ['page' => 'Categories'])
   <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
         <div class="col-md-6 offset-md-2">
            <table class="table ">
               <tbody>
                  @unless ($categories->isEmpty())
                     @foreach ($categories as $category)
                        @if ($category->id != auth()->id())
                           <tr class="p-3">
                              <td class="text-primary mt-3">
                                 <div class="mt-3 text-black">
                                    {{ $category->name }}
                                 </div>
                              </td>
                              <td class="">
                                 <div class="mt-3">
                                    <a href="/categories/{{ $category->id }}/edit"
                                       class="mt-5 text-dark"></i>Edit
                                       <i class="bi bi-pencil"></i>
                                    </a>
                                 </div>
                              </td>
                              <td class=" mt-3 mb-0 mr-0" style="width: 120px">
                                 <form class="pt-2"  action="/categories/{{ $category->id }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                       onclick="return confirm('Are you sure?')"
                                       class="btn text-danger"> Delete <i class="bi bi-pencil"></i>
                                    </button>
                                 </form>
                              </td>
                           </tr>
                        @endif
                     @endforeach
                  @else
                  <tr class="border-gray-300">
                     <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Message Found!</p>
                     </td>
                  </tr>
                  @endunless
                  
               </tbody>
            </table>
         </div>
      
         <div class="col-md-3 mt-3">
            <div class=" ">
               <a class="btn btn-outline-danger" href="/categories/create">Create Category</a>
            </div>
         </div>

      </div>
   </div>
</x-layout>