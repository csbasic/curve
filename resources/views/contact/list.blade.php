<x-layout>
   @include('partials._breadcrumbs', ['page' => 'Contacts'])
   <div class="row  justify-content-between"  data-aos="fade-up" data-aos-delay="100">
      <div class="col-md-6 offset-md-3">
         <table class="table ">
            <tbody>
               @unless ($contacts->isEmpty())
                  @foreach ($contacts as $contact)
                     
                  <tr class="p-3">
                     <td class="text-primary mt-3">
                     <div class="mt-3">
                        <a href="/contacts/{{ $contact->id }}/detail">
                              {{ $contact->subject }}
                        </a>
                     </div>
                     </td>
                     <td class="">
                        <div class="mt-3">
                           <a href="/posts/{{ $contact->id }}/edit"
                              class="mt-5 text-dark"></i>Edit
                              <i class="bi bi-pencil"></i>
                           </a>
                        </div>
                     </td>
                     <td class=" mt-3 mb-0">
                        <form class="pt-2"  action="/contacts/{{ $contact->id }}/delete" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="button" onclick="alert('Do you really want to take this action!')" class="btn text-danger"> Delete <i class="bi bi-pencil"></i>
                           </button>
                        </form>
                     </td>
                     <td>
                        @if ($contact->status == 0)
                        <div class="mt-3">Read</div>
                        @else
                           <div class="mt-3">Not Read</div>
                        @endif
                     </td>
                  </tr>
                  
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
   </div>
</x-layout>