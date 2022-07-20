@extends('frontend.layouts.frontend_master')


@section('content')

<div id="profile_page" class="container" >

	<div class="row">
		<div class="col-md-12 heading_div">
                <h2 class="section-heading ">Profile</h2>
          </div>
		<div class="col-md-4">

			<div class="testimonial">

				<img src="{{ asset('uploads/profile') }}/{{ $user_profile->photo }}" alt="">
				<div class="testimonial_text">	
					<div class="user_name"><b><i>{{ $user_profile->fullname }}</i></b></div>
					<div class="user_email"><b><i>{{ $user->email }}</i></b></div>
				</div>
				
			</div>
			
		</div>	
		<div class="col-md-6">

			<div class="testimonial2">

				<form>

					@csrf
					<div class="card-body">	

						<div class="form-group">
							<label for="exampleInputEmail1">Gender</label>
							<input class="form-control" id="exampleInputEmail1" type="none" value="{{ $user_profile->gender }}" readonly >
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Birthday</label>
							<input class="form-control" id="exampleInputEmail1" type="text"  value="{{  \Carbon\Carbon::parse($user_profile->birthdate)->format('d/M/Y') }}" readonly >
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Address</label>
							<input class="form-control" id="exampleInputEmail1" type="text" value="{{ $user_profile->address }}" readonly  >
						</div>
					</div>	
					
					
				</form>
				
			</div>
			
		</div>	

		<div class="col-md-2">
			<div class="testimonial2 m-auto ">
				<div class="">
					<a class="btn btn-info  text-center  "  href="{{ url('home/profile/edit') }}/{{ $user_profile->id }}"> edit</a>
				</div>
				
			</div>

		</div>	

	</div>
	
</div>

@endsection