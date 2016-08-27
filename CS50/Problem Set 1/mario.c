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
    
    for (int i = 0; i <= (rows - 1); i++){
        int s = rows;    
        while (s > (i + 1)){
            printf(" ");
            s--;
        }    
   
        int height = 0; 
        for (height = 0; height < (i + 2); height++){
            printf("#");
        }
        printf("\n");
    }
    
}