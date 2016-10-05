#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main(int argc, string argv[])  
{
  string name = GetString();
  
  if (islower (name[0])){
        char upper = toupper(name[0]);
        printf("%c", upper);
    }
    else {
        printf ("%c", name[0]);
        }
  
  for (int i= 1, n= strlen(name); i<n; i++){
    
    if (name[i] == ' '){
      if (islower (name[i+1])){
        char upper = toupper(name[i+1]);
        printf("%c", upper);
      }
      else {
        printf ("%c", name[i+1]);
      }
    }

  }
 
 printf("\n");
}
