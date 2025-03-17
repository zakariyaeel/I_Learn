public class Main {
    public static void main(String[] args) {
        // 1. Ajouter une voiture (1, "Dacia")
        Voiture dacia = new Voiture(1, "Dacia");
        
        // 2. Ajouter un conducteur (1, "ALAMI", "jaouad")
        Conducteur jaouad = new Conducteur(1, "ALAMI", "jaouad");
        
        // 3. Associer le conducteur à la voiture "Dacia"
        dacia.setConducteur(jaouad);
        jaouad.setVoiture(dacia);
        
        // 4. Récupérer la marque de la voiture conduite par "jaouad"
        System.out.println("Marque de la voiture conduite par jaouad : " + jaouad.getVoiture().getMarque());
        
        // 5. Vérifier si l'objet conducteur a comme voiture "Dacia"
        System.out.println("La voiture de jaouad est-elle une Dacia ? " + 
            (jaouad.getVoiture() != null && jaouad.getVoiture().getMarque().equals("Dacia")));
        
        // 6. Ajouter une voiture (2, "Citroen")
        Voiture citroen = new Voiture(2, "Citroen");
        
        // 7. Associer la voiture au conducteur "jaouad"
        citroen.setConducteur(jaouad);
        jaouad.setVoiture(citroen);
        
        // 8. Afficher la voiture conduite par "jaouad"
        System.out.println("Voiture conduite par jaouad : " + jaouad.getVoiture().getMarque());
        
        // 9. Afficher le conducteur de la voiture "Citroen"
        System.out.println("Conducteur de la Citroen : " + citroen.getConducteur().getNom());
        
        // 10. Ajouter un conducteur (2, "TALBI", "youssef")
        Conducteur youssef = new Conducteur(2, "TALBI", "youssef");
        
        // 11. Associer la voiture au conducteur "youssef"
        citroen.setConducteur(youssef);
        youssef.setVoiture(citroen);
        
        // 12. Afficher la voiture conduite par "youssef"
        System.out.println("Voiture conduite par youssef : " + youssef.getVoiture().getMarque());
    }
}
