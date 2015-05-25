/*
** my_printf.c for my_printf in /home/hassan_j/Projet my_printf
**
** Made by HASSANI Jawad
** Login   <hassan_j@etna-alternance.net>
**
** Started on  Tue Mar  3 09:42:46 2015 HASSANI Jawad
** Last update Thu Mar  5 10:44:01 2015 HASSANI Jawad
*/

#include "header.h"

void	parse_s(va_list ap)
{
  char*	s;
  
  s = va_arg(ap, char*);
  my_putstr(s);
}

void	parse_c(va_list ap)
{
  int	c;

  c = va_arg(ap, int);
  my_putchar(c);
}

void	parse_i(va_list ap)
{
  int	i;

  i = va_arg(ap, int);
  my_put_nbr(i);
}

void	parse_o(va_list ap)
{
  int	i;
  
  i = va_arg(ap, int);
  my_putnbr_base(i, "01234567");
}

void	parse_e(va_list ap)
{
  int	i;

  i = va_arg(ap, int);
  my_put_nbr(i);
}