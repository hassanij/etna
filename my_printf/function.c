/*
** fonctions.c for fonctions in /home/hassan_j/my_printf
** 
** Made by HASSANI Jawad
** Login   <hassan_j@etna-alternance.net>
** 
** Started on  Tue Mar  3 17:21:09 2015 HASSANI Jawad
** Last update Tue Mar  3 17:21:11 2015 HASSANI Jawad
*/

#include "header.h"

void	my_putchar(char c)
{
  write(1, &c, 1);
}

int	my_strlen(char *str)
{
  int	count;
  
  count = 0;
  while (str[count])
    count = count + 1;
  return (count);
}

void	my_putstr(char *str)
{
  int	i;
  
  for (i = 0; str[i] != '\0'; i++)
    my_putchar(str[i]);
}

void	my_put_nbr(int nb)
{
  int	div;
  int	test;
  
  div = 1;
  test = 0;
  if (nb == -2147483648)
    {
      my_putstr("-2147483648");
      test = 1;
    }
  if (nb < 0 && test != 1)
    {
      my_putchar('-');
      nb = nb * (-1);
    }
  while ((nb / div) >= 10 && test != 1)
    {
      div = div * 10;
    }
  while (div > 0 && test != 1)
    {
      my_putchar((nb / div) % 10 + 48);
      div = div / 10;
    }
}

int     my_putnbr_base(int nbr, char *base)
{
  int   r;
  int   i;
  int   len;

  len = my_strlen(base);
  if (nbr < 0)
    {
      my_putchar('-');
      nbr = nbr * -1;
    }
  i = 1;
  while ((nbr / i) >= len)
    i = i * len;
  while (i > 0)
    {
      r = (nbr / i) % len;
      my_putchar(base[r]);
      i = i / len;
    }
  return (nbr);
}