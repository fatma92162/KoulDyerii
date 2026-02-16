package x404.kouldyeri.model;

public class Livreur {
    private int idLivreur;
    private String nom;
    private String prenom;
    private String telephone;
    private boolean disponibilite;

    public Livreur() {}

    public Livreur(String nom, String prenom, String telephone, boolean disponibilite) {
        this.nom = nom;
        this.prenom = prenom;
        this.telephone = telephone;
        this.disponibilite = disponibilite;
    }

    public Livreur(int idLivreur, String nom, String prenom, String telephone, boolean disponibilite) {
        this.idLivreur = idLivreur;
        this.nom = nom;
        this.prenom = prenom;
        this.telephone = telephone;
        this.disponibilite = disponibilite;
    }

    public int getIdLivreur() { return idLivreur; }
    public void setIdLivreur(int idLivreur) { this.idLivreur = idLivreur; }

    public String getNom() { return nom; }
    public void setNom(String nom) { this.nom = nom; }

    public String getPrenom() { return prenom; }
    public void setPrenom(String prenom) { this.prenom = prenom; }

    public String getTelephone() { return telephone; }
    public void setTelephone(String telephone) { this.telephone = telephone; }

    public boolean isDisponibilite() { return disponibilite; }
    public void setDisponibilite(boolean disponibilite) { this.disponibilite = disponibilite; }

    // utile pour ComboBox dans Livraison
    @Override
    public String toString() {
        return idLivreur + " - " + nom + " " + prenom;
    }
}
