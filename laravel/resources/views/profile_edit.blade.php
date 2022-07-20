@extends('frontend.layouts.frontend_master')


@section('content')

<div id="profile_page" class="container" >

	<div class="row">
			
		<div class="col-md-6 m-auto">

			<div class="testimonial2">

				 <form action="{{ url('home/profile/edit/post/') }}/{{ $edit_profile->id }}" method="post" enctype="multipart/form-data">
              	@csrf
              <div class="card-body">	

						<div class="form-group">
							<label for="exampleInputEmail1">name</label>
							<input class="form-control" id="exampleInputEmail1" type="text" name="name" value="{{ $edit_profile->fullname }}">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Gender</label>
							<input class="form-control" id="exampleInputEmail1" type="text" name="gender"  value="{{ $edit_profile->gender }}">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Birthday</label>
							<input class="form-control" id="exampleInputEmail1" type="date" name="birthday"  value="{{ $edit_profile->birthdate }}">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Address</label>
							<input class="form-control" id="exampleInputEmail1" type="text" name="address"  value="{{ $edit_profile->address }}">
						</div>
						<div class="form-group">
							<label for="exampleFormControlFile1">new image</label>
							<input type="file" class="form-control-file" id="exampleFormControlFile1" name="newimage">
						</div>

					</div>	
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
				
			</div>
			
		</div>	

			

	</div>
	
</div>

@endsection