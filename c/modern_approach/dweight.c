#include <stdio.h>
#define INCHES_PRE_POUND 166

int main(int argc, char const *argv[])
{
    int height, length, width, volume, weight;
    // height = 8;
    // length = 12;
    // width = 10;
    printf("Enter height of box:");
    scanf("%d:", &height);
    printf("Enter width of box:");
    scanf("%d:", &width);
    printf("Enter length of box:");
    scanf("%d:", &length);

    volume = height * length * width;
    weight = (volume + INCHES_PRE_POUND - 1) / INCHES_PRE_POUND;

    printf("Dimensions:%Dx%dx%d\n", length, width, height);
    printf("Volume (cubic inches):%d\n", volume);
    printf("Dimensional weight (pounds):%d\n", weight);

    return 0;
}
