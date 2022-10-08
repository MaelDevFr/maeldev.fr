<?php
session_start();
if (isset($_POST['send'])) {
    // extraction des variables
    extract($_POST);
    // verification de l'existence des variables
    if (
        isset($name) && $name != "" &&
        isset($email) && $email != "" &&
        isset($message) && $message != ""
    ) {
        // envoyé l'email
        $to = "contact@maeldev.fr";
        $subject = "Vous avez reçu un message de : " . $email;

        $message = "
        <p>Vous avez reçu un message de <strong>" . $email . "</strong></p>
        <p><strong>Nom : " . $name . "</strong></p>
        <p><strong>Message : " . $message . "</strong></p>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <' . $email . '>' . "\r\n";

        $send = mail($to, $subject, $message, $headers);
        if ($send) {
            $_SESSION['success_message'] = $info = "message envoyé !";
        } else {
            $info = "message non envoyé";
        }
    } else {
        // Si elle sont vides
        $info = "Veuillez remplir tous les champs !";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="mael, Mael, Développeur Web">
    <meta name="description" content="Mon portfolio en tant que développeur web">
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
        <a href="../../index.html">
            <h1 class="logo-title">MD</h1>
        </a>
        <ul>
            <li class="header"><a href="./project.html">Projets</a></li>
            <li class="header"><a href="./skills.html">Skills</a></li>
            <li class="header"><a class="active-page" href="./contact.html">Contact</a></li>
            <li class="header"><a href="./blog.html">Blog</a></li>
        </ul>
    </nav>
    <?php
    // afficher le message de succès
    if (isset($_SESSION['success_message'])) { ?>
        <p class="request-message" style="color:green">
            <?= $_SESSION['success_message'] ?>
        </p>
    <?php
    }
    ?>
    <section class="contact_section text-center ptb_3">
        <h2 class="section_title">Me Contacter</h2>
        <p class="section_text"></p>
        <form action="" method="post" class="ptb_2">
            <div class="label_input_fields">
                <div class="name_input">
                    <label for="name" class="is_required">Nom :</label>
                    <input name="name" type="text" id="name" placeholder="Votre nom..." required>
                </div>
                <div class="email_input">
                    <label for="email" class="is_required">Mail :</label>
                    <input name="email" type="email" id="email" placeholder="Votre EMail..." required>
                </div>
                <div class="message_input">
                    <label name="" for="message" class="is_required">Message :</label>
                    <textarea name="message" type="text" id="message" placeholder="Votre Message..." required></textarea>
                </div>
            </div>
            <input class="btn btn_cta" type="submit" name="send" id="">
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
            <p>Copyright &copy; 2022 Maël Dev. Tous droits
                réservés. <span class="contact-footer">Email : <a href="mailto:contact@maeldev.fr">contact@maeldev.fr</a></span>
            </p>
        </div>
    </footer>
    <script src="../js/main.js"></script>
</body>

</html>