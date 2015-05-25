<?php
// function_other.php for other in /home/hassan_j/projet/MicroShell/include
// 
// Made by HASSANI Jawad
// Login   <hassan_j@etna-alternance.net>
// 
// Started on  Fri Oct 17 10:09:27 2014 HASSANI Jawad
// Last update Sat Oct 18 15:17:30 2014 HASSANI Jawad
//

function	cmd_exit()
{
  echo "\n\nCya.\n";
  exit();
}

function	redirection($array)
{
  if (isset($array[2]) && $array[2] == ">")
    {
      if (is_writable($array[3]) == FALSE)
	return ("\e[01;31mPermission denied.\e[00;30m\n");
      if (is_dir($array[3]))
	return ("\e[01;31m$array[3]: Is a directory.\e[00;30m\n");
      $h = fopen($array[3], 'w+');
      if (isset($h) == NULL)
	return ("\e[01;31mCannot open file\e[00;30m\n");
      else
	{
	  fwrite($h, "$array[1]\n");
	  fclose($h);
	}
    }
  if (isset($array[2]) && $array[2] == ">>")
    {
      if (is_writable($array[3]) == FALSE)
	return ("\e[01;31mPermission denied.\e[00;30m\n");
      else if (is_dir($array[3]))
	return ("\e[01;31m$array[3]: Is a directory.\e[00;30m\n");
      $h = fopen($array[3], 'a+');
      if (isset($h) == NULL)
	return ("\e[01;31mCannot open file\e[00;30m\n");
      else 
	{
	  fwrite($h, "$array[1]\n");
	  fclose($h);
	}
    }
}

function	path_finding($path)
{
  if (file_exists($path) == FALSE)
    return ("cd: ".$path.": \e[01;31mNo such file or directory\e[00;30m\n");
  else if (is_readable($path) == FALSE)
    return ("cd: ".$path.": \e[01;31mPermission denied\e[00;30m\n");
  else if (is_dir($path) == FALSE)
    return ("cd: ".$path.": \e[01;31mNot a directory\e[00;30m\n");
  else if (($filecontent = opendir($path)) == FALSE)
    return ("cd: ".$path.": \e[01;31mCannot open dir\e[00;30m\n");
  if (isset($filecontent) && $filecontent != FALSE)
    {
      chdir($path);
      $_ENV['OLDPWD'] = $_ENV['PWD'];
      $_ENV['PWD'] = getcwd();
      closedir($filecontent);
    }
}