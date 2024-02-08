<?php

require_once('Controller/Controller.php');


function generateUserToken($email)
{

  date_default_timezone_set('Africa/Casablanca');
  $token = sha1($email . rand(0, 999999999));

  $user_id = insertUser([$email]);

  insertUserToken([$user_id, $token]);

  session_start();
  $_SESSION['user'] = $token;
  header('Location: index.php?action=Form&token=' . $token);

}

function AuthAction()
{
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['user_token'])) {
      if (empty($_POST['user_token']))
        $ErrorToken = 'Il faut Saisir le token';
      elseif ($_POST['user_token'] != findColumnFromTableByCondition('UserTokens', 'Token', 'Token', $_POST['user_token']))
        $ErrorToken = 'le token est invalide';
      else {
        $_SESSION['user'] = $_POST['user_token'];
        header('Location: index.php?action=Form');
      }
    }

    if (isset($_POST['user_mail'])) {
      if (empty($_POST['user_mail']))
        $ErrorEmail = 'il faut saisir l\'email';
      elseif (substr(strtolower($_POST["user_mail"]), -12, 12) != "@usmba.ac.ma")
        $ErrorEmail = 'Il faut utiliser l\'email academyque ';
      else
        generateUserToken($_POST['user_mail']);
    }
  }

  $variables = [
    'title' => 'Authentification',
    'ErrorToken' => $ErrorToken ?? '',
    'ErrorEmail' => $ErrorEmail ?? ''
  ];

  render('View/ViewAuth.php', $variables);
}



function DeconnecterAction()
{
  session_destroy();
  header('Location: index.php');
}

