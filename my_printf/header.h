/*
** header.h for header in /home/hassan_j/Projet my_printf
** 
** Made by HASSANI Jawad
** Login   <hassan_j@etna-alternance.net>
** 
** Started on  Tue Mar  3 09:42:07 2015 HASSANI Jawad
** Last update Fri Mar  6 10:36:17 2015 HASSANI Jawad
*/

#include <sys/stat.h>
#include <sys/types.h>
#include <dirent.h>
#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>
#include <pwd.h>
#include <grp.h>
#include <time.h>
#include <stdarg.h>
#include <string.h>
#include <math.h>

/*
** functions.c
*/

void    my_putchar(char c);
int	my_strlen(char *str);
void    my_putstr(char *str);
void    my_put_nbr(int nb);
int     my_putnbr_base(int nbr, char *base);

/*
** my_printf.c
*/

void    check_cmd(char cmd, va_list ap);
int	my_printf(char* argfixe, ...);

/*
** parser.c
*/

void	parse_s(va_list ap);
void	parse_c(va_list ap);
void	parse_i(va_list ap);
void	parse_o(va_list ap);
void	parse_e(va_list ap);

/*
** parser2.c
*/

void	parse_x(va_list ap);
void	parse_X(va_list ap);
void	parse_u(va_list ap);
void    parse_b(va_list ap);

/*
** parser3.c
*/

void    parse_f(va_list var);
char    my_arr(double decimal);
char    *my_itos(int integer, char* str);
char    *my_dts(double num, int afterPoint, char* dest);
char    *my_swap(char *src);

typedef struct s_cmd
{
  char cmd;
  void	(*f)(va_list ap);
}	t_cmd;