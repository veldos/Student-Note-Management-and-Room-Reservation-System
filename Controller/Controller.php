<?php

require_once('Model/SalleManager.php');
require_once('Model/UserManager.php');
require_once('Model/AdminSalle.php');


function render($View, array $variables = [])
{
  extract($variables);

  if (!file_exists($View))
    throw new Exception($View . 'n\'existe pas');
  ob_start();
  require($View);
  $View = ob_get_clean();
  require_once('View/Template/template.php');

}


function ErrorAction($e)
{
  $View = 'View/ViewError.php';
  $variables = [
    'error' => $e->getMessage(),
    'title' => 'Error',
  ];

  render($View, $variables);
}

