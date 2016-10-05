#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

/**
 * vigenere.c
 *
 * Rohit Nazareth
 * 
 * Program uses vigenere's cipher with a user inputted key word
 * to ecnrypt user inputted plaintext. 
 * 
 */


int main(int argc, string argv[])  
{
 
 if (argc != 2 )
  {
    printf("\n");
    return 1;
  }
 
 // checks if all character in keyword are alphabets and converts any uppercases to lowercase.
 int keyLen = strlen(argv[1]);
 for (int i = 0; i < keyLen; i++)
 
 {
   if (isalpha (argv[1][i]) == false)
   {
     printf("\n");
     return 1;
   }
  
   if (isupper(argv[1][i]))
   {
     argv[1][i] = tolower(argv[1][i]); 
   }
 }
 
 string txt = GetString();
  
 // ciphers plaintext
 int p = strlen(txt);
 int j = 0;
 
 for (int i = 0; i < p; i++)
 {
    if (isalpha (txt[i]))
    { 
      j = j % keyLen;
      argv[1][j] -= 97;
      
      if (islower (txt[i]))
      {
        txt[i] -= 97;
        txt[i] = (txt[i] + argv[1][j]) % 26;   
        txt[i] += 97;
        printf("%c",  txt[i]);
        
      }
      
      if (isupper (txt[i]))
      {
        txt[i] -= 65;
        txt[i] = (txt[i] + argv[1][j]) % 26;   
        txt[i] += 65;
        printf("%c",  txt[i]);
        
      }
    
    argv[1][j] += 97;
    j++;
    
    }
      
    else 
    {
      printf("%c", txt[i]);
    }
    
 }
    
 printf("\n");
 return 0;
}


