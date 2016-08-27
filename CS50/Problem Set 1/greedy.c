#include <stdio.h>
#include <cs50.h>
#include <math.h>

int main(void)
{
    float f;
    int n,q,r,d,s,ni,p,total;
    
    do {
        printf("O hai! How much changed is owed?\n");  
        f = GetFloat();
    }while (f <= 0);
    
    n = (round(f * 100));
    q = (n / 25);
    r = (n % 25);
    d = (r / 10);
    s = (r % 10);
    ni = (s / 5);
    p = (s % 5);
    total = (q + d + ni + p);
    
    printf("%d\n", total);
}