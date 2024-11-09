<?php
require "../Database/Repository.php";
require "../../config.php";
$notification = new Repository( $HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, "notification");

function getDataNotification(){
  global $notification;
  return $notification->findAll("*", ["sent_to"=> $_SESSION["userId"]], ["createAt"], ["LIMIT 5" ]);
}