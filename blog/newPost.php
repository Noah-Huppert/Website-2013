<!DOCTYPE HTML>
<html>
	<head>
		<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
		<style>
			body{
				background: url(Posting.jpg);
			}
		</style>
	</head>
	<body>
		<?php
		$postTitle = $_POST["postTitle"];
		$postTitleNoSpaces = str_replace(" ", "", $postTitle);
		$postContent = $_POST["postContent"];
		$postTag = $_POST["tag"];

		$newPostPointer = "posts/" . $postTitleNoSpaces . ".txt" . PHP_EOL;
		$newFileName = "posts/" . $postTitleNoSpaces . ".txt";
		$newPostFileContent[0] = $postTag . PHP_EOL;
		$newPostFileContent[1] = $postTitle . PHP_EOL;
		$newPostFileContent[2] = $postContent . PHP_EOL;
		$newPostFileContent[3] = "!end";

		$pointerFileLines = file("posts/postsIndex.txt");
		$pointerFileLines = str_replace("!end", $newPostPointer, $pointerFileLines);
		$pointerFileLines[count($pointerFileLines) + 1] = "!end";
		file_put_contents("posts/postsIndex.txt", $pointerFileLines);

		file_put_contents($newFileName, $newPostFileContent);
		echo '<script>window.location = "http://127.0.0.1:8888/projects/Paralax%20v2/";</script>';
		?>

		<script>
			$(document).ready(function() {
				var width = $(window).width();
				var height = $(window).height();
				var widthSTR = width.toString();
				widthSTR = widthSTR.concat("px");
				var heightSTR = height.toString();
				heightSTR = heightSTR.concat("px");
				heightSTR = " ".concat(heightSTR);
				var size = widthSTR.concat(heightSTR);
				$("body").css({
					"background-size" : size
				});
			});
			$(window).resize(function() {
				var width = $(window).width();
				var height = $(window).height();
				var widthSTR = width.toString();
				widthSTR = widthSTR.concat("px");
				var heightSTR = height.toString();
				heightSTR = heightSTR.concat("px");
				heightSTR = " ".concat(heightSTR);
				var size = widthSTR.concat(heightSTR);
				$("body").css({
					"background-size" : size
				});
			});
		</script>
	</body>
</html>