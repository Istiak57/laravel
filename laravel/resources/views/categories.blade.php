@extends('frontend.layouts.frontend_master')


@section('content')

  <div class="row">
  	 @foreach ($categories as $category)

  	    <div class="col-md-4">
  	    	<div class="category_by_id">
  	    		<h3>{{ $category->name }}</h3>

  	    	</div>
          <a href="{{ url('/category') }}/{{ $category->id }}" class="readmore">checkout</a>
  	    	
  	    </div>
 	
     @endforeach
  </div>
 
 

@endsection