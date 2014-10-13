<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
		<link href='http://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet' type='text/css'>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<title>Paralax V2</title>
	</head>
	<body>
		<?php $postsIndexPointer = "posts/postsIndex.txt";
		$pointerFileLine = file($postsIndexPointer);
		$postIndexEndCheck;
		$programingTagCounter = 0;
		$animationTagCounter = 0;
		$roboticsTagCounter = 0;
		$otherTagCounter = 0;
		$programingPostsCounter = 0;
		$animationPostsCounter = 0;
		$roboticsPostsCounter = 0;
		$otherPostsCounter = 0;
		$tagsIndex;
		$fetchingPost = TRUE;
		$postNumber = 0;
		$totalPostNumber = 0;
		$postPointer;
		$postPointerString;
		$postLines;
		$postTag;
		$postTitle;
		$postContent;
		$endCondition = "!end";
		$printingPost = TRUE;
		$selectedProject = 0;

		$postIndexEndCheck = file_get_contents($postsIndexPointer);

		if (filesize($postsIndexPointer) <> 0 && file_exists($postsIndexPointer) == TRUE) {
			if (strpos($postIndexEndCheck, $endCondition) !== FALSE) {
				while ($fetchingPost == TRUE) {

					$endOfFile = strcmp($pointerFileLine[$postNumber], $endCondition);
					if ($endOfFile == 0) {
						$fetchingPost = FALSE;
					}

					if ($endOfFile <> 0) {
						$postPointer[$postNumber] = $pointerFileLine[$postNumber];
						$postLines = file(rtrim($postPointer[$postNumber]));
						$postTag[$postNumber] = $postLines[0];
						$postTitle[$postNumber] = $postLines[1];
						$postContent[$postNumber] = $postLines[2];

						$postNumber = $postNumber + 1;

					}

				}
				$postNumber = 0;
			}
		}

		if (filesize($postsIndexPointer) <> 0 && file_exists($postsIndexPointer) == TRUE && strpos($postIndexEndCheck, $endCondition) == FALSE) {
			echo '<script>';
			echo 'alert("The posts index file is corrupt and can not be read. Please contact a server adminstrator.");';
			echo '</script>';
		}

		if (file_exists($postsIndexPointer) == TRUE && filesize($postsIndexPointer) == 0) {
			echo '<script>';
			echo 'alert("The posts index file is empty and can not be read. Please contact a server adminstrator.");';
			echo '</script>';
		}

		if (file_exists($postsIndexPointer) == FALSE) {
			echo '<script>';
			echo 'alert("The posts index file can not be found. Please contact a server adminstrator.");';
			echo '</script>';
		}

		function ipAproved() {
			$whitelistContent = file('passstuff/whitelist.txt');
			if (in_array($_SERVER['REMOTE_ADDR'] . PHP_EOL, $whitelistContent) == TRUE) {
				return TRUE;
			}
			if (in_array($_SERVER['REMOTE_ADDR'] . PHP_EOL, $whitelistContent) == FALSE) {
				return FALSE;
			}
		}

		function ipAprovedJS() {
			$whitelistContent = file('passstuff/whitelist.txt');
			if (in_array($_SERVER['REMOTE_ADDR'] . PHP_EOL, $whitelistContent) == TRUE) {
				echo 'true';
			}
			if (in_array($_SERVER['REMOTE_ADDR'] . PHP_EOL, $whitelistContent) == FALSE) {
				echo 'false';
			}
		}
		?>

		<div id="fixed">
			<div id="navContainer">
				<div id="navSideBar">
					&nbsp;
				</div>
				<div id="navBar">
					Home
				</div>

				<div id="navSideBar">
					&nbsp;
				</div>
				<div id="navBar">
					Project Select
				</div>
				<div >
					<div id="fixedPrograming">
						<?php
						while ($programingTagCounter < count($postTag)) {
							if (strcmp($postTag[$programingTagCounter], "programing") == 2) {
								echo '<div id="navBarCatagory">', $postTitle[$programingTagCounter], '</div>';
								$programingPostsCounter = $programingPostsCounter + 1;
							}
							$programingTagCounter = $programingTagCounter + 1;
						}

						if ($programingPostsCounter == 0) {
							echo '<div id="navBarCatagory">', 'None', '</div>';
						}

						$programingTagCounter = 0;
						?>
					</div>
				</div>

				<div id="navSideBar">
					&nbsp;
				</div>
				<div id="navArrow">
					&#187;
				</div>
				<div id="navBarCatagoryPrograming">
					Programing
				</div>

				<div id="fixedAnimation">
					<?php
					while ($animationTagCounter < count($postTag)) {
						if (strcmp($postTag[$animationTagCounter], "animation") == 2) {
							echo '<div id="navBarCatagory">', $postTitle[$animationTagCounter], '</div>';
							$animationPostsCounter = $animationPostsCounter + 1;
						}
						$animationTagCounter = $animationTagCounter + 1;
					}

					if ($animationPostsCounter == 0) {
						echo '<div id="navBarCatagory">', 'None', '</div>';
					}

					$animationTagCounter = 0;
					?>
				</div>

				<div id="navSideBar">
					&nbsp;
				</div>
				<div id="navArrow">
					&#187;
				</div>
				<div id="navBarCatagoryAnimation">
					Animation
				</div>

				<div id="fixedRobotics">
					<?php
					while ($roboticsTagCounter < count($postTag)) {
						if (strcmp($postTag[$roboticsTagCounter], "robotics") == 2) {
							echo '<div id="navBarCatagory">', $postTitle[$roboticsTagCounter], '</div>';
							$roboticsPostsCounter = $roboticsPostsCounter + 1;
						}
						$roboticsTagCounter = $roboticsTagCounter + 1;
					}

					if ($roboticsPostsCounter == 0) {
						echo '<div id="navBarCatagory">', 'None', '</div>';
					}

					$roboticsTagCounter = 0;
					?>
				</div>

				<div id="navSideBar">
					&nbsp;
				</div>
				<div id="navArrow">
					&#187;
				</div>
				<div id="navBarCatagoryRobotics">
					Robotics
				</div>

				<div id="fixedOther">
					<?php
					while ($otherTagCounter < count($postTag)) {
						if (strcmp($postTag[$otherTagCounter], "other") == 2) {
							echo '<div id="navBarCatagory">', $postTitle[$otherTagCounter], '</div>';
							$otherPostsCounter = $otherPostsCounter + 1;
						}
						$otherTagCounter = $otherTagCounter + 1;
					}

					if ($otherPostsCounter == 0) {
						echo '<div id="navBarCatagory">', 'None', '</div>';
					}

					$otherTagCounter = 0;
					?>
				</div>

				<div id="navSideBar">
					&nbsp;
				</div>
				<div id="navArrow">
					&#187;
				</div>
				<div id="navBarCatagoryOther">
					Other
				</div>
			</div>

		</div>
		<!--<div id="fixedPostButton">
		<article>
		+
		</article>
		</div>

		<div id="fixedLoginButton">
		<article>
		<?php
		if (ipAproved() == TRUE) {
		echo 'Sign Out';
		}
		if (ipAproved() == FALSE) {
		echo 'Sign In';
		}
		?>
		</article>
		</div>

		<div id="loginPopup">
		<div id="loginPopupContent">
		Login
		<br>
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
		</div
		<br>
		<input name="Submit" type="submit" value="Login" />
		</form>
		<br>
		</div>
		</div>-->

		<!--New stuff-->

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

		<div id="postCreationPopup">
			<div id="postCreationPopupContent">
				<form  action="newPost.php" method="post">
					Post Title:
					<input name="postTitle" type="text" placeholder="Your Amazing Title"/>
					<div id="postCreationPopupContentPadding">
						&nbsp;
					</div>
					<textarea name="postContent" placeholder="Article About Your Amazing Project"></textarea>
					<div id="postCreationPopupContentPaddingSmall">
						&nbsp;
					</div>
					Tag
					<br>
					&nbsp;
					<div id="radioButton">
						<input checked="checked" name="tag" type="radio" value="programing"/>
						Programing
						<input name="tag" type="radio" value="animation"/>
						Animation
						<input name="tag" type="radio" value="robotics"/>
						Robotics
						<input name="tag" type="radio" value="other"/>
						Other
					</div>
					<br>
					<input name="Submit" type="submit" value="Post" />
				</form>
			</div>

		</div>
		<!--<script>

		if (<?php ipAprovedJS(); ?> == true) {
		$('#fixedPostButton').click(function() {
		$('#postCreationPopup').toggle(function() {
		$('#postCreationPopup').css({
		'opacity' : '0',
		'z-index' : '1'
		});
		}, function() {
		$('#postCreationPopup').css({
		'opacity' : '1',
		'z-index' : '7'
		});
		});
		});
		}

		if (<?php ipAprovedJS(); ?>
		== false) {
		$('#fixedPostButton').click(function() {
		$('#loginPopup').toggle(function() {
		$('#loginPopup').css({
		'opacity' : '0',
		'z-index' : '1'
		});
		}, function() {
		$('#loginPopup').css({
		'opacity' : '1',
		'z-index' : '7'
		});
		});
		});
		}
		</script>-->

		<script type="text/javascript">
			$(document).ready(function() {

				//NEW SHIT//
				
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
			
			$('#managePopupButton').click(function(){
				$('#managePopup').toggle(function(){
					$('#managePopup').css({
					'z-index' : '2',
					'opacity' : '1'
				});
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
				
				
				//Login Popup
				/*$('#loginPopup').css({
				'opacity' : '0'
				});*/

				//Post Content
				var half = ($(window).height() / 2) - ($('#fixed').height() / 2);
				$('#fixed').css({
					'padding-top' : half
				});
				$('#fixed').css({
					'opacity' : '0.5'
				});

				//Post Button
				/*$('#fixedPostButton').css({
				'opacity' : '0.5'
				});*/

				//Login Button
				/*$('#fixedLoginButton').css({
				'opacity' : '0.5'
				});*/

				//Post Button
				/*var Postpadding = $(window).width() - 35;
				$('#fixedPostButton').css({
				'padding-left' : Postpadding
				});*/

				//Login Button
				/*var Loginpadding = $(window).width() - 100;
				$('#fixedLoginButton').css({
				'padding-left' : Loginpadding
				});*/

				//Navagation Bar
				$('#navBarCatagoryPrograming').mouseenter(function() {
					$('#fixedPrograming').css({
						'display' : 'inline'
					});
					$('#fixedAnimation').css({
						'display' : 'none'
					});
					$('#fixedRobotics').css({
						'display' : 'none'
					});
					$('#fixedOther').css({
						'display' : 'none'
					});
				});

				$('#navBarCatagoryAnimation').mouseenter(function() {
					$('#fixedAnimation').css({
						'display' : 'inline'
					});
					$('#fixedPrograming').css({
						'display' : 'none'
					});
					$('#fixedRobotics').css({
						'display' : 'none'
					});
					$('#fixedOther').css({
						'display' : 'none'
					});
				});

				$('#navBarCatagoryRobotics').mouseenter(function() {
					$('#fixedRobotics').css({
						'display' : 'inline'
					});
					$('#fixedPrograming').css({
						'display' : 'none'
					});
					$('#fixedAnimation').css({
						'display' : 'none'
					});
					$('#fixedOther').css({
						'display' : 'none'
					});
				});

				$('#navBarCatagoryOther').mouseenter(function() {
					$('#fixedOther').css({
						'display' : 'inline'
					});
					$('#fixedPrograming').css({
						'display' : 'none'
					});
					$('#fixedAnimation').css({
						'display' : 'none'
					});
					$('#fixedRobotics').css({
						'display' : 'none'
					});
				});

				$('#navBar').mouseenter(function() {
					$('#fixedPrograming').css({
						'display' : 'none'
					});
					$('#fixedAnimation').css({
						'display' : 'none'
					});
					$('#fixedRobotics').css({
						'display' : 'none'
					});
					$('#fixedOther').css({
						'display' : 'none'
					});
				});

				//Login Popup
				/*var loginPopupHeight = $(window).height() / 4;
				var loginPopupWidth = 383.5;
				var loginPopupMarginTop = ($(window).height() / 2) - (loginPopupHeight / 2);
				var loginPopupMarginLeft = ($(window).width() / 2) - (loginPopupWidth / 2);
				var loginPopupContentMarginLeft = (loginPopupWidth / 2) - ($('#loginPopupContent').width() / 2);
				var loginPopupContentMarginTop = (loginPopupHeight / 2) - ($('#loginPopupContent').height() / 2);
				$('#loginPopupContent').css({
				'margin-left' : loginPopupContentMarginLeft,
				'margin-top' : loginPopupContentMarginTop
				});
				if ($(window).width() > 686) {
				$('#loginPopup').css({
				'height' : loginPopupHeight,
				'width' : loginPopupWidth,
				'margin-top' : loginPopupMarginTop,
				'margin-left' : loginPopupMarginLeft
				});
				}

				if ($(window).width() < 686) {
				$('#loginPopup').css({
				'height' : loginPopupHeight,
				'width' : loginPopupWidth,
				'margin-top' : loginPopupMarginTop,
				'margin-left' : '150px'
				});
				}*/

				//Pop Content
				var popupHeight = $(window).height() - ($(window).height() / 4) + ($(window).height() / 7);
				var popupWidth = 600;
				//$(window).width() - ($(window).width() / 4);
				var popupMarginLeft = ($(window).width() / 2) - (popupWidth / 2);
				var popupMarginTop = ($(window).height() / 2) - (popupHeight / 2);
				$('#radioButton').css({
					'width' : popupWidth - (popupWidth / 4),
					'margin-left' : popupWidth - (popupWidth) + (popupWidth / 10)
				});

				$('textarea').css({
					'width' : popupWidth - (popupWidth / 4),
					'height' : popupHeight - (popupHeight / 2)
				});

				/*$('#fixedPostButton').css({
				 'opacity' : '0.5'
				 });*/

				$('#postCreationPopup').css({
					'height' : popupHeight,
					'width' : popupWidth,
					'margin-left' : popupMarginLeft,
					'margin-top' : popupMarginTop
				});

				$('#postCreationPopupContent').css({
					'margin-top' : popupHeight / 10
				});

				$('#postCreationPopupContentPadding').css({
					'margin-top' : popupHeight / 20
				});

				$('#postCreationPopupContentPaddingSmall').css({
					'margin-top' : popupHeight / 80
				});

				$('#fixed').mouseleave(function() {
					$('#fixedPrograming').css({
						'display' : 'none'
					});
					$('#fixedAnimation').css({
						'display' : 'none'
					});
					$('#fixedRobotics').css({
						'display' : 'none'
					});
					$('#fixedOther').css({
						'display' : 'none'
					});
					$('#fixed').css({
						'opacity' : '0.5'
					});
				});

				$('#fixed').mouseenter(function() {

					$('#fixed').css({
						'opacity' : '1'
					});
				});

				/*$('#fixedPostButton').mouseleave(function() {

				$('#fixedPostButton').css({
				'opacity' : '0.5'
				});
				});

				$('#fixedPostButton').mouseenter(function() {

				$('#fixedPostButton').css({
				'opacity' : '1'
				});
				});*/

				//Login Button
				/*$('#fixedLoginButton').mouseleave(function() {

				 $('#fixedLoginButton').css({
				 'opacity' : '0.5'
				 });
				 });

				 $('#fixedLoginButton').mouseenter(function() {

				 $('#fixedLoginButton').css({
				 'opacity' : '1'
				 });
				 });

				 $('#fixedLoginButton').click(function() {
				 $('#loginPopup').toggle(function() {
				 $('#loginPopup').css({
				 'opacity' : '0',
				 'z-index' : '1'
				 });
				 }, function() {
				 $('#loginPopup').css({
				 'opacity' : '1',
				 'z-index' : '7'
				 });
				 });
				 });*/
			});

			$(window).resize(function() {
				/*var loginPopupHeight = $(window).height() / 4;
				 var loginPopupWidth = 383.5;
				 var loginPopupMarginTop = ($(window).height() / 2) - (loginPopupHeight / 2);
				 var loginPopupMarginLeft = ($(window).width() / 2) - (loginPopupWidth / 2)

				 if ($(window).width() > 686) {
				 $('#loginPopup').css({
				 'height' : loginPopupHeight,
				 'width' : loginPopupWidth,
				 'margin-top' : loginPopupMarginTop,
				 'margin-left' : loginPopupMarginLeft
				 });
				 }

				 if ($(window).width() < 686) {
				 $('#loginPopup').css({
				 'margin-left' : '150px'
				 });
				 }*/

				var popupHeight = $(window).height() - ($(window).height() / 4) + ($(window).height() / 7);
				var popupWidth = 600;
				//$(window).width() - ($(window).width() / 4);
				var popupMarginLeft = ($(window).width() / 2) - (popupWidth / 2);
				var popupMarginTop = ($(window).height() / 2) - (popupHeight / 2);

				var half = ($(window).height() / 2) - ($('#fixed').height() / 2);
				$('#fixed').css({
					'padding-top' : half
				});
				$('#fixed').css({
					'opacity' : '0.5'
				});

				/*$('#fixedPostButton').css({
				 'opacity' : '0.5'
				 });*/

				/*$('#fixedLoginButton').css({
				 'opacity' : '0.5'
				 });*/

				/*var Postpadding = $(window).width() - 35;
				 $('#fixedPostButton').css({
				 'padding-left' : Postpadding
				 });*/

				/*var Loginpadding = $(window).width() - 100;
				 $('#fixedLoginButton').css({
				 'padding-left' : Loginpadding
				 });*/

				$('#radioButton').css({
					'width' : popupWidth - (popupWidth / 4),
					'margin-left' : popupWidth - (popupWidth) + (popupWidth / 10)
				});

				$('textarea').css({
					'width' : popupWidth - (popupWidth / 4),
					'height' : popupHeight - (popupHeight / 2)
				});

				/*$('#fixedPostButton').css({
				 'opacity' : '0.5'
				 });*/

				$('#postCreationPopup').css({
					'height' : popupHeight,
					'width' : popupWidth,
					'margin-left' : popupMarginLeft,
					'margin-top' : popupMarginTop
				});

				$('#postCreationPopupContent').css({
					'margin-top' : popupHeight / 10
				});

				$('#postCreationPopupContentPadding').css({
					'margin-top' : popupHeight / 20
				});

				$('#postCreationPopupContentPaddingSmall').css({
					'margin-top' : popupHeight / 80
				});
			});
		</script>
		<div id="home">

			<article>
				<p>
					Noah Huppert
				</p>
			</article>
		</div>

		<div id="projectSelect">

			<div id="subBody">
				<article>

					<div style="font-size: 24px;">
						Projects
						<div id= "Programing">
							<?php echo "<br>", "Programing";

							while ($programingTagCounter < count($postTag)) {
								if (strcmp($postTag[$programingTagCounter], "programing") == 2) {
									echo "<br>", "~", $postTitle[$programingTagCounter];
								}
								$programingTagCounter = $programingTagCounter + 1;
							}
							?>
						</div>

						<div id="Animation">
							<?php echo "<br>", "Animation";

							while ($animationTagCounter < count($postTag)) {
								if (strcmp($postTag[$animationTagCounter], "animation") == 2) {
									echo "<br>", "~", $postTitle[$animationTagCounter];
								}
								$animationTagCounter = $animationTagCounter + 1;
							}
							?>
						</div>

						<div id="Robotics">
							<?php echo "<br>", "Robotics";

							while ($roboticsTagCounter < count($postTag)) {
								if (strcmp($postTag[$roboticsTagCounter], "robotics") == 2) {
									echo "<br>", "~", $postTitle[$roboticsTagCounter];
								}
								$roboticsTagCounter = $roboticsTagCounter + 1;
							}
							?>
						</div>

						<div id="Other">
							<?php echo "<br>", "Other";

							while ($otherTagCounter < count($postTag)) {
								if (strcmp($postTag[$otherTagCounter], "other") == 2) {
									echo "<br>", "~", $postTitle[$otherTagCounter];
								}
								$otherTagCounter = $otherTagCounter + 1;
							}
							?>
						</div>

						<br>
					</div>

					<?php ?>
				</article>
			</div>
		</div>

		<div id="project">
			<?php

			while ($postNumber < count($postTag)) {

				echo '<div id="subBodyNoPadding">', '<article>', '<div styles="font-size: 24px;">';
				echo $postTitle[$postNumber];
				echo '</div>', '<div id="projectContent">';
				echo "<br>";
				$displayText = wordwrap($postContent[$postNumber], 146, "\n", false);
				echo substr($displayText, 0, 146);
				echo "...";
				echo '</div>', '</article>', '</div>';

				$postNumber = $postNumber + 1;

			}
			?>
		</div>

	</body>
</html>
