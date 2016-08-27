/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>
#include <string.h>

int main(void)
{
    FILE* f = fopen("card.raw", "r");	
	if(f == NULL){	
		fclose(f);
		fprintf(stderr, "Error opening file.\n");
		return 1;
	}

	uint8_t checkjpg1[4] = {0xff, 0xd8, 0xff, 0xe0};
	uint8_t checkjpg2[4] = {0xff, 0xd8, 0xff, 0xe1};
  
	int imgfile = 0;
    int open = 0;
	FILE* out;

	uint8_t buffer[512];
	uint8_t check[4];
	fread(buffer, 512, 1, f);	
    char filename[8];

	while(fread(buffer, 512, 1, f) > 0)
	{
		for(int i = 0; i < 4; i++)
			check[i] = buffer[i];
        
		if((memcmp(checkjpg1, check, 4) == 0 ) || (memcmp(checkjpg2, check, sizeof(check)) == 0)){
			sprintf(filename, "%03d.jpg", imgfile);
			if(!open){
				out = fopen(filename, "w");
				fwrite(buffer, sizeof(buffer), 1, out);
				open = 1;
			}
			if(open){
				fclose(out);
				out = fopen(filename, "w");
				fwrite(buffer, sizeof(buffer), 1, out);
				imgfile++;
			}
		}
		else{
			if(open)
				fwrite(buffer, sizeof(buffer), 1, out);
		}
	}
    
    if(out)
        fclose(out);
    fclose(f);
    return 0;
}