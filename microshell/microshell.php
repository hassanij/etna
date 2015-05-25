#!/usr/bin/env php
<?php
// microshell.php for microshell in /home/hassan_j/projet/MicroShell
// 
// Made by HASSANI Jawad
// Login   <hassan_j@etna-alternance.net>
// 
// Started on  Fri Oct 17 09:43:05 2014 HASSANI Jawad
// Last update Sat Oct 18 15:22:02 2014 HASSANI Jawad
//

require_once('./include/function_env.php');
require_once('./include/function_dir.php');
require_once('./include/function_other.php');
require_once('./include/function_other2.php');
require_once('./include/function_other3.php');
$_ENV['TERM'] = getenv("TERM");
$_ENV['HOME'] = getenv("HOME");
$_ENV['PWD'] = getenv("PWD");
$_ENV['USER'] = getenv("USER");
$_ENV['OLDPWD'] = NULL;

if (getenv("HOME") == NULL)
  $_ENV['HOME'] = "/home"; 

if (getenv("PWD") == NULL)
  $_ENV['PWD'] =  __DIR__;

if ($_ENV['PWD'] == NULL)
  $_ENV['PWD'] = "/home";

if ($_ENV['USER'] == NULL)
  {
    echo "username:";
    $user = fopen("php://stdin", 'rb');
    $username = fgets($user);
    $_ENV['USER'] = "$username";
  }

passthru('clear');
echo "\e[01;30mWelcome to MicroShell\e[0;30m \e[0;34mv0.42(beta)\e[0;30m\n\n";

function	microshell()
{
  while ('yoloswag')
    {
      echo "$>";
      echo "\e[05;030m_ \e[00;30m";
      $userin = fopen("php://stdin", 'rb');
      $uistr = fgets($userin);
      if (strlen($uistr) == 0)
	exit();
      $uistr = trim($uistr);
      $array = explode(" ", $uistr);
      $cmd = 'cmd_'.$array[0];
      $back = "";
      if (function_exists($cmd) == TRUE)
	$back = $cmd($array);
      else
	echo $array[0].": \e[01;31mCommand not found\e[00;30m\n";
      $back = redirection($array, $back);
      echo $back;
    }
  fclose($fd);
}
microshell();