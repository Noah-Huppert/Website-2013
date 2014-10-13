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
			#topBar {
				height: 60px;
				width: 100%;
				line-height: 60px;
				background: #FAFAFA;
				border-bottom-style: solid;
				border-bottom-width: 1px;
				border-bottom-color: #F2F2F2;
				font-family: Pompiere;
			}
			#topBarTitle {
				margin-left: 100px;
				float: left;
				font-size: 30px;
			}
			#topBarMenu {
				margin-right: 100px;
				float: right;
			}
			.topBarMenuOption {
				font-size: 24px;
				margin-right: 20px;
				float: left;
			}
			#searchBar {
				width: 20px;
				height: 20px;
			}
			#searchEntry, input {
				width: 120px;
				height: 25px;
				line-height: 20px;
				margin-left: 10px;
				border-style: solid;
				border-width: 2px;
				border-color: #C4C4C4;
				border-radius: 10px;
				outline: none;
				text-indent: 10px;
				font-family: Pompiere;
				float: none;
			}
			.ui-menu-item {
				width: 100px;
				height: 30px;
				line-height: 30px;
				list-style-type: none;
				background: #FFFFFF;
				border-style: solid;
				border-width: 1px;
				border-color: #E6E6E6;
				text-align: center;
				border-radius: 2px;
				cursor: pointer;
			}
			.ui-menu-item:hover {
				background: #FCFCFC;
			}
			.ui-helper-hidden-accessible {
				display: none;
			}
			.topBarMenuOption:hover {
				font-style: italic;
			}
			#turnTable {
				width: 100%;
				height: 350px;
				border-bottom-style: solid;
				border-bottom-width: 1px;
				border-bottom-color: #F0F0F0;
			}
			.turnTableControllArrow {
				width: 60px;
				height: 120px;
				z-index: 2;
				position: absolute;
				background: none;
				border-radius: 5px;
				text-align: center;
				line-height: 120px;
				font-size: 40px;
				font-family: Karla;
				color: #E8E8E8;
				cursor: pointer;
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			.turnTableControllArrow:hover {
				background: #FCFCFC;
			}
			.turnTableElement {
				width: 40%;
				height: 80%;
				margin-top: 2.5%;
				position: absolute;
				border-style: solid;
				border-width: 1px;
				border-color: #8F8F8F;
				text-decoration: none;
			}
			.turnTableElementTitle {
				padding-left: 10px;
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 24px;
				font-family: Pompiere;
				background: #FAFAFA;
				opacity: 0.5;
				color: #000000;
			}
			.turnTableElementContent {
				width: 90%;
				height: 50%;
				margin: auto;
				margin-left: 20px;
				font-size: 18px;
				font-family: Karla;
				color: #919191;
				text-align: left;
				font-style: italic;
			}
			.turnTableElementTag {
				width: 100%;
				padding-top: 10px;
				padding-left: 10px;
				color: #919191;
				font-family: Karla;
				border-top-style: solid;
				border-top-width: 1px;
				border-top-color: #F7F7F7;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}
			#aboutMe {
				width: 50%;
				margin: auto;
				margin-top: 80px;
			}
			#aboutMeTitle {
				font-family: Yanone Kaffeesatz;
				font-size: 24px;
				text-align: center;
				margin-top: 10px;
			}
			#aboutMeContent {
				font-family: Karla;
			}
			#socailContainer {
				float: right;
				margin-right: 5%;
				margin-top: -75px;
				padding-left: 20px;
				font-family: Pompiere;
				border-left-style: solid;
				border-left-width: 1px;
				border-left-color: #636363;
			}
			#socailTitle {
				font-size: 24px;
			}
			.socailType {
				margin-left: 35px;
				margin-top: 10px;
			}
			.bottomBar {
				width: 100%;
				color: #E6E6E6;
				font-family: Yanone Kaffeesatz;
				background: #1A1A1A;
			}
			#bottomBarGradiant {
				background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FFFFFF), to(#1A1A1A));
			}
			#bottomBarContent {
				background: #1A1A1A;
			}
			#usageDiscalimer {
				padding-top: 10px;
				text-align: center;
				background: #1A1A1A;
			}
			.bottomBarItem {
				height: 30px;
				line-height: 30px;
				padding-top: 10px;
				background: #1A1A1A;
				font-style: italic;
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			#bottomBarItemsWraper {
				width: 300px;
				margin: auto;
				background: #1A1A1A;
				height: 1%;
				overflow: hidden;
			}
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
			#mobileSitePopup{
				width: 100%;
				text-align: center;
				background: #FAFAFA;
				border-bottom-style: solid;
				border-bottom-width: 1px;
				border-bottom-color: #F2F2F2;
				font-family: Pompiere;
			}
			#mobileSitePopup p{
				height: 30px;
				line-height: 30px;
				text-align: center;
				color: #000000;
			}
			.mobilePopupOption{
				margin-left: 5px;
				color: #000000;
				text-decoration: none;
				padding: 5px;
				height: 25px;
				line-height: 25px;
				background: #FAFAFA;
				border-style: solid;
				border-width: 1px;
				border-color: #696969;
				border-radius: 10px;
			}
		</style>
	</head>
	<body onload="init();" style="margin: 0;">
		<?php
		include 'header.php';
		
		echo 
		'<div id="mobileSitePopup">
			<p>There is a mobile layout avialible for this site.</p>
			<span class="mobilePopupOption" id="accept">
				Cool! Take me to it.
			</span>
			<span class="mobilePopupOption" id="deny">
				Whatever. Go away
			</span>
		</div>	

		$connect = mysqli_connect("localhost", "root", "");
		mysqli_select_db($connect, "posts");
		$query = mysqli_query($connect, "
		SELECT * FROM `portfolio` ORDER BY 'postDate'
		");
		
		echo '<div style="margin-top: 30px; " class="ArchiveTitle">
			Portfolio
		</div>';

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
		
		?>
		<div id="socailContainer">
			<div id="socailTitle">
				Follow Noah Huppert
			</div>
			<div class="socailType">
				<br>
				<a href="http://www.noahhuppert.com/RSSFeed.php"style="color: inherit; text-decoration: none;">RSS</a>
			</div>
			<div class="socailType">
				<a href="https://twitter.com/NoahHuppert"style="color: inherit; text-decoration: none;">Twitter</a>
			</div>
			<div class="socailType">
				<a href="https://plus.google.com/u/0/116292483735493618821/posts" style="color: inherit; text-decoration: none;">Google +</a>
				<br>
				<br>
			</div>
		</div>

		<div class="bottomBar">
			<div id="bottomBarGradiant">
				&nbsp;
			</div>
			<div id="bottomBarContent">
				<div id="usageDiscalimer">
					&copy;Noah Huppert. All code on this domain is coded by Noah Huppert. Do not distribute or claim as your own.
				</div>
				<div id='bottomBarItemsWraper'>
					<span style='float: left;' class='bottomBarItem'>
						<a style='color: #E6E6E6; text-decoration: none;' href="contactMe.php">Contact Noah Huppert</a>
					</span>
					<span style='float: right; cursor: pointer;' class='bottomBarItem'>
						Blog tools
					</span>
				</div>
				
			</div>
		</div>
		<script>
			if (screen.width <= 800) {
				window.location = "http://www.noahhuppert.com/mobile";
			}
			var turnTableElement;
			var turnTableElementLeftNum;
			var turnTableElementRightNum;
			var turnTableElementRightNumPre;
			var turnTableElementCenter;
			var turnTableElementLeft;
			var turnTableElementRight;
			var turnTableElementRightPre;
			var date = new Date();
			var year = date.getFullYear();
			var tableMovedRecently = false;
			function init() {
				$('#mobileSitePopup').hide();
				$('#mobileSitePopup').width($(window).width());
				//Setting minum viewing width
				if ($(window).width() < 950) {
					$('body').css({
						'width' : '950px'
					});
				}
				if ($(window).width() > 950) {
					$('body').css({
						'width' : $(window).width(),
						'overflow-x' : 'hidden'
					});
				}

				$('.turnTableElement').css({
					'height' : ($('#turnTable').height() * 75) / 100
				});

				//Turn table
				turnTableElement = 5;
				turnTableElementLeftNum = turnTableElement - 1;
				turnTableElementRightNum = turnTableElement + 1;
				turnTableElementRightNumPre = turnTableElementRightNum + 1;
				turnTableElementCenter = '#turnTableElement5'
				turnTableElementLeft = '#turnTableElement4';
				turnTableElementRight = '#turnTableElement1';
				turnTableElementRightPre = '#turnTableElement' + turnTableElementRightNumPre;
				$('.turnTableElement').hide();
				$(turnTableElementCenter).show();
				$(turnTableElementLeft).show();
				$(turnTableElementRight).show();

				$((":hidden" )).css({
					'left' : (($(window).width() - $('.turnTableElement').width()) / 2) - (2 * ($('.turnTableElement').width()) + 75)
				});
				$(turnTableElementCenter).animate({
					left : ($(window).width() - $('.turnTableElement').width()) / 2,
					opacity : '1'
				}, 0);
				$(turnTableElementLeft).animate({
					left : (($(window).width() - $('.turnTableElement').width()) / 2) - ($('.turnTableElement').width() + 75),
					opacity : '0.4'
				}, 0);
				$(turnTableElementRight).animate({
					left : (($(window).width() - $('.turnTableElement').width()) / 2) + ($('.turnTableElement').width() + 75),
					opacity : '0.4'
				}, 0);
				turnTableElement = turnTableElement - 1;
				checkTurnTableLimits();
				turnTableElementLeftNum = turnTableElement - 1;
				turnTableElementRightNum = turnTableElement + 1;
				checkTurnTableLimits();
				turnTableElementRightNumPre = turnTableElementRightNum + 1;

				//Age
				$('#age').html(year - 1998);

				//Turn table element link
				//var iframeDoc = $('.turnTableElementContent').contents().get(0);
				//$(iframeDoc).bind('click', function( event ) {
				//	 alert('click');
				//});
				//Turn Table Element Content
				$('.turnTableElementContent').css({
					'margin-top' : 0,
					'height' : $('.turnTableElement').height() - 88
				});

				//Mobile alert
			$('#accept').click(function(){
				window.location.href ='mobile/index.php';
			});
		
			$('#deny').click(function(){
				$('#mobileSitePopup').hide('slide');
			});

				//Turn Table Controll Arows
				$('#turnTableConrtollArrowLeft').css({
					'margin-top' : ($('#turnTable').height() - 120) / 2,
					'margin-left' : (($(window).width() - $('.turnTableElement').width()) / 2) - 65
				});
				$('#turnTableConrtollArrowRight').css({
					'margin-top' : ($('#turnTable').height() - 120) / 2,
					'margin-left' : (($(window).width() + $('.turnTableElement').width()) / 2)
				});
				$('#turnTableConrtollArrowLeft').bind('click', function(event) {
					iterateCarosel('back');
				});
				$('#turnTableConrtollArrowRight').bind('click', function(event) {
					iterateCarosel('forward');
				});
				$('.turnTableControllArrow').mouseout(function() {
					tableMovedRecently = false;
				});
				$('.turnTableControllArrow').mouseover(function() {
					tableMovedRecently = true;
				});

				//Bottom Bar
				var bottomBarMarginTop;
				if (($('body').height() + 75) < $(window).height()) {
					bottomBarMarginTop = ($(window).height() - $('body').height()) + $('.bottomBar').height();
				}
				if (($('body').height() + 75) > $(window).height()) {
					bottomBarMarginTop = 80;
				}
				$('.bottomBar').css({
					'margin-top' : bottomBarMarginTop
				});

				//Search Box
				$('#searchEntry').hide();
				$('#searchEntry').autocomplete({
					source : searchAutocomplete
				});
				$('#searchBar').click(function() {
					$('#searchEntry').toggle('slow');
					$('#searchEntry').focus();
				});
			}

			//Turn Table
			window.setInterval(function() {
				if (tableMovedRecently == false) {
					iterateCarosel('forward');
				}
			}, 5000);

			function iterateCarosel(direction) {
				if (direction == 'back') {
					turnTableElement = turnTableElement + 1;
					checkTurnTableLimits();
					turnTableElementLeftNum = turnTableElement + 1;
					turnTableElementRightNum = turnTableElement - 1;
					checkTurnTableLimits();
					turnTableElementRightNumPre = turnTableElementRightNum - 1;
					checkTurnTableLimits();
					turnTableElementCenter = '#turnTableElement' + turnTableElement.toString();
					turnTableElementRight = '#turnTableElement' + turnTableElementLeftNum.toString();
					turnTableElementLeft = '#turnTableElement' + turnTableElementRightNum.toString();
					turnTableElementRightPre = '#turnTableElement' + turnTableElementRightNumPre.toString();

				}
				if (direction == 'forward') {
					turnTableElement = turnTableElement - 1;
					checkTurnTableLimits();
					turnTableElementLeftNum = turnTableElement - 1;
					turnTableElementRightNum = turnTableElement + 1;
					checkTurnTableLimits();
					turnTableElementRightNumPre = turnTableElementRightNum + 1;
					checkTurnTableLimits();
					turnTableElementCenter = '#turnTableElement' + turnTableElement.toString();
					turnTableElementLeft = '#turnTableElement' + turnTableElementLeftNum.toString();
					turnTableElementRight = '#turnTableElement' + turnTableElementRightNum.toString();
					turnTableElementRightPre = '#turnTableElement' + turnTableElementRightNumPre.toString();
				}

				$('.turnTableElement').hide();
				$(turnTableElementCenter).show();
				$(turnTableElementLeft).show();
				$(turnTableElementRight).show();
				$(turnTableElementRightPre).show();
				$((":hidden" )).css({
					'left' : (($(window).width() - $('.turnTableElement').width()) / 2) - (2 * ($('.turnTableElement').width()) + 75)
				});
				$(turnTableElementCenter).animate({
					left : ($(window).width() - $('.turnTableElement').width()) / 2,
					opacity : '1'
				}, 500);
				$(turnTableElementLeft).animate({
					left : (($(window).width() - $('.turnTableElement').width()) / 2) - ($('.turnTableElement').width() + 75),
					opacity : '0.4'
				}, 500);
				$(turnTableElementRightPre).animate({
					left : (($(window).width() - $('.turnTableElement').width()) / 2) + (2 * ($('.turnTableElement').width()) + 75),
					opacity : '0.4'
				}, 500);
				$(turnTableElementRight).animate({
					left : (($(window).width() - $('.turnTableElement').width()) / 2) + ($('.turnTableElement').width() + 75),
					opacity : '0.4'
				}, 500);

			}

			function checkTurnTableLimits() {
				switch(turnTableElement) {
					case 0:
						turnTableElement = 5;
						break;

					case 6:
						turnTableElement = 1;
						break;
				}
				switch(turnTableElementRightNumPre) {
					case 0:
						turnTableElementRightNumPre = 5;
						break;

					case 6:
						turnTableElementRightNumPre = 1;
						break;
				}
				switch(turnTableElementLeftNum) {
					case 0:
						turnTableElementLeftNum = 5;
						break;

					case 6:
						turnTableElementLeftNum = 1;
						break;
				}
				switch(turnTableElementRightNum) {
					case 0:
						turnTableElementRightNum = 5;
						break;

					case 6:
						turnTableElementRightNum = 1;
						break;
				}
			}
		</script>
	</body>
</html>