/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a sc
 */

#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>
#include <string.h>


int main(int argc, char* argv[])
{
    
    // opens CF card file
    FILE* cf = fopen("card.raw", "r");
    
     if (cf == NULL)
    {
        printf("Could not open cf card");
        return 2;
    }
    
    
   uint8_t buffer[512]; // creates 512 byte buffer to read into
   int jcount = 0;
   char title[8]; // char array for sprintf
   int open = 0;
   FILE* img;
    
    
    while ((fread(buffer, 512, 1, cf)) > 0) 
    {
        
        
        // checks for jpg signature
        if (buffer[0] == 0xff & buffer[1] == 0xd8 & buffer[2] == 0xff  & buffer[3] == 0xe0 || buffer[0] == 0xff & buffer[1] == 0xd8 & buffer[2] == 0xff  & buffer[3] == 0xe1)
        {
            
            sprintf(title, "%03d.jpg", jcount);
            
            if (open == 0)
            {
                img = fopen(title, "w");
                fwrite (buffer, sizeof(buffer), 1, img);
                open = 1;
                
            }
            
            if (open == 1)
            {
                fclose(img);
                fopen(title, "w");
                fwrite (buffer, sizeof(buffer), 1, img);
                jcount++;
                
            }
            
        
        }
        
        else
        {
            // writes to file (if it's open)
            
            if (open == 1)
            {
                 fwrite (buffer, sizeof(buffer), 1, img);
            }
            
        }
       
        
    }
    
    if (img)
    {
        fclose(img);
    }
    
    fclose(cf);
    return 0;
}


