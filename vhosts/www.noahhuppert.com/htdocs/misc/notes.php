<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<style>
		.year{
			padding: 10px;
			padding-top: 0px;
			margin-left: 5px;
			float: left;
			font-size: 24px;
			border-style: solid;
			border-width: 1px;
			border-color: #E6E6E6;
			border-radius: 5px;
			background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#E9EFF5));
		}
		.year p{
			text-align: center;
			padding-bottom: 10px;
			border-bottom-style: solid;
			border-bottom-width: 1px;
			border-bottom-color: #CCCCCC;
		}
		.month{
			padding: 10px;
			padding-top: 0px;
			margin-left: 5px;
			float: left;
			font-size: 24px;
			border-style: solid;
			border-width: 1px;
			border-color: #3078BD;
			border-radius: 5px;
			background: -webkit-gradient(linear, left top, left bottom, from(#B8DCFF), to(#99CCFF));
		}
		.month p{
			padding-top: 10px;
			text-align: center;
			margin-top: 5px;
			border-style: solid;
			border-width: 1px;
			border-color: #3078BD;
			border-radius: 5px;
		}
		.day{
			margin-left: 20px;
			margin-top: 8px;
			padding: 2px;
			font-size: 18px;
			text-align: center;
			border-style: solid;
			border-width: 1px;
			border-color: #3078BD;
			border-radius: 5px;
			background: -webkit-gradient(linear, left top, left bottom, from(#77B2ED), to(#5A9BDB));
		}
		.day a{
			text-decoration: none;
			color: #000000;
		}
		#createNotes{
			width: 500px;
			padding: 10px;
			margin-left: 190px;
			border-style: solid;
			border-width: 1px;
			border-color: #3078BD;
			border-radius: 5px;
			background: -webkit-gradient(linear, left top, left bottom, from(#B8DCFF), to(#99CCFF));
		}
		#description{
			text-align: center;
		}
		#date{
			width: 30px;
			text-align: center;
			margin: auto;
		}
		#url{
			width: 300px;
			text-align: center;
			margin: auto;
		}
		#submit{
			margin-left: 200px;
		}
		form{
			margin: auto;
			margin-top: 10px;
			padding-bottom: 10px;
			width: 460px;
			border-style: solid;
			border-width: 1px;
			border-color: #3078BD;
			border-radius: 5px;
			background: -webkit-gradient(linear, left top, left bottom, from(#A6D3FF), to(#85C2FF));
		}
	</style>
</head>
<body>
	<?php
		$connect = mysqli_connect("localhost", "root", "");
		mysqli_select_db($connect, "test");
	?>
	<div id="2013" class="year">
		<p>2013</p>
		<div id="9" class="month">
			<p>September</p>
			
			<?php
				$query = mysqli_query($connect, "SELECT * FROM `notes` ORDER BY 'day'");
				while ($row = mysqli_fetch_array($query)) {
					echo "<div class='day'><a target='_parent' href='" . $row['url'] . "'>" . $row['month'] . "/" . $row['day'] . "/" . $row['year'] . " Notes</a></div>";
				}
			?>
		</div>
	</div>
	<div id="createNotes">
		<div id="description">
			<i>This tool will add your notes to the list. First type your notes on the wiki system.</i>
		</div>
		<form name="notesInfo" method="GET">
			<br>
			<span style="margin-left: 50px;">&nbsp;</span>Date of notes:&nbsp;&nbsp;&nbsp;</span><input id="date" type="text" placeholder="M" name="month"><input id="date" placeholder="DD" type="text" name="day"><input id="date" placeholder="YY" type="text" name="year"><br><br>
			<span style="margin-left: 50px;">&nbsp;</span>Notes URL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="url" type="text" name="url"><br><br>
			<input id="submit" type="submit" value="Create">
		</form>
		<?php
			if(isset($_GET['month']) && isset($_GET['day']) && isset($_GET['year']) && isset($_GET['url'])){
				$sql = "INSERT INTO `test`.`notes` (`url`, `month`, `day`, `year`) VALUES ('" . mysql_real_escape_string(htmlentities($_GET['url'])) . "', '" . mysql_real_escape_string(htmlentities($_GET['month'])) . "', '" . mysql_real_escape_string(htmlentities($_GET['day'])) . "', '" . mysql_real_escape_string(htmlentities($_GET['year'])) . "');";
				mysqli_query($connect, $sql);
				echo "<script>window.location = 'http://www.noahhuppert.com/misc/notes.php';</script>";
			}
		?>
	</div>
</body>