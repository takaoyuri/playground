<?php
$host = getenv('PG_HOST');
$user = getenv('PG_USER');

$PDO = new PDO("pgsql:host={$host}", $user);
foreach($PDO->query('select * from a') as $row)  {
  print_r($row);
}
