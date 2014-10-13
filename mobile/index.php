<!DOCTYPE HTML>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Pompiere|Karla|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="plugins/jquery mobile/jquery.mobile-1.3.2.min.css">
		<script src="plugins/jquery/jquery-1.9.1.min.js"></script>
		<script src="plugins/jquery mobile/jquery.mobile-1.3.2.min.js"></script>
		<script src="plugins/fastbutton/google.fastbutton.js"></script>
		<script src="plugins/fastbutton/jquery.google.fastbutton.js"></script>
		<title>Noah Huppert</title>
		<meta name="viewport" content="width=device-width"/>
		<style>
			body {
				margin: 0;
			}
			a {
				text-decoration: none;
			}
			.page {
				margin: 0;
			}
			#blogHome {
				background: #FFFFFF;
			}
			#header {
				background: #FFFFFF;
				color: #000000;
				font-family: Pompiere;
			}
			#menuButton {
				background: #FFFFFF;
			}
			#menuPanel {
				background: #FCFCFC;
			}
			.menuOption {
				background: #FCFCFC;
				border-style: solid;
				border-width: 1px;
				border-color: #6E6E6E;
				border-radius: 2px;
				font-family: Yanone Kaffeesatz;
			}
			.menuOptionTitle {
				width: 80%;
				margin: auto;
				margin-top: 15px;
				padding: 3px;
				background: #FCFCFC;
				border-style: solid;
				border-width: 1px;
				border-color: #6E6E6E;
				border-radius: 2px;
				list-style-type: none;
				font-family: Yanone Kaffeesatz;
				font-size: 20px;
			}
			.subMenuOption {
				width: 60%;
				margin: auto;
				margin-top: 8px;
				padding: 3px;
				background: #FFFFFF;
				border-style: solid;
				border-width: 1px;
				border-color: #6E6E6E;
				border-radius: 2px;
				list-style-type: none;
				font-family: Yanone Kaffeesatz;
			}
			.subMenuOptionText {
				margin-left: 20px;
			}
			#carousel {
				width: 100%;
				border-bottom-style: solid;
				border-bottom-width: 1px;
				border-bottom-color: #000000;
				font-family: Yanone Kaffeesatz;
			}
			.carouselTitle {
				height: 30px;
				padding: 5px;
				padding-bottom: 20px;
				font-size: 20px;
				background: #F5F5F5;
			}
			.carouselTag {
				margin-left: 20px;
				font-size: 16px;
				color: #696969;
			}
			.carouselContent {
				margin-left: 25px;
			}
			#caroselSelector {
				width: 120px;
				margin: auto;
				margin-top: 10px;
			}
			.caroselSelectorCircle {
				width: 17px;
				height: 17px;
				line-height: 15px;
				margin-left: 5px;
				text-align: center;
				float: left;
				background: #F5F5F5;
				border-style: solid;
				border-width: 1px;
				border-color: #8A8A8A;
				border-radius: 50%;
			}
			.noSelect {
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			#aboutMe {
				width: 100%;
				margin: auto;
				margin-top: 10px;
			}
			#aboutMeTitle {
				font-family: Yanone Kaffeesatz;
				font-size: 24px;
				text-align: center;
				margin-top: 40px;
			}
			#aboutMeContent {
				font-family: Karla;
			}
			.contentArea {
				width: 90%;
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
			.archivePostTitle {
				margin-top: 10px;
				font-size: 20px;
				font-style: italic;
				font-weight: bold;
				font-family: Pompiere;
			}
			.archivePostTag {
				margin-top: 5px;
				font-size: 15px;
				font-style: italic;
				font-family: Yanone Kaffeesatz;
				float: left;
			}
			.archivePostDate {
				margin-top: 5px;
				font-size: 15px;
				font-style: italic;
				font-family: Yanone Kaffeesatz;
				float: right;
			}
			#blogArchiveTitle {
				text-align: center;
				font-size: 30px;
			}
			.archivePost {
				padding-bottom: 30px;
				border-bottom-style: solid;
				border-bottom-width: 1px;
				border-bottom-color: #616161;
			}
			.archivePost {
				color: #000000;
				text-decoration: none;
			}
			#blogArchiveTitle {
				font-family: Pompiere;
			}
		</style>
	</head>
	<body onload="init();" style="margin: 0;">
		<?php
		$post1 = array();
		$post2 = array();
		$post3 = array();
		$post4 = array();
		$post5 = array();
		$i = 0;

		$connect = mysqli_connect("localhost", "root", "");
		mysqli_select_db($connect, "posts");
		//Code for the search box, prevents malicious users
		//$search = mysqli_real_escape_string(htmlentities($_POST['search']));

		$query = mysqli_query($connect, "
SELECT * FROM `posts` ORDER BY 'postDate'
");

		while ($row = mysqli_fetch_array($query)) {
			/*echo "
			 $('#turnTableElementTitle" . $row['postKey'] . "').html('" . $row['postTitle'] . "');
			 ";*/
			switch ($row['postKey']) {
				case 1 :
					$post1['postTitle'] = $row['postTitle'];
					$post1['postKey'] = $row['postKey'];
					$post1['postContent'] = $row['postContent'];
					$post1['postTag'] = $row['postTag'];
					break;

				case 2 :
					$post2['postTitle'] = $row['postTitle'];
					$post2['postKey'] = $row['postKey'];
					$post2['postContent'] = $row['postContent'];
					$post2['postTag'] = $row['postTag'];
					break;

				case 3 :
					$post3['postTitle'] = $row['postTitle'];
					$post3['postKey'] = $row['postKey'];
					$post3['postContent'] = $row['postContent'];
					$post3['postTag'] = $row['postTag'];
					break;

				case 4 :
					$post4['postTitle'] = $row['postTitle'];
					$post4['postKey'] = $row['postKey'];
					$post4['postContent'] = $row['postContent'];
					$post4['postTag'] = $row['postTag'];
					break;

				case 5 :
					$post5['postTitle'] = $row['postTitle'];
					$post5['postKey'] = $row['postKey'];
					$post5['postContent'] = $row['postContent'];
					$post5['postTag'] = $row['postTag'];
					break;
			}
		}

		if (isset($_GET['postKey']) == true) {
			echo "<script>var viewingPost = true;</script>";
		}
		if (isset($_GET['postKey']) == false) {
			echo "<script>var viewingPost = false;</script>";
		}
		?>
		<div data-role="header" id="header">
			<h1>Noah Huppert</h1>
			<a data-icon="grid" class="ui-btn-left" id="menuButton">&nbsp;</a>
		</div>

		<div class="page" data-role="content" id="blogHome">
			<div id="carousel" class="noSelect">
				<div class="carouselItem" id="carousel1">
					<!--Carosel Item-->
					<div class="carouselTitle">
						<?php echo $post1['postTitle']; ?>
						<div class="carouselTag">
							<?php echo $post1['postTag']; ?>
						</div>
					</div>
					<div class="carouselContent">
						<?php echo substr($post1['postContent'], 0, 250); ?>
					</div>
				</div>
				<div class="carouselItem" id="carousel2">
					<!--Carosel Item-->
					<div class="carouselTitle">
						<?php echo $post2['postTitle']; ?>
						<div class="carouselTag">
							<?php echo $post2['postTag']; ?>
						</div>
					</div>
					<div class="carouselContent">
						<?php echo substr($post2['postContent'], 0, 250); ?>
					</div>
				</div>
				<div class="carouselItem" id="carousel3">
					<!--Carosel Item-->
					<div class="carouselTitle">
						<?php echo $post3['postTitle']; ?>
						<div class="carouselTag">
							<?php echo $post3['postTag']; ?>
						</div>
					</div>
					<div class="carouselContent">
						<?php echo substr($post3['postContent'], 0, 250); ?>
					</div>
				</div>
				<div class="carouselItem" id="carousel4">
					<!--Carosel Item-->
					<div class="carouselTitle">
						<?php echo $post4['postTitle']; ?>
						<div class="carouselTag">
							<?php echo $post4['postTag']; ?>
						</div>
					</div>
					<div class="carouselContent">
						<?php echo substr($post4['postContent'], 0, 250); ?>
					</div>
				</div>
				<div class="carouselItem" id="carousel5">
					<!--Carosel Item-->
					<div class="carouselTitle">
						<?php echo $post5['postTitle']; ?>
						<div class="carouselTag">
							<?php echo $post5['postTag']; ?>
						</div>
					</div>
					<div class="carouselContent">
						<?php echo substr($post5['postContent'], 0, 250); ?>
					</div>
				</div>
			</div>
			<div id="caroselSelector">
					<div class="caroselSelectorCircle" id="selector1">
						1
					</div>
					<div class="caroselSelectorCircle" id="selector2">
						2
					</div>
					<div class="caroselSelectorCircle" id="selector3">
						3
					</div>
					<div class="caroselSelectorCircle" id="selector4">
						4
					</div>
					<div class="caroselSelectorCircle" id="selector5">
						5
					</div>
		</div>
		<div id="aboutMe">
			<div id="aboutMeTitle">
				<strong>About Me</strong>
			</div>
			<div id="aboutMeContent">
				My name is Noah Huppert and I am 15 years old. I am currently attending Lincoln Sudbury High School.
				I enjoy programming and animating. I created this blog along with the other sites in this domain. You can check out my <a style="color: #636363; text-decoration: none;" href="portfolio">portfolio here</a>,
				or check out <a style="color: #636363; text-decoration: none;" href="archive">my recent blog posts here</a>. I am experenced
				in HTML, CSS, PHP, Javascript, Java, C#, and C++. I am a good problem solver and enjoy working with others.
			</div>
		</div>
		</div>

		<div class="page" data-role="content" id="blogPost">
			<div class="contentArea">
				<?php
				if (isset($_GET['postKey'])) {
					$postKey = $_GET["postKey"];
					$query = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY 'postDate'");

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
		</div>

		<div class="page" data-role="content" id="blogArchive">
			<div id="blogArchiveTitle">
				Archive
			</div>
			<div id="archivePosts">
				<?php
				$query = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY 'postDate'");

				while ($row = mysqli_fetch_array($query)) {
					echo "
<a data-ajax='false' class='archiveLink' href='?postKey=" . $row['postKey'] . "'>
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
				?>
			</div>
		</div>

		<div class="page" data-role="content" id="blogProgramming">
			<div id='blogArchiveTitle'>
				Programming
			</div>
			<div id='archivePosts'>
				<?php
				$query = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY 'postDate'");

				while ($row = mysqli_fetch_array($query)) {
					if (strcmp($row['postTag'], 'Programming') == 0) {
						echo "
<a data-ajax='false' class='archiveLink' href='?postKey=" . $row['postKey'] . "'>
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
				?>
			</div>
		</div>

		<div class="page" data-role="content" id="blogAnimation">
			<div id='blogArchiveTitle'>
				Animation
			</div>
			<div id='archivePosts'>
				<?php
				$query = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY 'postDate'");

				while ($row = mysqli_fetch_array($query)) {
					if (strcmp($row['postTag'], 'Animation') == 0) {
						echo "
<a data-ajax='false' class='archiveLink' href='?postKey=" . $row['postKey'] . "'>
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
				?>
			</div>
		</div>

		<div class="page" data-role="content" id="blogRobotics">
			<div id='blogArchiveTitle'>
				Robotics
			</div>
			<div id='archivePosts'>
				<?php
				$query = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY 'postDate'");

				while ($row = mysqli_fetch_array($query)) {
					if (strcmp($row['postTag'], 'Robotics') == 0) {
						echo "
<a data-ajax='false' class='archiveLink' href='?postKey=" . $row['postKey'] . "'>
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
				?>
			</div>
		</div>

		<div class="page" data-role="content" id="blogOther">
			<div id='blogArchiveTitle'>
				Other
			</div>
			<div id='archivePosts'>
				<?php
				$query = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY 'postDate'");

				while ($row = mysqli_fetch_array($query)) {
					if (strcmp($row['postTag'], 'Other') == 0) {
						echo "
<a data-ajax='false' class='archiveLink' href='?postKey=" . $row['postKey'] . "'>
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
				?>
			</div>
		</div>

		<div data-role="panel" id="menuPanel" data-position="left" data-display="reveal">
			<div style="cursor: pointer;" onclick="window.location.href = 'http://www.noahhuppert.com/index.php';" class="menuOptionTitle" id="blogMenu">
				<a data-ajax='false'  href='index.php' style="font-weight: normal; color: #000000;" class="subMenuOptionText"> Blog </a>
			</div>
			<div id="blogMenuOptions">
				<div class="subMenu">
					<div class="subMenuOption" id="blogSubMenuPrograming">
						<div class="subMenuOptionText">
							Programming
						</div>
					</div>
					<div class="subMenuOption" id="blogSubMenuAnimation">
						<div class="subMenuOptionText">
							Animation
						</div>
					</div>
					<div class="subMenuOption" id="blogSubMenuRobotics">
						<div class="subMenuOptionText">
							Robotics
						</div>
					</div>
					<div class="subMenuOption" id="blogSubMenuOther">
						<div class="subMenuOptionText">
							Other
						</div>
					</div>
					<div class="subMenuOption" id="blogSubMenuArchive">
						<div class="subMenuOptionText">
							Archive
						</div>
					</div>
				</div>
			</div>

			<div style="cursor: pointer;" onclick="window.location.href = 'http://www.noahhuppert.com/portfolio/index.html';" class="menuOptionTitle" id="portfolioMenu">
				<div class="subMenuOptionText">
					<a data-ajax='false' href='portfolio/index.html' style="font-weight: normal; color: #000000;">Portfolio</a>
				</div>
			</div>
			<div id="portfolioMenuOptions">
				<div class="subMenu">
					<div class="subMenuOption" id="portfolioSubMenuPrograming">
						<div class="subMenuOptionText">
							Programming
						</div>
					</div>
					<div class="subMenuOption" id="portfolioSubMenuAniamtion">
						<div class="subMenuOptionText">
							Animation
						</div>
					</div>
					<div class="subMenuOption" id="portfolioSubMenuRobotics">
						<div class="subMenuOptionText">
							Robotics
						</div>
					</div>
					<div class="subMenuOption" id="portfolioSubMenuOther">
						<div class="subMenuOptionText">
							Other
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
		
			//Initial Function
			var viewing;
			var caroselItem;
			function init() {
				viewing = 'blog';
				caroselItem = 1;
				$('.page').height($(window).height() - 19);
				$('#portfolioMenuOptions').hide();
				$('#carousel').height($(window).height() / 2);
				$('.carouselContent').css({
					'margin-top' : '30px'
				});
				$('#carousel2').hide();
				$('#carousel3').hide();
				$('#carousel4').hide();
				$('#carousel5').hide();
				$('.caroselSelectorCircle').css({
					'opacity' : '0.4'
				});
				$('#selector1').css({
					'opacity' : '1'
				});
				//$('#caroselSelector').css({
				//'margin-top' : (($('#carousel').height() / 2) -19) + $('.carouselContent').height()
				//});
				hidePages();
				//Pages
				if (viewingPost == true) {
					$('#blogPost').show();
				}
				if (viewingPost == false) {
					$('#blogHome').show();
				}
				
				if($(window).width() < 1000){
					alert('Currently links are not working properly on mobile(Has to do with mobile caching) so to open a link please open in a new tab.');
				}
				
			}

			//Menu Panel
			$('#menuButton').fastClick(function() {
				$('#menuPanel').panel("open");
			});

			function hidePages() {
				$('#blogHome').hide();
				$('#blogPost').hide();
				$('#blogArchive').hide();
				$('#blogProgramming').hide();
				$('#blogAnimation').hide();
				$('#blogRobotics').hide();
				$('#blogOther').hide();
			}


			$('.page a').fastClick(function() {
				hidePages();
				//Pages
				if (viewingPost == true) {
					$('#blogPost').show();
				}
				if (viewingPost == false) {
					$('#blogHome').show();
				}
			});

			//Menu
			$('#blogMenu').fastClick(function() {
				//hidePages();
				//$('#blogHome').show();
				$('#blogMenuOptions').show('slide');
				$('#portfolioMenuOptions').hide('slide');
			});
			$('#portfolioMenu').fastClick(function() {
				$('#portfolioMenuOptions').toggle('slide');
				$('#blogMenuOptions').hide('slide');
			});
			$('#blogSubMenuPrograming').fastClick(function() {
				hidePages();
				$('#blogProgramming').show();
				$('#menuPanel').panel("close");
			});
			$('#blogSubMenuAnimation').fastClick(function() {
				hidePages();
				$('#blogAnimation').show();
				$('#menuPanel').panel("close");
			});
			$('#blogSubMenuRobotics').fastClick(function() {
				hidePages();
				$('#blogRobotics').show();
				$('#menuPanel').panel("close");
			});
			$('#blogSubMenuOther').fastClick(function() {
				hidePages();
				$('#blogOther').show();
				$('#menuPanel').panel("close");
			});
			$('#blogSubMenuArchive').fastClick(function() {
				hidePages();
				$('#blogArchive').show();
				$('#menuPanel').panel("close");
			});
			//Portfolio
			$('#portfolioMenuOptions').fastClick(function(){
				
			});

			//Carosel
			setInterval(function() {
				caroselItem = caroselItem + 1;
				if (caroselItem == 6) {
					caroselItem = 1;
				}
				if (caroselItem == 0) {
					caroselItem = 5;
				}
				$('.carouselItem').hide();
				$('.caroselSelectorCircle').css({
					'opacity' : '0.4'
				});
				$('#selector' + caroselItem).css({
					'opacity' : '1'
				});
				$('#carousel' + caroselItem).show();
			}, 5000);

			//Carosel Selector
			$('#carousel').swiperight(function() {
				caroselItem = caroselItem + 1;
				if (caroselItem == 6) {
					caroselItem = 1;
				}
				if (caroselItem == 0) {
					caroselItem = 5;
				}
				$('.carouselItem').hide();
				$('.caroselSelectorCircle').css({
					'opacity' : '0.4'
				});
				$('#selector' + caroselItem).css({
					'opacity' : '1'
				});
				$('#carousel' + caroselItem).show();
			});
			$('#carousel').swipeleft(function() {
				caroselItem = caroselItem - 1;
				if (caroselItem == 6) {
					caroselItem = 1;
				}
				if (caroselItem == 0) {
					caroselItem = 5;
				}
				$('.carouselItem').hide();
				$('.caroselSelectorCircle').css({
					'opacity' : '0.4'
				});
				$('#selector' + caroselItem).css({
					'opacity' : '1'
				});
				$('#carousel' + caroselItem).show();
			});
		</script>
	</body>
</html>