@extends('layouts.app')

 <style>
 		
    .profile-img {
    	max-width: 150px;
    	border: 5px solid #fff;
    	border-radius: 100%;
    	box-shadow: 0 2px 2px rgba(0,0,0,0.3);
    }

 </style>

@section('content')

	<div class="row">
		
		<div class="col-md-6 col-md-offset-3">
			
			<div class="panel panel-default">
				
				<div class="panel panel-body text-center">
					
					<img class="profile-img" src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/supportmale-256.png" alt="">

					<h2>{{$user->username }}</h2>
					<h5>{{$user->email}}</h5>
					<h5>{{$user->dob}}</h5>

						<button class="btn btn-primary">Follow</button>

				</div>

			</div>

		</div>			

	</div>

@endsection