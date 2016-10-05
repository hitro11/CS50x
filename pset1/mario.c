/**
 * mario.c
 *
 * Rohit Nazareth
 * 
 * prints to screen a right-alligned, half pyramid of hashes, with
 * height (betwen 0 & 23) determined by user
 */

#include <cs50.h>
#include <stdio.h>

int main()
{
  int h = 0;
 
 
  do  // propmpts user for height
  {
    printf("Height: ");
    h = GetInt(); 
  } 
  while ( h < 0 || h > 23); // if input invalid, will repromt for height
 
  for (int i = h; i > 0; i--) 
  { 
    for (int k = 1; k < i; k++) // prints appropriate number of spaces
    {
      printf (" ");
    }
  
      for (int j = h ; j > i-2; j--) // prints appropriate number of hashes
        {
          printf("#");
        }
  
             printf("\n");
      
   }
}   
