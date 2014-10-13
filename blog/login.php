<!DOCTYPE html>
<html>
	<body>
		<?php
		$username = $_POST["username"];
		$password = $_POST["password"];
		$loginInputHash = hash_pbkdf2("gost", $password, $username, 5, 20);
		
		$loginDataContent = file("passStuff/loginData.txt");
		$i = 0;
		$stringLength = 0;
		while($i < count($loginDataContent)){
			$stringLength = strlen($loginDataContent[$i]);
			$inFileHash[$i] = substr($loginDataContent[$i], $stringLength - 22, strlen($loginDataContent[$i]));
			$inFileUsername[$i] = substr($loginDataContent[$i], 0, $stringLength - 23);
			$i = $i + 1;
			$stringLength = 0;
		}
		$usernameKey = array_search($username, $inFileUsername);
		if(strcmp($inFileHash[$usernameKey], $loginInputHash) == 2){
			echo "<div style='color: #00F000;'>Accepted</div>";
			echo "IP Aproved: ", $_SERVER['REMOTE_ADDR'];
			$aproved = 1;
		}
		if(strcmp($inFileHash[$usernameKey], $loginInputHash) <> 2){
			echo "<div style='color: #FF0000;'>Denied</div>";
			$aproved = 0;
		}
		if($aproved==1){
			$whitelistContent = file('passStuff/whitelist.txt');
			$whitelistContent[count($whitelistContent) + 1] = $_SERVER['REMOTE_ADDR'] . PHP_EOL;
			file_put_contents('passStuff/whitelist.txt', $whitelistContent);
		}
		
		
		echo '<script>window.location = "http://127.0.0.1/projects/Paralax%20v2/";</script>';
		
		?>
		
		<script>
			if(<?php echo $aproved?>==1){
				var aprovedHour = today.getHours();
				var aprovedMinute = today.getMinutes();
				alert(aprovedHour);
			}
		</script>
	</body>
</html>