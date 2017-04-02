@extends('layout.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@if(Session::has('permission'))
				<p class="alert alert-info"> {{ Session::get('permission') }} </p>
			@endif
			<form class="form" action="/note/forward" style="float:right;margin-right:100" method="post">
				{{method_field('PUT')}}
				{{ csrf_field() }}
				<input type="submit" name="forward" class="btn btn-danger" value="forward">
			</form>
			@if(Session::has('message'))
				<p class="alert alert-info"> {{ Session::get('message') }}</p>
			@endif
			<h3>List of notes</h3>

			<ul class="list-group">
				@foreach(App\Note::all() as $note)
				<li class="list-group-item">{{ $note->content }}
					<form class="cl" action="/note/delete/{{$note->id}}" method="post" style="float:right">
						{{ method_field('DELETE')}}
						{{csrf_field()}}
						<input type="submit" name="" value="del" class="link">
					</form>
			</li>
				@endforeach
			</ul>

			<h2> Add notes </h2>

			<form method="POST" action="/note/create">
				{{ csrf_field() }}
				<div class="form-group">
					<textarea name="content" class="form-control" placeholder="enter some notes"  required="true"></textarea>
				</div>
				<br/>
				<input type="submit" class="btn btn-primary" value="create note"/>
			</form>
		</div>
	</div>

</div>
@endsection
