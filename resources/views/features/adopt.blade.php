 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 accent-color">Adopt a Pet</h1>
 </div>

 @if (count($pet) > 0)

     <div class="row row-cols-1 row-cols-md-4">

         @foreach ($pet as $pets)
             <?php
             $json = $pets->pet_image;
             $json = json_decode($json);
             
             $firstImage = $json[0];
             ?>

             <div class="col mb-4">
                 <div class="card h-100">
                     <a href="{{ route('adoption.show', $pets->id) }}" class="stretched-link">
                         <img src="{{ asset('pet/' . $pets->id . '/' . $firstImage) }}"
                             class="card-img-top card-img-style img-responsive" alt="Pet Image"></a>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-10">
                                 <h5 class="card-title pet-name">{{ $pets->name }}</h5>
                                 <span class="pet-breed">{{ $pets->breed }}</span></br>
                                 <span class="pet-detail">{{ $pets->gender }}, {{ $pets->stage }}, {{ $pets->age }} {{ $pets->unit }}</span>
                             </div>
                             <div class="col-2 side-icon d-flex justify-content-center align-items-end">

                                 @if ($pets->type == 'Dog')
                                     <i class="fas fa-paw pet-icon"> </i>
                                 @else
                                     <i class="fas fa-cat pet-icon"></i>
                                 @endif

                             </div>
                         </div>


                     </div>
                 </div>
             </div>
         @endforeach

     </div>

     <div class="d-grid gap-2 mt-5 d-md-flex justify-content-md-end">
         {{ $pet->links() }}
     </div>
 @else
     <div class="card mt-3">
         <div class="card-body" style="font-weight: 400; font-size: 1rem;">
             There are no pets to show.
         </div>
     </div>
 @endif
