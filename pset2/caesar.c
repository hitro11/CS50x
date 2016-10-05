#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

/**
 * caesar.c
 *
 * Rohit Nazareth
 * 
 * Program uses caesar's cipher with a user inputed key value
 * to ecnrypt user inputed plaintext. 
 * 
 */

void cipher_print(char lrt, int key, int index);

int main(int argc, string argv[])  
{
 if (argc != 2 )
  {
    printf("\n");
    return 1;
  }
  
  int key = atoi ( argv[1] ) % 26;
  string text = GetString();
    
    for (int i = 0, n = strlen(text); i < n; i++) 
    {
      if ( isalpha (text[i]))
        {
          
          if ( isupper (text[i])) 
            {
              cipher_print(text[i], key, 65);           
            } 
       
          if ( islower (text[i]))
            {
              cipher_print(text[i], key, 97);    
            }   
        } 
        else 
        { 
      
              printf("%c",text[i]);
          
             }
      
       }   
    
  printf("\n");   
}

void cipher_print (char ltr, int key, int index)
{ 
  
  ltr -= index;
  ltr = (ltr + key) % 26;   
  ltr += index;
  printf("%c", ltr);      
}
