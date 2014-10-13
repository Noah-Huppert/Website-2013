<!DOCTYPE HTML>
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
			.ArchiveTitle {
				width: 100%;
				margin-bottom: 20px;
				text-align: center;
				font-size: 40px;
				font-family: Pompiere;
			}
			.archiveLink {
				margin: auto;
				color: #000000;
				text-decoration: none;
			}
			.archivePosts {
				width: 100%;
			}
			.archivePost {
				width: 50%;
				margin: auto;
				margin-top: 20px;
				padding-bottom: 40px;
				border-style: none;
				border-bottom-style: solid;
				border-bottom-width: 1px;
				border-bottom-color: #C7C7C7;
			}
			.archivePostTitle {
				font-size: 26px;
				font-family: Yanone Kaffeesatz;
			}
			.archivePostTag {
				font-size: 20px;
				font-family: Yanone Kaffeesatz;
				float: left;
			}
			.archivePostDate {
				font-size: 20px;
				font-family: Yanone Kaffeesatz;
				float: right;
			}
		</style>
	</head>
	<body>
		<?php
		include 'header.php';
		if (isset($_GET['catagory'])) {
			$catagory = $_GET['catagory'];
		}
		?>
		<div class="ArchiveTitle">
			<?php echo ucfirst($catagory); ?> 
		</div>
		<div id="archivePosts">
			<?php
			$query = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY 'postDate'");

			if (strcmp($catagory, 'archive') == 0) {
				while ($row = mysqli_fetch_array($query)) {
					echo "
<a class='archiveLink' href='viewPost.php?postKey=" . $row['postKey'] . "'>
<div class='archivePost'>
<div class='archivePostTitle'> " . $row['postTitle'] . "
</div>
<div class='archivePostTag'>" . $row['postTag'] . "
</div>
<div class='archivePostDate'>" . $row['postDate'] . "
</div>
</div>
</a>
";

				}
			}

			if (strcmp($catagory, 'archive') != 0) {
				while ($row = mysqli_fetch_array($query)) {
					if (strcmp($row['postTag'], ucfirst($catagory)) == 0) {
						echo "
<a class='archiveLink' href='viewPost.php?postKey=" . $row['postKey'] . "'>
<div class='archivePost'>
<div class='archivePostTitle'> " . $row['postTitle'] . "
</div>
<div class='archivePostTag'>" . $row['postTag'] . "
</div>
<div class='archivePostDate'>" . $row['postDate'] . "
</div>
</div>
</a>
";
					}
				}
			}
			?>
		</div>
		</div>
	</body>
</html>