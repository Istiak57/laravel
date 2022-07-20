@extends('frontend.layouts.frontend_master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto sign_form">
                <div class="m-5"  >
                    
                    <form action="{{ url('/registration') }}" method="post">
                        @csrf
                      

                         <div>
                            <h3 class="text-center" style="color: green">Sign Up</h3>

                            @if (session('success_msg'))
                                    <div class="alert alert-success">
                                        {{ session('success_msg')  }}
                                    </div>
                                @endif
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="user_name">
                         @error('user_name')
                                   <div class="alert alert-danger">
                                    {{ $message }}
                                   </div>
                                 @enderror
                        
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="user_email">
                        @error('user_email')
                                   <div class="alert alert-danger">
                                    {{ $message }}
                                   </div>
                                 @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password">
                         @error('password')
                                   <div class="alert alert-danger">
                                    {{ $message }}
                                   </div>
                                 @enderror
                    </div>

                    

                     <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Signup</button> <a href="{{ url('/signin') }}">already have an account??</a>
                    </div>
                    
                    
                </form>
                </div>
                
               
            </div>
        </div>
    </div>
    @endsection
