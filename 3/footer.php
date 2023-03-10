<!DOCTYPE html>
<html>

<head>
	<title>Inline CSS Footer with Bootstrap CDN and Font Awesome Icons</title>
	<!-- Bootstrap CDN stylesheet -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
	<!-- Font Awesome CDN stylesheet -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
		/* Footer styles */
		footer {
			background-color: #343a40;
			color: #fff;
			position: bottom;
			bottom: 0;
			left: 0;
			width: 100%;
			padding: 20px 0;
			text-align: center;
			margin-top: 40px;
		}

		/* Icon styles */
		footer i {
			font-size: 20px;
			margin: 0 10px;
		}
	</style>
</head>

<body>
	<footer>
		<div class="container">
			<p style="font-size: 14px;color: #888;text-align: center;">Welcome to our Free Download/Upload service! We're a team of dedicated individuals who are passionate about providing a simple and efficient platform for users to share and access digital files for free!

</p>
<p>&copy; 2023 My Website</p>

			<div>
				<a href="#"><i class="fab fa-facebook"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
			</div>
			
		</div>
	</footer>
	<!-- Bootstrap CDN JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>