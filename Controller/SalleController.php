<?php

require_once('Controller/Controller.php');

function SalleListeAction(){
  $view = "View/ViewSalleReserve.php";
   $variable= [
      'title' => 'Liste des salles',
       "Reservations" => getAllavtive(),
   ];
   render($view,$variable);
}


function GenerateToken($id, $action)
{

  date_default_timezone_set('Africa/Casablanca');
  $ExpirationTime = date("Y-m-d H:i:s", strtotime('+4 hours'));
  $token = sha1($id . $action . rand(0, 999999999));

  insertToken([$id, $token, $ExpirationTime]);

  $lien = "index.php?action=$action&token=$token&id=$id";
  $title = 'Email Test';

  $View = 'View/ViewEmailTest.php';

  $variables = [
    'title' => $title,
    'lien' => $lien,
  ];

  render($View, $variables);
}


function FormAction()
{

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['email']))
      $error['email'] = 'il faut saisir l\'email';
    elseif (substr(strtolower($_POST["email"]), -12, 12) != "@usmba.ac.ma")
      $error['email'] = "Utilisez votre mail académique!!...";
    if (empty($_POST['motif']))
      $error['motif'] = 'il faut saisir le motif de reservation';
    if (empty($_POST['salle_id']))
      $error['salle'] = 'il faut saisir la salle';
    if (empty($_POST["date"]) or $_POST["date"] < Date("Y-m-d"))
      $error["date"] = "Date de réservation invalide !...";
    elseif (empty($_POST['creneau']))
      $error['creneau'] = 'il faut saisir le creneau';
    else {
      $salle = $_POST['salle_id'];
      $date = $_POST['date'];
      $creneau = $_POST['creneau'];
      if (ReservationPossible([$salle, $date, $creneau]) == false){
        render("View/Vsallenodis.php",["salle"=>$salle,"date"=>$date,"creneau"=>$creneau ,'title'=>'disponibilité']);
        $error['salle'] = 'Cette Salle est déjà réservée pour la date et le créneau choisi !';}
      else 
        if (!isset($error)) {
        $Reservation_id = addReservation(
          [
            $_POST['email'],
            $_POST['motif'],
            $_POST['salle_id'],
            $_POST['date'],
            $_POST['creneau'],
            'Desactive',
          ]
        );
        $action="add";
        date_default_timezone_set('Africa/Casablanca');
        $ExpirationTime = date("Y-m-d H:i:s", strtotime('+4 hours'));
        $token = sha1($Reservation_id . $action . rand(0, 999999999));

        insertToken([$Reservation_id, $token, $ExpirationTime]);
        $lien = "index.php?action=$action&token=$token&id=$Reservation_id";
        

        render("View/Vsalledis.php",["salle"=>$salle,"date"=>$date,"creneau"=>$creneau ,'title'=>'disponibilité' ,'lien'=>$lien]);
    }
   
  }
  }
  $View = 'View/ViewForm.php';
  $title = 'Ajouter une reservation';
  $variables = [
    'title' => $title,
    'salles' => findAllFromTablebyCondition('Salle','	disponnible','yes'),
    'error' => $error ?? [],
  ];
  render($View, $variables);

}

function addAction()
{
  $Reservation_id = $_REQUEST['id'];
  $token = $_REQUEST['token'];

  if (findColumnFromTableByCondition('Tokens', 'Token', 'Reservation_id', $Reservation_id) == $token) {
    activerReservation(
      [
        $Reservation_id
      ]
    );
    header('Location: index.php?action=SalleListe');
  } else
    throw new Exception('Le token est invalide !!');
}


function removeAction()
{

  GenerateToken($_REQUEST['Reservation_id'], 'Desactiver');

}

function DesactiverAction()
{
  $id = $_REQUEST['id'];
  $token = $_REQUEST['token'];
  if (findColumnFromTableByCondition('Tokens', 'Token', 'Reservation_id', $id) == $token) {
    DesactiverReservation(
      [
        $id,
      ]
    );
    header('Location: index.php?action=SalleListe');

  } else
    throw new Exception('Le token est invalide !!');
}