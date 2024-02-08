<?php

function getCn()
{
  return new PDO("mysql:host=localhost;dbname=SMI", "root", "");
}



function findAllFromTablebyCondition($table, $columnCondition , $condition )
{
  return getCn()->query('SELECT * FROM ' . $table . ' WHERE ' . $columnCondition . ' = \'' . $condition . '\'ORDER BY id DESC ')->fetchAll();
}

function findColumnFromTableByCondition($table,$column,$columnCondition ,$condition ){

  return getCn()->query("SELECT $column FROM $table WHERE $columnCondition = '$condition' ORDER BY id DESC LIMIT 1;")
    ->fetchColumn();
}
