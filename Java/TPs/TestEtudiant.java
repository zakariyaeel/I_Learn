class Etudiant {
    private String nom, prenom, cne;
    int numExam;
    private static int nbrEtds = 0;
    double note1, note2, note3;
    boolean inscritModule1, inscritModule2, inscritModule3;

    public Etudiant(String nom){
        this.nom = nom;
        this.numExam = ++nbrEtds;
    }
    public Etudiant(String nom,String prenom){
        this(nom);
        this.prenom = prenom;
    }
    public Etudiant(String nom, String prenom, String cne){
        this(nom, prenom);
        this.cne = cne;
    }
    public void setInscription(boolean in1, boolean in2, boolean in3){
        this.inscritModule1 = in1;
        this.inscritModule2 = in2;
        this.inscritModule3 = in3;
    }
    public static int getNbrEtds(){
        return nbrEtds;
    }
    public double moyenne(){
        int count =0;
        double sum = 0;
        if(inscritModule1){
            count++;
            sum += note1;
        }
        if (inscritModule2) {
            count++;
            sum += note2;
        }
        if(inscritModule3){
            count++;
            sum += note3;
        }
        return  count > 0? sum / count:0;
    }
    public String mention(){
        if(inscritModule1 && inscritModule2 && inscritModule3) {
            double moy = moyenne();
            if(moy >= 16) return "très bien";
            if(moy >= 14) return "Bien";
            if(moy >= 12) return "Assez bien";
            if(moy >= 10) return "Passable";
            return  "échec";
        }else{
            return "Etudiant non inscrit dans 3 modules.";
        }
    }
}

public class TestEtudiant {
    public static void main(String[] args){
        Etudiant etd1 = new Etudiant("yassine");
        Etudiant etd2 = new Etudiant("barik","hafidi");
        Etudiant etd3 = new Etudiant("yassmine","folane","CD004712");

        // Ex5
        Etudiant etd4 = new Etudiant("yassmine","folane","CD004712");

        etd1.setInscription(true,true,true);

        etd2.setInscription(true,true,false);

        etd3.setInscription(true,false,true);

        etd1.note1 = 10.00;
        etd1.note2 = 15.00;
        etd1.note3 = 14.92;

        System.out.println(etd1 .mention());
        System.out.println(Etudiant.getNbrEtds());
    }
}
