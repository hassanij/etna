/*
** my_printf.c for my_printf in /home/hassan_j/Projet my_printf
** 
** Made by HASSANI Jawad
** Login   <hassan_j@etna-alternance.net>
** 
** Started on  Tue Mar  3 09:42:46 2015 HASSANI Jawad
** Last update Fri Mar  6 10:27:49 2015 HASSANI Jawad
*/

#include "header.h"

t_cmd	g_cmd[]=
  {
    {'s', &parse_s},
    {'d', &parse_i},
    {'i', &parse_i},
    {'c', &parse_c},
    {'x', &parse_x},
    {'X', &parse_X},
    {'o', &parse_o},
    {'u', &parse_u},
    {'e', &parse_e},
    {'f', &parse_f},
    {'b', &parse_b},
    {'\0', NULL}
  };

void		check_cmd(char cmd, va_list ap)
{
  int		i;
  int		check;

  check = 0;
  for (i = 0; g_cmd[i].cmd != '\0'; i++)
    if (g_cmd[i].cmd == cmd)
      {
	g_cmd[i].f(ap);
	check = 1;
      }
  if (check == 0)
  {
    my_putchar('%');
    my_putchar(cmd);
  }
}

int		my_printf(char* argfixe, ...)
{
  va_list	ap;
  int		i;

  if (argfixe == NULL)
    return(0);
  va_start(ap, argfixe);
  for (i = 0; argfixe[i] != '\0'; i++)
    {
      if (argfixe[i] == '%' && argfixe[i+1] != '%')
	{
	  i++;
	  check_cmd(argfixe[i], ap);
	}
      else if (argfixe[i] == '%' && argfixe[i+1] == '%')
	{
	  i++;
	  my_putchar('%');
	}
      else
	my_putchar(argfixe[i]);
    }
  va_end(ap);
  return(0);
}