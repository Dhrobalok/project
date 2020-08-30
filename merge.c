<<<<<<< HEAD
#include<stdio.h>

int i,j=0,k=0,l,m,u=0;
int a[20],b[20],c[20],n;

int merge1(int *j)
{

     printf("Enter The merge value\n");

while(k<=*j)
  {
   //printf("Enter The merge value");
   scanf("%d",&a[k]);
   k++;
  }

m = *j/2;
printf("the middle value:%d \t",m);


for(int f=0;f<m;f++)
{
 for(int g=f+1;g<=m;g++)
 {

   if(a[f]<=a[g])
   {
      l=a[g];
      a[g]=a[f];
      a[f]=l;

   }
   else
   {
     l=a[f];
     a[g]=a[f];
     a[f]=l;
   }


 }

}


for(int e=m+1;e<*j;e++)
{
  for(int f=e+1;f<=*j;f++)
  {

     if(a[e]<=a[f])
     {
        l=a[f];
        a[f]=a[e];
        a[e]=l;

     }
     else
     {
        l=a[e];
        a[f]=a[f];
        a[e]=l;
     }


  }

}
/*finaly merge here */


for(int f=0;f<*j;f++)
{
 for(int g=f+1;g<=*j;g++)
 {

   if(a[f]<=a[g])
   {
      l=a[g];
      a[g]=a[f];
      a[f]=l;

   }
   else
   {
     l=a[f];
     a[g]=a[g];
     a[f]=l;
   }

 }
}
printf("\n merge value :\n");
for(int s=0;s<=*j;s++)
{
  printf("%d->",a[s]);
}



}


int main()
{
  printf("Enter the merging value:");
  scanf("%d",&i);
  merge1(&i);
  return 0;

  //divide();

}
=======
printf("bhvhvb\n");
>>>>>>> branchA
