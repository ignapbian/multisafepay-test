@extends('layouts.master')
@section('content')
<h1>Pictures PIXABAY</h1>
<h3>Using api cache left: {{$timeExpiration}} for renewal.</h3>
          <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
          @foreach ($picturesJson as $item)
               <div class="col">
                    <div class="p-3 border bg-light">
                         <div class="d-grid gap-2 col-6 mx-auto">
                              <div class="pop">
                                   <img src={{$item['largeImageURL']}} class="img-fluid" style="cursor: pointer">
                              </div>
                              <a type="button" class="btn btn-primary" href={{ route('save', $item['largeImageURL']) }}>Save</a>
                         </div>
                    </div>
               </div>
               <!-- Modal -->
               
          @endforeach
         </div>
         <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-body mb-0 p-0">
                         <img src="" id="imagepreview" alt="" style="width:100%">
                    </div>
                    <div class="modal-footer">
                         <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
                    </div>
               </div>
          </div>
     </div>
@stop