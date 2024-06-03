<!doctype html>
<html lang="en">

<head>
<title>503 | Company Profile</title>
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
		.card {
			width: 125%;
		}
		.auth-main::before {
			width: 450px;
		}
		.auth-main.hospital:after {
			background: url(storage/backgrounds/1.jpeg) no-repeat top right fixed;
			width: 100%;
			max-height: 100%;
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
                        <img src="{{ asset('/storage/logo_header_back.png') }}" alt="{{ env('APP_NAME') }}" style="width: 250px">
                    </div>
					<div class="card">
                        <div class="header">
                            <h3>
                                <span class="clearfix title">
                                    <span class="number">503</span> <br>
                                    <span>Coming Soon</span>
                                </span>
                            </h3>
                        </div>
                        <div class="body">
                            <p>Halaman masih dalam tahap pembuatan.
                                <br>Silahkan dicoba lagi nanti.</p>
                            <p><a href="/" class="btn btn-primary"><i class="fa fa-home"></i> <span>Home</span></a></p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>

