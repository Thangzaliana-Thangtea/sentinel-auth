@extends('layout.master')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel">
					<div class="panel-heading">
						<h1 class="panel-title">Login</h1>
					</div>
					<div class="panel-body">
						@if(Session::has('message'))
							<p class="alert alert-danger"> {{ Session::get('message') }}</p>
						@endif
						<form method="POST" action="/login">
							{{ csrf_field() }}
							<div class="form-group">
								<div class="input-form">
									<span class="input-group-addon"><i class="fa fa-envelop"></i></span>
									<input type="email" name="email" class="form-control" placeholder="example@domain.com"/>
								</div>
							</div>
							<div class="form-group">
								<div class="input-form">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" name="password" class="form-control" placeholder="password" required="true" />
								</div>
							</div>
							<br/>
							<input type="submit" name="submit" class="btn btn-primary" value="Login"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
