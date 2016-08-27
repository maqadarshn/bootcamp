#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <ctype.h>

int main(int argc, string argv[])
{
  string plaintext,keyword;
  int j;
  if (argc != 2){
    printf("Usage: ./vigenere something\n");
    return 1;
  }

  for (int i = 0; i < strlen(argv[1]); i++){
    if (isalpha(argv[1][i]) == 0){
      printf("String is empty\n");
      return 1;
    }
  }
  
  keyword = argv[1];  
  plaintext = GetString();
  j = 0;

  for (int i = 0, n = strlen(plaintext); i < n; i++)
  {
    j = j % strlen(keyword);
    if (isalpha(plaintext[i])){
      if (islower(plaintext[i]) && islower(keyword[j]))
        printf("%c", (((plaintext[i] - 97) + (keyword[j] - 97)) % 26) + 97);
      else if (isupper(plaintext[i]) && islower(keyword[j]))
        printf("%c", (((plaintext[i] - 65) + (keyword[j] - 97)) % 26) + 65);
      else if (islower(plaintext[i]) && isupper(keyword[j]))
        printf("%c", (((plaintext[i] - 97) + (keyword[j] - 65)) % 26) + 97);
      else if (isupper(plaintext[i]) && isupper(keyword[j]))
        printf("%c", (((plaintext[i] - 65) + (keyword[j] - 65)) % 26) + 65);
      j++;
    }
    else{
      printf("%c", plaintext[i]);
    }
  }   
  printf("\n");
}