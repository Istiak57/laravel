@extends('frontend.layouts.frontend_master')


@section('content')
  
<div id="profile_page" class="container" >

	<div class="row">
		<div class="col-md-12 heading_div">
                <h2 class="section-heading ">Contact US</h2>
          </div>
		
		<div class="col-md-6 m-auto">
			 @if (session('success_msg'))
                                    <div class="alert alert-success">
                                        {{ session('success_msg')  }}
                                    </div>
                                @endif

			<div class="testimonial2">

				<form action="{{ url('contact/post') }}" method="post" enctype="multipart/form-data">

					@csrf
					<div class="card-body">	

						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input class="form-control" id="exampleInputEmail1" type="none" name="username" value="{{ Auth::user()->username }}" readonly >

							 @error('username')
                                   <div class="alert alert-danger">
                                    {{ $message }}
                                   </div>
                                 @enderror
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input class="form-control" id="exampleInputEmail1" type="text" name="email" value="{{ Auth::user()->email  }}" readonly >
							 @error('email')
                                   <div class="alert alert-danger">
                                    {{ $message }}
                                   </div>
                                 @enderror
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Subject</label>
							<input class="form-control" id="exampleInputEmail1" type="text" name="subject" >

							 @error('subject')
                                   <div class="alert alert-danger">
                                    {{ $message }}
                                   </div>
                                 @enderror
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Message</label>
							<textarea class="form-control" name="message"></textarea>
							 @error('message')
                                   <div class="alert alert-danger">
                                    {{ $message }}
                                   </div>
                                 @enderror
						</div>
					</div>	
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					
					
				</form>
				
			</div>
			
		</div>	

	

	</div>
	
</div>
@endsection