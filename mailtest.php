<?php
// the message
error_reporting(E_ALL); ini_set('display_errors', '1');
require 'sendmail.php';
echo Send_Mail('khurramgujjar40@gmail.com','hello','test mail');
?>