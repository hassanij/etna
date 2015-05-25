/*
** parser2.c for parser2 in /home/hassan_j/my_printf
** 
** Made by HASSANI Jawad
** Login   <hassan_j@etna-alternance.net>
** 
** Started on  Fri Mar  6 10:26:08 2015 HASSANI Jawad
** Last update Fri Mar  6 10:26:15 2015 HASSANI Jawad
*/

#include "header.h"

void		parse_x(va_list ap)
{
  int		i;

  i = va_arg(ap, int);
  my_putnbr_base(i, "0123456789abcdef");
}

void		parse_X(va_list ap)
{
  int		i;

  i = va_arg(ap, int);
  my_putnbr_base(i, "0123456789ABCDEF");
}

void		parse_u(va_list ap)
{
  int		div;
  int		temp;
  int		i;
  unsigned int	nbr;

  nbr = va_arg(ap, unsigned int);
  div = 1;
  i = 0;
  while ((nbr / div) >= 10)
    div *= 10;
  while ((div >= 1) || (div <= -1))
    {
      temp = nbr / div;
      my_put_nbr(temp);
      ++i;
      nbr %= div;
      div /= 10;
    }
}

void            parse_b(va_list ap)
{
  int           i;

  i = va_arg(ap, int);
  my_putnbr_base(i, "01");
}