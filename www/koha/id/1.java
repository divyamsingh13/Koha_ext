import java.io.*;
import java.lang.Math.*;
class t
{
public static void main(String [] args)throws IOException
{
    int v=0;
    long sum=0;
    
BufferedReader br= new BufferedReader(new InputStreamReader(System.in));
int t=Integer.parseInt(br.readLine());
    
    if((1<=t)&&(t<=100000))
    {
    for(int i=0;i<t;i++)
    {
        long n=Long.parseLong(br.readLine());
        if((1<=n)&&(n<=Math.pow(10.0,18.0)))
            {
             for(long j=0;j<=n;j++)
             {
                 v=0;
                 
              String z=Long.toBinaryString(j);
              char [] xxx=z.toCharArray();
              for(char c:xxx)
              {
                if(c=='1')
                 {
                  v++;
                 }
              }
              if(v==2)
              {
              sum=(sum+j)%(1000000007);
              
              }
                 
             
             }
                
            
            System.out.println(sum);
            }
    }
    
    }

}

}