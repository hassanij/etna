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

char    *my_swap(char *src)
{
  int   j;
  int   i;
  char  *dest;

  i = my_strlen(src);
  dest = malloc(i * sizeof(char));
  if (dest == NULL)
    exit(EXIT_FAILURE);
  j = my_strlen(src) - 1;
  for(i = 0; j >= 0; i++, j--)
    dest[i] = src[j];
  return (dest);
}

char    my_arr(double src)
{
  char  arroundi;
  int   i;
  int   j;

  arroundi = '0';
  src = src * 10;
  i = (int)src;
  src = src - (int)src;
  src = src * 10;
  j = (int)src;
  if (j > 4)
    i = i + 1;
  arroundi = arroundi + (int)i;
  return (arroundi);
}

char    *my_itos(int int_to_convert, char *dest)
{
  char  *s;
  int   i;
  int   j;

  j = my_strlen(dest);
  s = dest;
  if (int_to_convert == 0)
    dest[j++] ='0';
  else
    {
      for(i = 0; int_to_convert; int_to_convert /= 10)
        s[i++] = '0' + int_to_convert % 10;
      dest = my_swap(s);
    }
  return (dest);
}

char            *my_dts(double src, int ptnumber, char* dest)
{
  double        j;
  int           integer;
  int           i;

  i = 0;
  integer = (int)src;
  j = src - integer;
  if (src < 0)
    {
      dest[1] = '-';
      integer = integer - integer;
      j = -j;
    }
  dest = my_itos(integer, dest);
  i = my_strlen(dest);
  dest[i++] = '.';
  for(integer = 0; ptnumber > 0; --ptnumber)
    {
      j = j * 10;
      dest[i++] = '0' + (int)j;
      j = j - (int)j;
    }
  dest[i++] = my_arr(j);
  dest[i] = '\0';

  return (dest);
}

void             parse_f(va_list ap)
{
  double        i;
  char          *dest;
  int           dec;
  int           y;

  i = va_arg(ap, double);
  dec = (int)i;
  for (y = 0; dec >= 1; y++)
    dec = dec/10;
  dest = malloc((y+8) * sizeof(char));
  if (dest == NULL)
    exit(EXIT_FAILURE);
  dest = my_dts(i, 5, dest);
  my_putstr(dest);
  free(dest);
}