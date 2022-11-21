<?php
session_start();
if (isset($_POST['submit'])) {
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "root");
    define("DBNAME", "saintotresor");
    $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $email = htmlentities($_POST['email']);
    $username = htmlentities($_POST['username']);
    $pswd = htmlentities($_POST['pswd']);
    $pswd_cfrm = htmlentities($_POST['pswd_cfrm']);
    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pswd']) && !empty($_POST['pswd_cfrm'])) {
        if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            $check = $db->prepare('SELECT * FROM member WHERE email = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();
            $email = strtolower($email);
            if ($row === 0 && $pswd === $pswd_cfrm) {
                $pswd = htmlentities(password_hash($_POST['pswd'], PASSWORD_DEFAULT, ['cost' => 12]));
                    $sql = "INSERT INTO `member`(email, user, pswd) VALUES ('$email', '$username', '$pswd')";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $_SESSION['user'] = [
                        'username' => $username,
                        'email' => $email,
                    ];
                    header('location: inscriptionform.php');
            } else {
                echo "compte existant ou mot de passe pas identique";
            }
        } else {
            echo "adresse mail non valide";
        }
    } else {
        header('location: inscriptionform.php');
        echo "il y a des champs vide";
    }
}