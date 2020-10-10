<?php
$host = getenv('PG_HOST');
$user = getenv('PG_USER');

$PDO = new PDO("pgsql:host={$host}", $user);
$Stm = $PDO->query('select * from a');
foreach($Stm->fetchAll(PDO::FETCH_ASSOC) as $row)  {
  print_r($row);
}
