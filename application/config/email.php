<?php
//-- OFFICE 365 
/*
$config['protocol'] = "smtp";
$config['smtp_crypto']="tls";
$config['smtp_host'] = "tcp://smtp.office365.com";
$config['smtp_user'] = "****************";//Enter username here
$config['smtp_pass'] = "***************";
$config['smtp_port'] = "587";
$config['mailtype'] = "text";
$config['charset'] = "utf-8";
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";
*/
//-- gmail 

$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.gmail.com";
$config['smtp_user'] = "gopal.sandeep@gmail.com"; //Enter username here
$config['smtp_pass'] = "***********"; //Enter gmail password here
$config['smtp_port'] = "465";
$config['mailtype'] = "text";
$config['charset'] = "utf-8";
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";

// /$this->email->initialize($config);
?>	