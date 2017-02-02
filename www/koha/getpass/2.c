import java.io.*;
import java.lang.Math.*;


class S
{
    BufferedReader br= new BufferedReader(new InputStreamReader(System.in));
    private int n=0;
    
 
                   long []    Array;
                    long [] bi;
                   long [] output;
 
    int c=0;
    int largest=0;
    
    public void input()throws IOException
    {
         c=0;
        double x=0;
        int t=Integer.parseInt(br.readLine());
        if((1<=t)&&(t<=100))
        {
            for(int i=0;i<t;i++)
            {
              n= Integer.parseInt(br.readLine());
              Array=new long [n];
              bi=new long [n];
              output=new long [n];
             if((1<=n)&&(n<=Math.pow(10.0,5.0)))
                {
                   String line= br.readLine();
                   String [] numbers=line.split(" ");
                   for(String q:numbers)
                   {
                   x=Long.parseLong(q);
                      if((1<=x)&&(x<=Math.pow(10.0,18.0)))
                      {
                         
                          Array[c]=(long)x;
                          bb((long)x,c);
                          c++;
                      
                      
                      
                      }
                      else
                      {
                      System.exit(0);  
                      }
                   }
                
                
                }
            }
    
        }
    }
    
public void bb(long x,int i)
{
    
    int  count=0;
   String z=Long.toBinaryString(x);
   
   char [] b=z.toCharArray();
   for(char c:b)
   {
      if(c=='1')
        {
         count++;
        }
   
    
   }
    bi[i]=count;
    if(count>=largest)
        largest=count;
    
     
}


public void sort()
{
 int x=1;
    int z=0;
    while(x!=(largest+1))
        {
          for(int i=0;i<c;i++)
          {
          if(bi[i]==x)
            {
               output[z]=Array[i]; 
                z++;
            }
          
          }
          
          x++;  
    
        }
    

for(int i=0;i<z;i++)
{

System.out.print(output[i]+" ");


}

}

    
    
public static void main(String [] args)throws IOException
    {
       S obj= new S();
       obj.input();
       obj.sort();

    }   

}