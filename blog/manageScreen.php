<!DOCTYPE html>
<html>
	<head>
		<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
		<style>
			#managePopupButton {
				background: #FF0000;
				color: #FFFFFF;
				font-size: 16px;
				text-align: center;
				width: 70px;
				height: 23.5px;
				padding-top: 1.5px;
				border-radius: 5px;
				margin-left: 89%;
				position: fixed;
			}

			#managePopup {
				text-align: center;
				background: #FFFFFF;
				width: 600px;
				height: 650px;
				border-radius: 10px;
				position: fixed;
				font-size: 20px;
			}
			#logoutButton {
				background: #FF0000;
				color: #FFFFFF;
				font-size: 16px;
				height: 23.5px;
				margin-left: 540px;
				margin-right: 5px;
				margin-top: 5px;
				padding-top: 1.5px;
				border-radius: 5px;
			}
			#settingsTab {
				font-size: 16px;
				background: #FFFFFF;
				color: #757575;
				border-style: solid;
				border-width: 2px;
				border-color: #888888;
				border-bottom-color: #FFFFFF;
				border-radius: 5px;
				border-bottom-left-radius: 0px;
				border-bottom-right-radius: 0px;
				width: 40px;
				margin-left: 5px;
				float: left;
			}
			#settings {
				box-shadow: 0px 0px 5px #5E5E5E;
				border-radius: 3px;
				border-width: 2px;
				margin-left: 20px;
				margin-right: 20px;
				width: 560px;
				height: 400px;
			}
			table {
				padding-top: 5px;
				position: absolute;
			}

			th {
				text-align: left;
				font-size: 18px;
				padding-left: 25px;
				padding-bottom: 10px;
			}
			td {
				font-size: 16px;
				padding-bottom: 5px;
				text-align: left;
				padding-left: 25px;
			}
			td.postEditButton {
				font-size: 12px;
				color: #B8CCD1;
				padding-top: 3px;
			}
			td.postEditButton:hover {
				color: #5C7980;
			}
			body {
				margin-top: 0px;
				margin-bottom: 0px;
				margin-left: 0px;
				margin-right: 0px;
			}
		</style>
	</head>
	<body style="height: 2000px; background: #8A8A8A;">
		<?php
		function ipAproved() {
			$whitelistContent = file('passstuff/whitelist.txt');
			if (in_array($_SERVER['REMOTE_ADDR'] . PHP_EOL, $whitelistContent) == TRUE) {
				return TRUE;
			}
			if (in_array($_SERVER['REMOTE_ADDR'] . PHP_EOL, $whitelistContent) == FALSE) {
				return FALSE;
			}
		}

		/*function logout($safety) {
		 if ($safety == true) {
		 $whitelistContent = file('passstuff/whitelist.txt');
		 $whiteListIpKey = array_search($_SERVER['REMOTE_ADDR'] . PHP_EOL, $whitelistContent);
		 unset($whitelistContent[$whiteListIpKey]);
		 file_put_contents('passStuff/whitelist.txt', $whitelistContent);
		 }

		 }*/
		?>
		<div id="managePopupButton">
			Manage
		</div>
		<div id="managePopup">
			<?php
			if (ipAproved() == TRUE) {
				echo '
<div id="logoutButton">
Logout
</div>';
			}

			if (ipAproved() == FALSE) {
				echo '
<div id="loginContent">
<form  action="login.php" method="post">
UserName:
<input name="username"  type="text" size="20"/>
<br>
Password:
<input name="password" type="password" size="20"/>
<br>
<div style="font-size: 12px;">
<input name="rememberMe" type="checkbox" value="remeberMe" />
Remeber Me
</div>
<input name="Submit" type="submit" value="Login" />
</form>
</div>';
			}
			?>

			<div id="settingsTab" class="posts" style="margin-left: 25px;">
				Posts
			</div>
			<div id="settingsTab" class="users">
				Users
			</div>
			<br>
			<div id="settings">
				<table>
					<tr>
						<th>Post Title</th>
						<th>Post Content</th>
						<th>Tag</th>
					</tr>
					<tr>
						<td id="examplePostTitle">Post Title</td>
						<td id="examplePostContent">First 35 charecters of post........</td>
						<td id="examplePostTag">Post Tag</td>
						<td class="postEditButton" id="examplePostButton">edit</td>
					</tr>

				</table>
			</div>
		</div>
		Other Content
		<script>
			$('div.posts').css({
				'box-shadow' : '1px -1px 5px #8C8C8C',
				'background' : '#FFFFFF'
			});
			$('#managePopupButton').css({
				'opacity' : '0.5'
			});

			$('#managePopupButton').mouseenter(function() {
				$('#managePopupButton').css({
					'opacity' : '1'
				});
			});

			$('#managePopupButton').mouseleave(function() {
				$('#managePopupButton').css({
					'opacity' : '0.5'
				});
			});

			$('#logoutButton').css({
				'opacity' : '0.5'
			});

			$('#logoutButton').mouseenter(function() {
				$('#logoutButton').css({
					'opacity' : '1'
				});
			});

			$('#logoutButton').mouseleave(function() {
				$('#logoutButton').css({
					'opacity' : '0.5'
				});
			});
			var managePopupHeight = $(window).height() - ($(window).height() / 4) + ($(window).height() / 7);
			var managePopupMarginTop = ($(window).height() - managePopupHeight) / 2;
			var managePopupMarginLeft = ($(window).width() - 600) / 2;

			$('#managePopup').css({
				'height' : managePopupHeight,
				'margin-top' : managePopupMarginTop,
				'margin-left' : managePopupMarginLeft
			});

			var managePopupButtonMarginLeft = ($(window).width() - 70) - 5;
			$('#managePopupButton').css({
				'margin-left' : managePopupButtonMarginLeft,
				'margin-top' : '5px'
			});

			var loginContentMarginTop = ((managePopupHeight - $('#loginContent').height()) / 2) - $('#loginButton').height();
			$('#loginContent').css({
				'margin-top' : loginContentMarginTop
			});

			$('div.posts').click(function() {
				$('div.posts').css({
					'box-shadow' : '1px -1px 5px #8C8C8C',
					'background' : '#FFFFFF'
				});

				$('div.users').css({
					'box-shadow' : '0px 0px 0px #FFFFFF',
					'background' : '#FFFFFF'
				});
			});

			$('div.users').click(function() {
				$('div.users').css({
					'box-shadow' : '1px -1px 5px #8C8C8C',
					'background' : '#FFFFFF'
				});

				$('div.posts').css({
					'box-shadow' : '0px 0px 0px #FFFFFF',
					'background' : '#FFFFFF'
				});
			});

			var click = true;

			$('#examplePostButton').click(function() {
				if (click == true) {
					$('#examplePostTitle').html('<form><input type="text" value="Post Title" size="10"/>');
					$('#examplePostContent').html('<input type="text" value="First 35 characters of     post........" size="20"/>');
					$('#examplePostTag').html('<select><option>Animation</option><option>Programing</option>        <option>Robotics</option><option>Other</option></select>');
					$('#examplePostButton').html('<input type="submit" value="edit"/></form>');
					click = false;
				} else if (click == false) {
					$('#examplePostTitle').html('Post Title');
					$('#examplePostContent').html('First 35 characters of post........');
					$('#examplePostTag').html('Post Tag');
					$('#examplePostButton').html('edit');
					click = true;
				}
			});
		</script>
	</body>
</html>