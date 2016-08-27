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
#include <stdlib.h>
#include <string.h>
#include <strings.h>
#include <ctype.h>

#include "dictionary.h"

typedef struct node
{
    char *word;
    struct node* next;
}node;

int count = 0;
char word[LENGTH + 1];

//For each character a hashtable
#define HASHTABLE 27
node *hashtable[HASHTABLE];

int hash(const char* word)
{
   int index = 0;
   for (int i = 0; word[i] != '\0'; i++)
       index += tolower(word[i]);
   return index % HASHTABLE;
}

/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char* word)
{
    node* p = malloc(sizeof(node));
    int num = hash(word);
    p = hashtable[num];
    while (p != NULL){
        if (strcasecmp(p->word, word) == 0)
            return true;
        p = p->next;
    }
    return false;
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    FILE* f = fopen(dictionary, "r");
    if (f == NULL)
        return false;

    while (fscanf(f, "%s\n", word) != EOF){
        node *n = malloc(sizeof(node));
        n->word = malloc(strlen(word) + 1);
        strcpy(n->word, word);
        int hashed = hash(word);
        if (hashtable[hashed] == NULL){
            hashtable[hashed] = n;
            n->next = NULL;
        }
        else{
            n->next = hashtable[hashed];
            hashtable[hashed] = n;
        }
        count++;
    }
    fclose(f);
    return true;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    return count;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    for (int i = 0; i < HASHTABLE; i++)
    {
        node *p;
        p = hashtable[i];
        while (p){
            node* tmp = p;
            p = p->next;
            free(tmp);
            return true;
        }
        hashtable[i] = NULL;
    }
    return false;
}
