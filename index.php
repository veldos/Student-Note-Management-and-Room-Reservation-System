<?php



  require_once('Controller/SalleController.php');
  require_once('Controller/AdminController.php');
  require_once('Controller/Controller.php');
  require_once('Controller/UserController.php');
  require_once('Library/Auth.php');

try {
  isAcces();
  $action = getRoute();
  if (!is_callable($action))
    throw new Exception('L\'action ( ' . $action . ' ) n\'est pas trouve ');
  $action();

} catch (Exception $e) {
  ErrorAction($e);
}