<?php

$db = new PDO("mysql:dbname=amigo_oculto;host=localhost","root","");

$users = $db->query("SELECT * FROM users");
$users = $users->fetchAll();

foreach ($users as $user) {

	$id = $user['id'];
	$aux1 = $db->prepare("SELECT * FROM users WHERE id != $id AND amigo_id = 0 ORDER BY RAND() LIMIT 1");
	$aux1->execute();
	$amigo = $aux1->fetch();
	$amigo_id = $amigo['id'];
	$aux2 = $db->prepare("UPDATE users SET amigo_id = $id WHERE id = $amigo_id");
	$aux2->execute();

}