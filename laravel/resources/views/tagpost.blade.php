@extends('frontend.layouts.frontend_master')


@section('content')

<div class="container-fluid">
 	  <div>
 	 	<h1 class="text-center">#tag:: {{ $tag_by_ids->tag_name }}</h1>
 	 </div>
 	 <div class="container">
 	 	<div class="row">
 	 		<div class="col-md-8">
 	 				<div class="row ">
 		<div class="col-md-12">
 			<div class="row ">
 				@foreach ($tagjoints as $tag)
 				<div class="col-lg-6 ">

 					
 						<div class="card  " style="width: 22rem;">
 						<img src="{{ asset('uploads/post_photos') }}/{{ $tag->image }}">
 						<div class="card-body">
 							<h5 class="card-title">{{  $tag->post_name }}</h5>
 							<p class="card-text single_description"> {{  $tag->description }}  </p>
 							
 							{{-- <p class="card-text">{{ $category_by_ids->name  }}</p> --}}
 							{{-- <a href="{{ url('category/post') }}/{{ $post->id  }}" class="btn btn-primary">view full..</a> --}}
 						</div>
 			        </div>
 					
 					
 				</div>
 				@endforeach
 				
 				

 			</div>

 			

 			

 		

 			
 			
 			
 		</div>
 		
 	</div>
 	 			
 	 		</div>
 	 		<div class="col-md-4 justify-content-center">

 	 			<div class="follwus mb-1 ">
 	 				
 	 				<div>
 	 					<h3>Follow us on </h3>
 	 				</div>
 	 				<div class="p-1 ">
 	 					<a href="" class="btn text-white m-1 w-50  " style="background-color: #3498db"> facebook</a>
 	 					<a href="" class="btn text-white m-1 w-50"style="background-color: #2980b9"> twitter</a>
 	 					<a href="" class="btn text-white m-1 w-50 " style="background-color: #9b59b6"> Instagram</a>
 	 					<a href="" class="btn text-white m-1 w-50" style="background-color: #2c3e50"> linkedin</a>
 	 				</div>
 	 			</div>

 	 			<div class="newsletter ">
 	 				<div>
 	 					<h3>Newsletter</h3>
 	 				</div>
 	 				<div class="p-1 ">
 	 					<p class="text-center">Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
 	 					<div class="input-group mb-3">
 	 						<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
 	 						<div class="input-group-append">
 	 							<button class="btn btn-outline-secondary" type="button">Button</button>
 	 						</div>
 	 					</div>
 	 					
 	 				</div>

 	 			</div>

 	 			<div class="newsletter ">
 	 				<div>
 	 					<h3>Trending</h3>
 	 				</div>
 	 				<div>
 	 					<div class="d-flex">
 	 						<div  class="m-1">
 	 							<img src="{{ asset('frontend/asset') }}/img/news-100x100-1.jpg"  width="100">
 	 						</div>
 	 						<div class="m-auto p-1">
 	 							<a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
 	 						</div>
 	 						
 	 						
 	 					</div>
 	 					<div class="d-flex">
 	 						<div  class="m-1">
 	 							<img src="{{ asset('frontend/asset') }}/img/news-100x100-1.jpg"  width="100">
 	 						</div>
 	 						<div class="m-auto p-1">
 	 							<a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
 	 						</div>
 	 						
 	 						
 	 					</div>
 	 					<div class="d-flex">
 	 						<div class="m-1">
 	 							<img src="{{ asset('frontend/asset') }}/img/news-100x100-1.jpg"  width="100">
 	 						</div>
 	 						<div class="m-auto p-1">
 	 							<a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
 	 						</div>
 	 						
 	 						
 	 					</div>
 	 					<div class="d-flex">
 	 						<div  class="m-1">
 	 							<img src="{{ asset('frontend/asset') }}/img/news-100x100-1.jpg"  width="100">
 	 						</div>
 	 						<div class="m-auto p-1">
 	 							<a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
 	 						</div>
 	 						
 	 						
 	 					</div>
 	 					<div class="d-flex">
 	 						<div  class="m-1">
 	 							<img src="{{ asset('frontend/asset') }}/img/news-100x100-1.jpg"  width="100">
 	 						</div>
 	 						<div class="m-auto p-1">
 	 							<a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
 	 						</div>
 	 						
 	 						
 	 					</div>
 	 					<div class="d-flex">
 	 						<div  class="m-1">
 	 							<img src="{{ asset('frontend/asset') }}/img/news-100x100-1.jpg"  width="100">
 	 						</div>
 	 						<div class="m-auto p-1">
 	 							<a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
 	 						</div>
 	 						
 	 						
 	 					</div>
 	 					<div class="d-flex">
 	 						<div  class="m-1">
 	 							<img src="{{ asset('frontend/asset') }}/img/news-100x100-1.jpg"  width="100">
 	 						</div>
 	 						<div class="m-auto p-1">
 	 							<a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
 	 						</div>
 	 						
 	 						
 	 					</div>
 	 				</div>

 	 			</div>
 	 			
 	 		</div>
 	 	</div>
 	 	<div class="d-flex justify-content-center">
 	 		<nav aria-label="Page navigation example">
 	 			<ul class="pagination">
 	 				<li class="page-item">
 	 					<a class="page-link" href="#" aria-label="Previous">
 	 						<span aria-hidden="true">&laquo;</span>
 	 						<span class="sr-only">Previous</span>
 	 					</a>
 	 				</li>
 	 				<li class="page-item"><a class="page-link" href="#">1</a></li>
 	 				<li class="page-item"><a class="page-link" href="#">2</a></li>
 	 				<li class="page-item"><a class="page-link" href="#">3</a></li>
 	 				<li class="page-item">
 	 					<a class="page-link" href="#" aria-label="Next">
 	 						<span aria-hidden="true">&raquo;</span>
 	 						<span class="sr-only">Next</span>
 	 					</a>
 	 				</li>
 	 			</ul>
 	 		</nav>
 	 	</div>
 	 	
 	 </div>


 	
 
 		

 	
 </div>

@endsection