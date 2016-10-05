/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>


#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    int lo = 0;
    int hi = n;
    int mid;
    
    while (lo <= hi) 
    {
      mid = lo + (hi-lo)/2;
      if (values[mid] == value) {
          return true;
      }
               
      else if (values[mid] < value) {
         lo = mid+1;
      }
      
      else if (values[mid] > value)
      {
         hi = mid-1;
      }
    }
   
    return false;
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    // bubble sort
    
    for (int i = 0; i < n; i++) {
        
        for (int j = 0; j < n-1; j++) {
            
            if (values[j] > values [j+1]) {
                
                int temp = values [j+1];
                values [j+1] = values [j];
                values [j] = temp;
            }
        }
    }
    
   return;
}