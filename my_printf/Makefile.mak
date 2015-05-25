##
## Makefile for my_printf in /home/hassan_j/Projet my_printf
## 
## Made by HASSANI Jawad
## Login   <hassan_j@etna-alternance.net>
## 
## Started on  Tue Mar  3 09:38:55 2015 HASSANI Jawad
## Last update Fri Mar  6 18:06:54 2015 HASSANI Jawad
##

SNAME	=	libmy_printf_`uname -m`-`uname -s`.a

DNAME	=	libmy_printf_`uname -m`-`uname -s`.so

CC	=	gcc

AR	=       ar r

LIB     =       ranlib

SRC	=	my_printf.c	\
		functions.c	\
		parser.c	\
		parser2.c	\
		parser3.c

OBJ	=	$(SRC:%.c=%.o)

RM	=	rm -f

CFLAGS	=	-W -Wall -Werror -pedantic


all:			my_printf_static \
			my_printf_dynamic

my_printf_static:	$(OBJ)
			$(AR) $(SNAME) $(OBJ)
			$(LIB) $(SNAME)

my_printf_dynamic:	$(OBJ)
			$(CC) -c $(CFLAGS) -fpic $(SRC)
			$(CC) -shared -o $(DNAME) $(OBJ)

clean:
			$(RM) $(OBJ) *~

fclean:			clean
			$(RM) $(NAME)
			$(RM) $(SNAME)
			$(RM) $(DNAME)

re:			fclean all