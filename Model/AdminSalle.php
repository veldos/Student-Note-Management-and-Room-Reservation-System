<?php

require_once('Model/Model.php');

function removeSalle($data){
  
  getCn()->prepare('UPDATE Salle SET disponnible="non" WHERE id=?')
    ->execute($data);
}


function insertSalle($data){
  getCn()->prepare('INSERT INTO Salle(name,	disponnible) VALUES (?,?)')
    ->execute($data);
}
function getAllSalle(){
  return getCN()->query("select * from Salle where disponnible='yes'")->fetchAll();
}