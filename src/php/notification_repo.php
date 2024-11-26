<?php
require "../Database/Repository.php";
require "../../config.php";
$notification = new Repository( "notification");

function getDataNotification(){
  global $notification;
  return $notification->findAll("*", ["sent_to"=> $_SESSION["userId"]], ["createAt"], ["LIMIT 5" ]);
}
function deleteNotification($id){
  global $notification;
  return $notification->deleteOne($id);
}