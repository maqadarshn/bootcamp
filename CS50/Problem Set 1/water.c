#include <stdio.h>
#include <cs50.h>

int main(void)
{
    int minutes, bottles;
    printf("minutes: ");
    minutes = GetInt();
    bottles = minutes*12;
    printf("bottles: %d \n", bottles);
}
