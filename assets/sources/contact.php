<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = 'contact@maeldev.fr'; 
		$subject = 'Nouveau contact !';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Veuillez rentrer votre nom';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Veuillez entrer une adresse email valide';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Veuillez entrer votre message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Votre réponse est incorrecte';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Mail envoyé avec succès ! Merci à vous</div>';
	} else {
		$result='<div class="alert alert-danger">Désolé, il y a eu une erreur, veuillez ré-essayer plus tard.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="mael, Mael, Développeur Web">
    <meta name="description" content="A partir de cette page, vous pouvez me contacter à mon adresse mail contact@maeldev.fr">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://kit.fontawesome.com/6a7d53791c.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maël Dev</title>
</head>

<body>
    <nav class="header-content">
        <a href="../../index">
            <h1 class="logo-title">MD</h1>
        </a>
        <ul>
            <li class="header"><a href="./project">Projets</a></li>
            <li class="header"><a href="./skills">Skills</a></li>
            <li class="header"><a class="active-page" href="./contact.php">Contact</a></li>
            <li class="header"><a href="./blog">Blog</a></li>
        </ul>
    </nav>
    <section class="contact_section text-center ptb_3">
        <h2 class="section_title">Me Contacter</h2>
        <p class="section_text"></p>
        <form action="" method="post" class="ptb_2">
            <div class="label_input_fields">
                <div class="name_input">
                    <label for="name" class="is_required">Nom :</label>
                    <input name="name" type="text" id="name" placeholder="Votre nom...">
                    <?php echo "<p class='text-danger'>$errName</p>";?>
                </div>
                <div class="email_input">
                    <label for="email" class="is_required">Mail :</label>
                    <input name="email" type="email" id="email" placeholder="Votre EMail...">
                    <?php echo "<p class='text-danger'>$errEmail</p>";?>
                </div>
                <div class="message_input">
                    <label name="" for="message" class="is_required">Message :</label>
                    <textarea name="message" type="text" id="message" placeholder="Votre Message..."><?php echo htmlspecialchars($_POST['message']);?></textarea>
                    <?php echo "<p class='text-danger'>$errMessage</p>";?>
                </div>
                <div class="human_input">
                    <label for="human" class="is_required">2 + 3 = ?</label>
                    <input type="text" class="form-control" id="human" name="human" placeholder="Votre réponse">
					<?php echo "<p class='text-danger'>$errHuman</p>";?>
                </div>
            </div>
            <input class="btn btn_cta" type="submit" name="submit" id="submit">
            <br />
            <div class="result">
				<?php echo $result; ?>	
			</div>
        </form>
    </section>
    <section class="contact_info_section text_center ptb_3">
        <div class="container">
            <div class="contact_info">
                <div>
                    <i class="fas fa-envelope fa-2x"></i>
                    <h3>E-mail</h3>
                    <p>contact@maeldev.fr</p>
                </div>
                <div>
                    <i class="fab fa-discord fa-2x"></i>
                    <h3>Discord</h3>
                    <p>Maël#8622</p>
                </div>
                <div>
                    <i class="fab fa-github fa-2x"></i>
                    <h3>Github</h3>
                    <p>@MaelDevFr</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="main-footer ptb_3">
      <div class="footer-content container text-center">
        <p>
          <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"
            ><img
              alt="Licence Creative Commons"
              style="border-width: 0"
              src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a
          ><br />Cette œuvre est mise à disposition selon les termes de la
          <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"
            >Licence Creative Commons Attribution - Pas d’Utilisation
            Commerciale 4.0 International</a
          >.
          <span class="contact-footer"
            >Email :
            <a href="mailto:contact@maeldev.fr">contact@maeldev.fr</a></span
          >
        </p>
      </div>
    </footer>
    <script src="../js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>