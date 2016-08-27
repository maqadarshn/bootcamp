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
    int l = 0;
    int r = n - 1;
    
    while(l <= r)
    {
        int mid = l + ((r-l)/2);
        if (value == values[mid])
            return true;
        else if (value < values[mid])
            r = mid -1;
        else if (value > values[mid])  
            l = mid + 1;   
    }
    
    return false;  
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    // TODO: implement an O(n^2) sorting algorithm
    for(int j=0;j<n;j++){
       for (int i = j; i < n; i++) {
           if (values[i] < values[j]) {
               int temp = values[j];
               values[j] = values[i];
               values[i] = temp;
           }
       }
    } 
    return;
}