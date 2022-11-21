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
        $pswd = htmlentities($_POST['pswd']);
        if (!empty($_POST['email']) && !empty($_POST['pswd'])) {
            if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
                $sql = "SELECT `pswd` FROM `member` WHERE `email`=?";
                $query = $db->prepare($sql);
                $query->execute(array($email));
                $userinfo = $query->rowCount();
                $verifmdp = "";
                if ($userinfo === 1) {
                    $user = $query->fetch();
                    $verifmdp = $user['pswd'];
                } else {
                    echo 'mdp ou identifiant inccorrect';
                }
                if (password_verify($pswd, $verifmdp) === TRUE) {
                    $sql = "SELECT * FROM `member` WHERE `email`=?";
                    $query = $db->prepare($sql);
                    $query->execute(array($email));
                    $userinfo = $query->rowCount();
                    $user = $query->fetchAll();
                    $_SESSION['user'] = [
                        'username' => $user[0]["username"],
                        'email' => $user[0]["email"],
                    ];
                    header('location: connexion.php');
                }
                else {
                    header('location: connexion.php');
                }
            }
        }
}
