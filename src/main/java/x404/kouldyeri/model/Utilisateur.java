package x404.kouldyeri.model;

import java.time.LocalDate;

public class Utilisateur {
    private int idUtilisateur;
    private String nom;
    private String email;
    private String motDePasse;
    private LocalDate dateNaissance;
    private String region;
    private String role;

    // ✅ Constructeur vide (OBLIGATOIRE pour JavaFX TableView)
    public Utilisateur() {
    }

    // Constructeur complet
    public Utilisateur(int idUtilisateur, String nom, String email, String motDePasse,
                       LocalDate dateNaissance, String region, String role) {
        this.idUtilisateur = idUtilisateur;
        this.nom = nom;
        this.email = email;
        this.motDePasse = motDePasse;
        this.dateNaissance = dateNaissance;
        this.region = region;
        this.role = role;
    }

    // Constructeur sans ID (pour insertion)
    public Utilisateur(String nom, String email, String motDePasse,
                       LocalDate dateNaissance, String region, String role) {
        this.nom = nom;
        this.email = email;
        this.motDePasse = motDePasse;
        this.dateNaissance = dateNaissance;
        this.region = region;
        this.role = role;
    }

    // Getters et Setters
    public int getIdUtilisateur() {
        return idUtilisateur;
    }

    public void setIdUtilisateur(int idUtilisateur) {
        this.idUtilisateur = idUtilisateur;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getMotDePasse() {
        return motDePasse;
    }

    public void setMotDePasse(String motDePasse) {
        this.motDePasse = motDePasse;
    }

    public LocalDate getDateNaissance() {
        return dateNaissance;
    }

    public void setDateNaissance(LocalDate dateNaissance) {
        this.dateNaissance = dateNaissance;
    }

    public String getRegion() {
        return region;
    }

    public void setRegion(String region) {
        this.region = region;
    }

    public String getRole() {
        return role;
    }

    public void setRole(String role) {
        this.role = role;
    }

    @Override
    public String toString() {
        return nom + " (" + email + ")";
    }
}