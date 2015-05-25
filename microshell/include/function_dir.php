<?php
// function_dir.php for functiondir in /home/hassan_j/projet/MicroShell/include
// 
// Made by HASSANI Jawad
// Login   <hassan_j@etna-alternance.net>
// 
// Started on  Fri Oct 17 09:49:01 2014 HASSANI Jawad
// Last update Sat Oct 18 15:12:01 2014 HASSANI Jawad
//
function cmd_cd($array)
{ 
    $back = "";
    if (count($array) == 1 && $_ENV['PWD'] != $_ENV['HOME'])
      {
	$_ENV['OLDPWD'] = $_ENV['PWD'];
	$_ENV['PWD'] = $_ENV['HOME'];
      }
    if ($_ENV['PWD'] == $_ENV['HOME'])
      return ($back);
    else if (isset($array[1][0]) && $array[1][0] == '-')
      {
	$swap = $_ENV['PWD'];
	$back .= $_ENV['OLDPWD']."\n";
	$_ENV['PWD'] = $_ENV['OLDPWD'];
	$_ENV['OLDPWD'] = $swap;
      }
    else
      $back = path_finding($array[1]);
    return ($back);
}

function	cmd_pwd()
{
  echo $_ENV['PWD']."\n";
}

function	cmd_ls($array)
{
  if (isset($array[1]) == FALSE)
    $array[1] = $_ENV['PWD'];
  if (file_exists($array[1]) == FALSE)
    return ("ls: ".$array[1].": \e[01;31mNo such file or directory\e[00;30m\n");    
  if (is_readable($array[1]) == FALSE)
    return ("ls: ".$array[1].": \e[01;31mPermission denied\e[00;30m\n");
  if (is_dir($array[1]) == FALSE)
    return ("ls: ".$array[1].": \e[01;31mNot a directory\e[00;30m\n");
  if (($dircontent = opendir($array[1])) == FALSE)
    return ("ls: ".$array[1].": \e[01;31mCannot open dir\e[00;30m\n");
  else if (isset($dircontent) && $dircontent != FALSE)
    {
      $dir = array();
      while ($dir[] .= readdir($dircontent));
      sort($dir);
      $back = ls_next($dir, $array[1]);
      closedir($dircontent);
      echo $back;
    }
}

function        ls_next($dir, $path)
{
  $back = "";
  for ($i = 0; isset($dir[$i]); $i++)
    {
      if (isset($dir[$i][0]) && strlen($dir[$i]) > 0 && $dir[$i][0] != '.')
        {
          if (is_dir($path.'/'.$dir[$i]) == TRUE)
	    $back .= $dir[$i] . '/' . "\n";
          else if (is_link($path.'/'.$dir[$i]) == TRUE)
            $back .= $dir[$i] . '@' . "\n";
          else if (is_executable($path.'/'.$dir[$i]) == TRUE)
	    $back .= $dir[$i] . '*' . "\n";
	  else
	    $back .= $dir[$i] . "\n";
        }
    }
  return ($back);
}