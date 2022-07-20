@extends('frontend.layouts.frontend_master')


@section('content')

  <div class="row">
  	 @foreach ($categories as $category)

  	    <div class="col-md-4">
  	    	<div class="category_by_id">
  	    		<h3>{{ $category->name }}</h3>
  	    		
                 <a href="">checkout..</a>
  	    		
  	    	</div>
  	    	
  	    </div>
 	
     @endforeach
  </div>
 
 

@endsection