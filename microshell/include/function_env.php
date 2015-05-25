<?
function	cmd_env()
{
  $back = "";
  foreach ($_ENV as $key => $value)
    $back .= $key."=".$value."\n";
  echo $back;
}

function	cmd_setenv($array)
{
  if (isset($array[1]) && isset($array[2]))
    {
      $_ENV[$array[1]] = $array[2];
      echo "\e[01;32mVariable set.\e[00;30m\n";
    }
  else 
    echo "unsetenv: \e[01;31mInvalid arguments\e[00;30m\n";
}

function	cmd_unsetenv($array)
{
  $back = ""; 
  if (isset($_ENV[$array[1]]))
    {
      unset($_ENV[$array[1]]);
      $back = "\e[01;32mVariable unset.\e[00;30m\n";
    }
  else
    $back = "unsetenv: \e[01;31mInvalid arguments\e[00;30m\n";
  echo $back;
}