@extends('layout.master')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel">
				<div class="panel-heading">
					<h1 class="panel-title">Register</h1>
				</div>
				<div class="panel-body">
					<form method="POST" action="/register">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="input-form">
								<span class="input-group-addon"><i class="fa fa-envelop"></i></span>
								<input type="email" name="email" class="form-control" placeholder="example@domain.com"/>
							</div>
						</div>
						<div class="form-group">
							<div class="input-form">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" name="firstname" class="form-control" placeholder="user name" required="true" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-form">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" name="lastname" class="form-control" placeholder="last name" required="true" />
							</div>
						</div>
					
						<div class="form-group">
							<div class="input-form">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password" class="form-control" placeholder="password"/>
							</div>
						</div>
						<div class="form-group">
							<div class="input-form">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="confirm-password" class="form-control" placeholder="confirm password "/>
							</div>
						</div>
						<br/>
						<input type="submit" name="submit" value="register" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection