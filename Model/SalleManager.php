<?php

require_once('Model/Model.php');

function getAllavtive(){
  // return getCn()->query("select* from Reservations where Etat ='Active' and Date >= '" . Date("Y-m-d H:i:s") . "'" )->fetchAll();
  return getCn()->query("SELECT * FROM Reservations WHERE Etat = 'Active' and Date >= NOW() ")->fetchAll();

}
function addReservation(array $data)
{

  getCn()
    ->prepare('INSERT INTO Reservations(Email,Motif,Salle_id,Date,Creneau,Etat)
                    VALUES (?,?,?,?,?,?)')
    ->execute($data);

    return getCn()->query('SELECT MAX(id) from Reservations')->fetchColumn();
}

function insertToken(array $data){
  
  getCn()->prepare('INSERT INTO Tokens( Reservation_id, Token, Expired_time) VALUES (?,?,?)')
          ->execute($data);
}


function ReservationPossible(array $reservation)
{
  
	$Rq= getCn()->
              prepare("select count(*) from Reservations where Salle_id = ? and Date = ? and Creneau = ? and Etat = 'Active'");
	
  $Rq->execute($reservation);
	
  return !($Rq->fetchColumn());
}


function activerReservation(array $data){

  getCn()->prepare('UPDATE Reservations SET Etat=\'Active\' WHERE id = ?')
          ->execute($data);

}

function DesactiverReservation(array $data){

  getCn()->prepare('UPDATE Reservations SET Etat=\'Desactive\' WHERE id = ?')
  ->execute($data);

}

