<?php

require_once('Model/Model.php');

function insertUser($data){
  getCn()->prepare('INSERT INTO Users(Email) VALUES (?)')
    ->execute($data);

    return getCn()->query('SELECT MAX(id) from Users')->fetchColumn();
  
}

function insertUserToken($data){
  getCn()->prepare('INSERT INTO UserTokens(user_id, Token) VALUES  (?,?)')
    ->execute($data);
}
