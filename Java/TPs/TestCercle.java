import java.util.Scanner;

class Cercle {
    private double x,y = 0;
    private double rayon, diamettre, surface;

    public Cercle(double rayon){
        this.rayon = rayon;
        this.diamettre = rayon *2;
        this.surface = Math.PI * this.diamettre;
    }

    public void setRayon(double rayon ) {
        this.rayon = rayon;
        this.diamettre = rayon *2;
        this.surface = Math.PI * this.diamettre;
    }

    public double getRayon() {
        return rayon;
    }

    public double getDiamettre() {
        return diamettre;
    }

    public double getSurface() {
        return surface;
    }

    public void deplacerCentre(double x, double y){
        this.x = x;
        this.y = y;
    }
    public  void afficherCentre(){
        System.out.println("le centre du cercle : \n x: " + this.x + " | y : "+ this.y);
    }
    public void afficherInfos(){
        System.out.println("Le rayon : " + this.getRayon() + ", | diamettre : " + this.getDiamettre() + " | surface : " + this.getSurface());
    }
}

public class TestCercle{
    public static void main(String[] args){
        Scanner info = new Scanner(System.in);
        System.out.println("Saisir la valeur du rayon : ");
        double rayon = info.nextDouble();

        Cercle newCer = new Cercle(rayon);
        newCer.afficherInfos();

        Cercle newCercd = new Cercle(newCer.getDiamettre());
        newCercd.setRayon(3);
        newCercd.afficherInfos();

        newCercd.deplacerCentre(2,2);
        newCercd.afficherCentre();
    }
}
