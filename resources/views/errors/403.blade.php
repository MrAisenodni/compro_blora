<!doctype html>
<html lang="en">

<head>
<title>403 | Company Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="{{ env('APP_NAME') }}">
	<meta name="author" content="Muhammad Fiqri Alfayed">

	<link rel="icon" href="{{ asset('/storage/favicon.ico') }}" type="image/x-icon">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('/admin/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/vendor/font-awesome/css/font-awesome.min.css') }}">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('/admin/css/main.css') }}">
	<style>
		.auth-main.hospital:after {
			background: url(admin/images/hospital_auth_bg.jpg) no-repeat top left fixed;
		} 
	</style>
</head>

<body data-theme="light" class="font-nunito">
	<!-- WRAPPER -->
	<div id="wrapper" class="theme-cyan">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main hospital">
				<div class="auth-box">
                    <div class="top">
                        <img src="{{ asset('/admin/images/logo-white.svg') }}" alt="Iconic">
                    </div>
					<div class="card">
                        <div class="header">
                            <h3>
                                <span class="clearfix title">
                                    <span class="number left">Error</span> <span class="text">403 <br/>Forbiddon Error!</span>
                                </span>
                            </h3>
                        </div>
                        <div class="body">
                            <p>You don't have permission to access / on this server.</p>
                            <div class="margin-top-30">
                                <a href="javascript:history.go(-1)" class="btn btn-default"><i class="fa fa-arrow-left"></i> <span>Go Back</span></a>
                                <a href="/" class="btn btn-primary"><i class="fa fa-home"></i> <span>Home</span></a>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>

