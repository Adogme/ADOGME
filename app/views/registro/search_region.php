<?php 
if(!isset($_REQUEST['term']))
	exit();

$data = array(
	array('value' => 'Lima'),
	array('value' => 'Piura'),
	array('value' => 'Trujillo'),
	array('value' => 'Arequipa')
);

$data = ['Lima', 'Trujillo', 'Piura', 'Arequipa'];

echo json_encode($data);