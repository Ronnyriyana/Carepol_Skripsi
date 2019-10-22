<?php

function gcm($msg) {

  $fields = array
  (
    'to'  => '/topics/cnb',
    'notification' => $msg
  );

  

  $headers = array(
  'Authorization: key=AAAAQb1NvlU:APA91bG9zhSSPjw2k88DUXn-_3x2nJh3W8cuEeOJhRHx9IL7IPZlEpic32w_nzgJh5YJxk5hKqUyOMcIMAQhisYgy70uM-qOp8Q0tQmP2gtULxQykZkmQeVMWExwe8b7uyoFlzQS5yt_', // FIREBASE_API_KEY_FOR_ANDROID_NOTIFICATION
  'Content-Type: application/json'
  );
  // Open connection
  $ch = curl_init();
  // Set the url, number of POST vars, POST data
  curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
  curl_setopt( $ch,CURLOPT_POST, true );
  curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
  curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
  // Disabling SSL Certificate support temporarly
  curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
  curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
  // Execute post
  $result = curl_exec($ch );
  if($result === false){
  die('Curl failed:' .curl_errno($ch));
  }
  // Close connection
  curl_close( $ch );
  return $result;

}

?>
