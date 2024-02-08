<?php

require_once('Controller/Controller.php');



function addSalleAction()
{
  if(!isset($_SESSION['admin'])){
    header('Location: index.php');
    exit;
  }
 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['name']))
      $error_name = 'Le nome de salle ne peut pas etre vide...';
    elseif($_POST['name'] == findColumnFromTableByCondition('Salle','name','name',$_POST['name']))
    $error_name = 'Cette Salle est deja existe...';
  
    if(!isset($error_name)){

      insertSalle([$_POST['name'],'yes']);
      header('Location: index.php?action=adminTask');
    }

  }
  

  $View = 'View/ViewAddSalle.php';
  $variables = [
    'title' => 'Ajouter Une Salle',
    'error_name' => $error_name ?? '' , 
  ];

  render($View,$variables);
}

function removeSalleAction(){
 
  if(!isset($_SESSION['admin'])){
    header('Location: index.php');
    exit;
  }

  removeSalle([$_REQUEST['Salle_id']]);
  header('Location: index.php?action=adminTask');

}


function adminTaskAction()
{
  if(!isset($_SESSION['admin'])){
    header('Location: index.php');
    exit;
  }
 
  $View = 'View/ViewAdmin.php';

  $variables = [
      'title' => 'Admin',
      'Salle' => getAllSalle(),
  ];
  render($View, $variables);
}
