<?php
// function_other2.php for other2 in /home/hassan_j/projet/MicroShell/include
// 
// Made by HASSANI Jawad
// Login   <hassan_j@etna-alternance.net>
// 
// Started on  Fri Oct 17 14:31:58 2014 HASSANI Jawad
// Last update Sat Oct 18 15:13:36 2014 HASSANI Jawad
//

function	cmd_echo($array)
{
  $back = '';
  if (isset($array[1][0]) && $array[1][0] == "$")
    {
      $varenv = substr($array[1], 1);
      if (isset($_ENV[$varenv]))
	echo $_ENV[$varenv] . "\n";
      else
	echo "\e[01;31mUnexistent environment variable.\e[0;30m\n";
    }
  else
    {
      for ($i = 1; isset($array[$i]) && $array[$i] != '>' && $array[$i] != ">>"; $i++)
	{
	  if (isset($array[$i + 1]) && $array[$i + 1] != '>' && $array[$i + 1] != '>>')
	    $back .= $array[$i].' ';
	  else
	    $back .= $array[$i]."\n";
	}
    }
  echo $back;
}
function	cmd_cat($array)
{
  if (isset($array[1]))
    {
      if (file_exists($array[1]) == TRUE)
	{
	  if (is_readable($array[1]) == TRUE)
	    {
	      $str = file_get_contents($array[1]);
	      echo $str;
	    }
	  else 
	    echo "cat: $array[1]: \e[01;31mPermission denied\e[0;30m\n";
	}
      else
	echo "cat: $array[1]: \e[01;31mNo such file or directory\e[0;30m\n";
    }  
  else    
    echo "\e[01;31mInvalid use:\e[0;30m cat FILENAME\n";
}

function	cmd_help()
{
  echo "\n\e[01;31mAvailable commands:\e[0;30m\n";
  echo "\e[0;34mecho:\e[0;30m\t Output one or more strings.\n";
  echo "\e[0;34mcat:\e[0;30m\t Output the contents of a specific file.\n";
  echo "\e[0;34mls:\e[0;30m\t List files.\n";
  echo "\e[0;34mpwd:\e[0;30m\t Print working directory.\n";
  echo "\e[0;34mcd:\e[0;30m\t Change current directory.\n";
  echo "\e[0;34menv:\e[0;30m\t Print all environment variables.\n";
  echo "\e[0;34msetenv:\e[0;30m\t Set an environment variable.\n";
  echo "\e[0;34munsetenv:\e[0;30mUnset an environment variable.\n";
  echo "\e[0;34mclear:\e[0;30m\t Clear screen.\n";
  echo "\e[0;34mcal:\e[0;30m\t Calendar.\n";
  echo "\e[0;34mexit:\e[0;30m\t Quit.\n";
  echo "\e[0;34mhelp:\e[0;30m\t Srsly, you need a desc. ?\n\n";
}
function cmd_cowsay($array)
{
  echo "
 _________________
 < " . $array[1] . " >
 -----------------
        \   ^__^
         \  (oo)\_______
            (__)\       )\/\
                ||----w |
                ||     ||\n";
}