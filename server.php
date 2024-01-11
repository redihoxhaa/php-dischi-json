<?php

require_once 'functions.php';

$database = file_get_contents(__DIR__ . '/discs.json');

$discs = json_decode($database, true);




// header('Content-Type: application/json');
// echo json_encode($todos);