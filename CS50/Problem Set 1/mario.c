#include <stdio.h>
#include <cs50.h>

int main(void)  
{
    int rows; 

    do {
        printf("Height: "); 
        rows = GetInt();
    }  
    while ((rows < 0) || (rows > 23));
    
    for (int i = 0; i < rows; i++){
        for( int j=rows; j>(i+1); j--)
            printf(" ");
        for(int j=0; j<(i+2); j++)
            printf("#");
        printf("\n");
    }
    
}
