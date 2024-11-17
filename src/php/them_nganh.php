<?php
require "../Database/Repository.php";
$mysqli = new Repository( 'nganh_xet_tuyen');
$mysqli->findAll();