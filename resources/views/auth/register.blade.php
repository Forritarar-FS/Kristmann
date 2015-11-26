@extends('app')

@section('content')

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form role="form" method="POST" action="/">
					  <input type="hidden" name="_token" value="{{ csrf_token() }}">
					  <div class="form-group">
					    <label>Firstame</label>
					    <input type="text" class="form-control" name="firstname" placeholder="gulli " >
					  </div>
					  <div class="form-group">
					    <label>Lastame</label>
					    <input type="text" class="form-control" name="lastname" placeholder="kallasson" >
					  </div>
					  <div class="form-group">
					    <label>Userame</label>
					    <input type="text" class="form-control" name="username" placeholder="gullinn-123" >
					  </div>
					  <div class="form-group">
					    <label>Email</label>
					    <input type="email" class="form-control" name="email" placeholder="gulli.kalli@example.com">
					  </div>
					  <div class="form-group">
					    <label>Password</label>
					    <input type="password" class="form-control" name="password" placeholder="********" >
					  </div>
					  <div class="form-group">
					    <label>Comfirm Password</label>
					    <input type="password" class="form-control" name="comf_pass" placeholder="********" >
					  </div>
					  <div class="form-group">
					    <label>Description</label>
					    <textarea class="form-control" rows="8" cols="30" name="description" placeholder="Write A Description About Yourself"></textarea>
					  </div>
					  <div class="form-group">
					    <input type="hidden" class="form-control" name="profilephoto">
					  </div>
					  <div class="form-group">
					    <button type="submit" class="btn btn-primary btn-lg"> Sign Up</button>
					  </div>
					</form>

						@stop
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
