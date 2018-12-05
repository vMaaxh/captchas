<?php

session_start();
echo "<img src='script_captchas.php' alt='captchas'/>";

?>
<form method="post">
	<input type="text" name="captcha" id="captcha">
	<input type="submit" name="submit">
	<?php
		if (isset($_POST['submit'])) 
		{
			$reponse = trim($_POST['captcha']);
			$bonne_rep = $_SESSION['chars1'].$_SESSION['chars2'].$_SESSION['chars3'].$_SESSION['chars4'].$_SESSION['chars5'];
			if ($reponse != $bonne_rep) 
			{
				echo '<br><p class="red">Mauvais captcha, veuillez réessayer !</p>';
			}
			else
			{
				header('Location: captcha_valid.php');
			}
		}
		
	?>
</form>

<style type="text/css">
	.green
	{
		color: #27ae60;
	}
	.red
	{
		color: #c0392b;
	}
</style>
