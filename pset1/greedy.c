/**
 * greedy.c
 *
 * Rohit Nazareth
 *
 * asks user for amount owed, and prints minimum amount of coins required to pay amount
 */
 
#include <cs50.h>
#include <stdio.h>
#include <math.h>

int main()
{
   float dollars = 0.0;
 
 
  do  // propmpts user for amoutnt owed (in dollars)
  {
    printf("How much is owed? ");
    dollars = GetFloat(); 
  } 
  while (dollars < 0.0); // if input invalid, will repromt for amount owed
  
  // converts amount from dollars to cents
  float temp = dollars * 100.0;
  int cents = (int) round (temp); 
   
  // counts minimum coins neeed to pay the amount
  int coins = 0;
  int counter = cents;
  
  coins = counter / 25;
  counter = counter % 25;
  
  coins =  coins + (counter / 10);
  counter = counter % 10;
  
  coins = coins + (counter / 5);
  counter = counter % 5;
  
  coins = coins + (counter / 1);
  counter = counter % 1;
  
  printf ("%i\n", coins);

}
