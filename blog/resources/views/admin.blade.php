<!DOCTYPE html>
<html lang="en">
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/reg.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Admin</title>
	</head>
	<body>
		<div class="container">
      @if (count($errors) > 0)
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
 @endif
</div>

@if(Session::has('warining'))
<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><em> {!! session('warining') !!}</em></div>
@endif
@if(Session::has('flash_message'))
<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Fekrety Online</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="admin.login">
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required="required"/>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required="required"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
							<input type="submit"  value="Login" class="btn btn-primary btn-lg btn-block login-button"/>
						</div>
            
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>
