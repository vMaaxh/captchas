<?php

	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Captcha</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="page">
		<?php echo "<img src='script_captchas.php' alt='captchas'/>"; ?>
		<form method="post">
			<div class="verification">
				<input type="text" name="captcha" id="captcha" maxlength="5">
				<label for="captcha">Vérification</label>
			</div>
			<span class="submit-effect"><input type="submit" name="submit" class="submit"></span>
		</form>
		<?php
				if (isset($_POST['submit'])) 
				{
					$reponse = strtoupper(trim($_POST['captcha']));
					$bonne_rep = $_SESSION['chars1'].$_SESSION['chars2'].$_SESSION['chars3'].$_SESSION['chars4'].$_SESSION['chars5'];
					if ($reponse != $bonne_rep) 
					{
						echo '<br><p class="red-error">Mauvais captcha, veuillez réessayer !</p>';
					}
					else
					{
						$_SESSION['valid'] = true;
						header('Location: captcha_valid.php');
					}
				}
			?>
	</div>
</body>
</html>

