@extends('frontend.layouts.frontend_master')


@section('content')

<div class="container-fluid">
	<div>
		<h1 class="text-center">Post Title:: {{ $singlepost->post_name }}</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row ">
					<div class="col-md-12">
						<div class="row ">

							<div class="col-md-10 m-auto ">


								<div class="card  " style="width: 38rem;">
									<img src="{{ asset('uploads/post_photos') }}/{{ $singlepost->image }}">
									<div class="card-body">
										<h5 class="card-title">{{  $singlepost->post_name }}</h5>

										<p class="card-text">{{ $singlepost->category->name  }}</p>
										<p class="card-text single_description"> {{  $singlepost->description }}  </p>

									</div>
								</div>


							</div>




						</div>










					</div>

				</div>

			</div>

		</div>


	</div>


</div>

@endsection