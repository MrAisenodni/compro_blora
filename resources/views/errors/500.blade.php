<!DOCTYPE html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('/storage/logo_satu_sehat.webp') }}" type="image/png" />
	<!-- loader-->
	<link href="{{ asset('/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/icons.css') }}" rel="stylesheet">
	<title>500 - Bridging Satu Sehat LAWU</title>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="error-500 d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="card py-5">
					<div class="row g-0">
						<div class="col col-xl-5">
							<div class="card-body p-4">
								<h1 class="display-1"><span class="text-primary">5</span><span class="text-danger">0</span><span class="text-success">0</span></h1>
								<h2 class="font-weight-bold display-4">Internal Server Error</h2>
								<div class="mt-5"> <a href="{{ env('APP_CODE') }}/" class="btn btn-primary btn-lg px-md-5 radius-30">Home</a>
									<a href="{{ url()->previous() }}" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Kembali</a>
								</div>
							</div>
						</div>
						<div class="col-xl-7">
							<img src="{{ asset('/images/errors-images/505-error.png') }}" class="img-fluid" alt="">
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
		<div class="bg-white p-3 fixed-bottom border-top shadow">
			<div class="d-flex align-items-center justify-content-between flex-wrap">
				<p class="mb-0">Copyright © 2023. All right reserved.</p>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<!-- Bootstrap JS -->
	<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>