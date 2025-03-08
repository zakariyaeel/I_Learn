import java.util.Scanner;
import java.lang.Math;
public class Numbers{
    public static void main(String[] args){
        Scanner newObj = new Scanner(System.in);
        while(true){
            System.out.println("Entrez un nombre entier : ");
            int num = newObj.nextInt();
            if(num >= 0){
                System.out.println("Num ==> " + num);
                System.out.println("les nombres inferieurs à " + num);
                for (int i = num; i >= 0; i--) {
                    if(!((i%2) == 0)) {
                        System.out.println(i + "^2  : " + (int) Math.pow(i, 2));
                    }
                }
                System.out.println("les nombres inferieurs à " + num + " et sont divisibles à 3");
                for (int i = num; i >= 0; i--){
                    if(i%3 == 0){
                        System.out.println(i + "^2  : " + i*i);
                    }
                }
                break;
            }else{
                System.out.println(num+" est negatif !!");
            }
        }
        newObj.close();
    }
}
