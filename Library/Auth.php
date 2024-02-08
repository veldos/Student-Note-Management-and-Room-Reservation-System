<?php


require_once('Controller/UserController.php');

function isAcces(){

  session_start();
  if(!isset($_SESSION['user'])){
    AuthAction();
    exit;
  }

}


function getRoute(){
  return ($_REQUEST['action'] ?? 'Form') . 'Action';
}
