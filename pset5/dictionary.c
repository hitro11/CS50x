 /**
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 */

#include <stdbool.h>
#include <stdio.h>
#include <ctype.h>
#include <stdlib.h>
#include <string.h>
#include <math.h>

#include "dictionary.h"


// hashtable size
#define SIZE 1000000
#define MOD  50000

typedef struct node
{
    char word[LENGTH+1];
    struct node* next;
}
node;

node* hashtable[SIZE] = {NULL};


// hash function (Shift-Add-XOR hash from http://www.eternallyconfuzzled.com/tuts/algorithms/jsw_tut_hashing.aspx)
unsigned hash(const char* word)
{
    unsigned h = 0;
    int i;
    int len = strlen(word);

    for (i = 0; i < len; i++)
    {
        h ^= (h << 5) + (h >> 2) + word[i];
    }

    return h % SIZE;
}


int dictionarySize = 0;



/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char* word)
{
   
    char temp[LENGTH + 1];
    int len = strlen(word);
    
   // convert word to all lowercase
   for(int i = 0; i < len; i++)
    {
        temp[i] = tolower(word[i]);
    }
    temp[len] = '\0';
   
    int index = hash(temp);
    
    // word not in dictionary if node is empty.
    if (hashtable[index] == NULL)
    {
        return false;
    }
    
   node* cursor = hashtable[index];
   
   while (cursor != NULL)
    {
        if (strcmp (temp, cursor->word) == 0)
        {
                return true;
        }
            
        cursor = cursor->next;
    }
    
    return false;
}



/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    FILE* fp = fopen(dictionary, "r");
   
    if (fp == NULL)
    {
        return false;
    }
    
   char temp[LENGTH+1]; // temp array to store word before copying to node
    
    while (fscanf(fp, "%s", temp) != EOF)
    {
        dictionarySize++;
        node* newNode = malloc(sizeof(node));
        strcpy(newNode->word, temp); // copies word to node
        
        int index = hash(temp);
        
       // copies word to hashtable if spot is not occupied
        if (hashtable[index] == NULL)
        {
            hashtable[index] = newNode;
            newNode->next = NULL;
        }
        
       // else append to linked list
        else 
        {
            newNode->next = hashtable[index];
            hashtable[index] = newNode;
        }
    }
        
    fclose(fp);
    return true;
}    
    

    

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    if (dictionarySize > 0)
    {
        return dictionarySize;
    }
    
    return 0;
}




/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
   int i = 0;
   while (i < SIZE)
    {
       // don't need to free empty node.
       if (hashtable[i] == NULL)
       {
           i++;
       }
       
       // traverse through linked list and free all nodes.
       else
       {
           while(hashtable[i] != NULL)
                {
                    node* temp = hashtable[i];
                    hashtable[i] = temp->next;
                    free(temp);
                }
            
            i++;
        }
    }
    
    return true;
}