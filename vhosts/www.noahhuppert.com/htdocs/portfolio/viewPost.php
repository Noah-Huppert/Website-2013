<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="http://www.noahhuppert.com/favicon.ico">
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		<link href='http://fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
		<link href="headerfooter.css" rel="stylesheet" type="text/css">
		<style>
			.contentArea {
				width: 73%;
				height: 100%;
				margin: auto;
			}
			.postTitle {
				margin-top: 40px;
				font-size: 30px;
				font-style: italic;
				font-weight: bold;
				font-family: Pompiere;
			}
			.postTag {
				margin-top: 5px;
				font-size: 20px;
				font-style: italic;
				font-family: Yanone Kaffeesatz;
				float: left;
			}
			.postDate {
				margin-top: 5px;
				font-size: 20px;
				font-style: italic;
				font-family: Yanone Kaffeesatz;
				float: right;
			}
			.postContent {
				width: 97%;
				margin: auto;
				margin-top: 50px;
				font-size: 18px;
				font-family: Karla;
			}
		</style>
	</head>
	<body onload="init();" style="margin: 0;">
		<?php
		include 'header.php';
		?>

		<div class="contentArea">
			<?php
			if (isset($_GET['postKey'])) {
				$postKey = $_GET["postKey"];
				$query = mysqli_query($connect, "SELECT * FROM `portfolio` ORDER BY 'postDate'");

				while ($row = mysqli_fetch_array($query)) {
					if ($row['postKey'] == $postKey) {
						echo "
<div class='postTitle'>" . $row['postTitle'] . "</div>
<div class='postTag'>" . $row['postTag'] . "</div>
<div class='postDate'>" . $row['postDate'] . "</div>
<div class='postContent'>" . $row['postContent'] . "</div>";
					}
				}
			}
			?>
		</div>

		<?php
		include 'footer.php';
		?>
	</body>
</html>