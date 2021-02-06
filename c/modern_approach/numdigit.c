#include <stdio.h>

int main(int argc, char const *argv[])
{
    int digit = 0, n;
    printf("Enter a nonneegative interger:");
    scanf("%d", &n);

    do
    {
        n /= 10;
        digit++;
    } while (n > 0);

    printf("THe number has %d digit(s) . \n", digit);
    return 0;
}
