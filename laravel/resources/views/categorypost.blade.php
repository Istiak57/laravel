@extends('frontend.layouts.frontend_master')


@section('content')

<div class="container-fluid">
 	  <div>
 	 	<h1 class="text-center">Category:: {{ $category_by_ids->name }}</h1>
 	 </div>
 	 <div class="container">
 	 	<div class="row">
 	 		<div class="col-md-8">
 	 				<div class="row ">
 		<div class="col-md-12">
 			<div class="row ">
 				@foreach ($posts as $post)
 				<div class="col-lg-6 m-auto ">

 					
 						<div class="card  " style="width: 22rem;">
 						<img src="{{ asset('uploads/post_photos') }}/{{ $post->image }}">
 						<div class="card-body">
 							<h5 class="card-title">{{  $post->post_name }}</h5>
 							
 							<p class="card-text">{{ $category_by_ids->name  }}</p>
 							<a href="{{ url('category/post') }}/{{ $post->id  }}" class="btn btn-primary">view full..</a>
 						</div>
 			        </div>
 					
 					
 				</div>
 				@endforeach
 				
 				

 			</div>

 			

 			

 		

 			
 			
 			
 		</div>
 		
 	</div>
 	 			
 	 		
 	 	
 	 </div>


 	
 
 		

 	
 </div>

@endsection