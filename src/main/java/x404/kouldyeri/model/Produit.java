package x404.kouldyeri.model;

import javafx.scene.image.Image;

import java.io.ByteArrayInputStream;

public class Produit {
    private int idProduit;
    private String nom;
    private String description;
    private double prix;
    private boolean disponible;
    private byte[] photo; // Store image as byte array

    public Produit(int idProduit, String nom, String description, double prix, boolean disponible, byte[] photo) {
        this.idProduit = idProduit;
        this.nom = nom;
        this.description = description;
        this.prix = prix;
        this.disponible = disponible;
        this.photo = photo;
    }

    // Getters and Setters
    public int getIdProduit() {
        return idProduit;
    }

    public void setIdProduit(int idProduit) {
        this.idProduit = idProduit;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public double getPrix() {
        return prix;
    }

    public void setPrix(double prix) {
        this.prix = prix;
    }

    public boolean isDisponible() {
        return disponible;
    }

    public void setDisponible(boolean disponible) {
        this.disponible = disponible;
    }

    public byte[] getPhoto() {
        return photo;
    }

    public void setPhoto(byte[] photo) {
        this.photo = photo;
    }

    // Convert byte array photo to Image for displaying in the UI
    public Image getPhotoImage() {
        return (photo != null) ? new Image(new ByteArrayInputStream(photo)) : null;
    }
}
