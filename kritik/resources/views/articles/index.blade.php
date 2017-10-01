@extends('layouts.app')

@section('content')

<div class="row">

	@forelse($articles as $article)
			<div class="col-md-6 col-md-offset-3">
			
			<div class="panel panel-default">
				
				<div class="panel-heading">
					
					<span>Pengguna {{$article->user_id}} </span>
					<span class="pull-right">{{$article->created_at->diffForHumans()}}</span>

				</div>

				<div class="panel-body">
					
				 {{$article->ShortContent}}	

				 <a href="/articles/{{ $article->id }}">Read More</a>

				</div>

				<div class="panel-footer clearfix" style="background-color: white">

					@if($article->user_id == Auth::id())

					<form action="/articles/{{$article->id}}" method="POST" class="pull-right" style="margin-left: 25px">

					{{csrf_field()}}
					{{method_field('DELETE')}}
						
						<button class="btn btn-danger btn-sm">
							Delete
						</button>

					</form>

					@endif
					<i class="fa fa-thumbs-o-up pull-right " aria-hidden="true"></i>


				</div>

			</div>

		</div>	
		@empty
		No Articles

	@endforelse
		
			

	</div>
	<div class="row">
		
		<div class="col-md-4 col-md-offset-4">
			
			{{$articles->links()}}

		</div>
	</div>

@endsection