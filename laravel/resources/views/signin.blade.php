@extends('frontend.layouts.frontend_master')


@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-6 m-auto sign_form">
                <div class="m-5 "  >
                     @if (session('fail'))
                                    
                                  <div class="alert alert-danger">
                                        {{ session('fail')  }}
                                    </div> 
                                    
                                @endif
                    
                    <form action="{{ url('/userlogin') }}" method="post">
                        @csrf
                        <div>
                            <h3 class="text-center">Sign in</h3>

                            @if (session('neg_msg1'))
                                    <div class="alert alert-danger">
                                        {{ session('neg_msg1')  }}
                                    </div>
                                @endif

                                @if (session('neg_msg2'))
                                    <div class="alert alert-danger">
                                        {{ session('neg_msg2')  }}
                                    </div>
                                @endif
                        </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                          @error('email')
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

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember_me">
                      <label class="form-check-label" for="remember_me">
                        Remember me
                    </label>
                </div>


                     <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Signin</button> <a href="{{ url('signup') }}">create new account</a>
                    </div>
                    
                    
                </form>
                </div>
                
               
            </div>
        </div>
    </div>

    @endsection
