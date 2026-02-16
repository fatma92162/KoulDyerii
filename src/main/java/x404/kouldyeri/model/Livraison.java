package x404.kouldyeri.model;

public class Livraison {
    private int idLivraison;
    private String adresse;
    private String statutLivraison;
    private int idCommande;

    public Livraison() {}

    public Livraison(String adresse, String statutLivraison, int idCommande) {
        this.adresse = adresse;
        this.statutLivraison = statutLivraison;
        this.idCommande = idCommande;
    }

    public Livraison(int idLivraison, String adresse, String statutLivraison, int idCommande) {
        this.idLivraison = idLivraison;
        this.adresse = adresse;
        this.statutLivraison = statutLivraison;
        this.idCommande = idCommande;
    }

    public int getIdLivraison() { return idLivraison; }
    public void setIdLivraison(int idLivraison) { this.idLivraison = idLivraison; }

    public String getAdresse() { return adresse; }
    public void setAdresse(String adresse) { this.adresse = adresse; }

    public String getStatutLivraison() { return statutLivraison; }
    public void setStatutLivraison(String statutLivraison) { this.statutLivraison = statutLivraison; }

    public int getIdCommande() { return idCommande; }
    public void setIdCommande(int idCommande) { this.idCommande = idCommande; }

    @Override
    public String toString() {
        return "Livraison{" +
                "idLivraison=" + idLivraison +
                ", adresse='" + adresse + '\'' +
                ", statutLivraison='" + statutLivraison + '\'' +
                ", idCommande=" + idCommande +
                '}';
    }
}
