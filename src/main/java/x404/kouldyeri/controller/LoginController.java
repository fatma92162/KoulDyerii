package x404.kouldyeri.controller;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import x404.kouldyeri.model.Utilisateur;
import x404.kouldyeri.util.DBConnection;

import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.time.LocalDate;

public class LoginController {

    @FXML
    private TextField emailField;

    @FXML
    private PasswordField passwordField;

    @FXML
    private Label messageLabel;

    @FXML
    private Button loginButton;

    @FXML
    public void handleLogin() {
        String email = emailField.getText().trim();
        String password = passwordField.getText();

        if (email.isEmpty() || password.isEmpty()) {
            messageLabel.setText("Veuillez remplir tous les champs ⚠️");
            messageLabel.setStyle("-fx-text-fill: orange;");
            return;
        }

        try {
            Connection conn = DBConnection.getConnection();
            String query = "SELECT * FROM utilisateur WHERE email = ? AND motDePasse = ?";
            PreparedStatement pst = conn.prepareStatement(query);
            pst.setString(1, email);
            pst.setString(2, password);

            ResultSet rs = pst.executeQuery();

            if (rs.next()) {
                String role = rs.getString("role");

                if ("admin".equalsIgnoreCase(role)) {
                    java.sql.Date sqlDate = rs.getDate("dateNaissance");
                    LocalDate dateNaissance = (sqlDate != null) ? sqlDate.toLocalDate() : null;

                    Utilisateur userConnecte = new Utilisateur(
                            rs.getInt("idUtilisateur"),
                            rs.getString("nom"),
                            rs.getString("email"),
                            rs.getString("motDePasse"),
                            dateNaissance,
                            rs.getString("region"),
                            rs.getString("role")
                    );

                    // Passer l'utilisateur au contrôleur suivant
                    UtilisateurController.setUtilisateurConnecte(userConnecte);

                    messageLabel.setText("Connexion réussie ✅");
                    messageLabel.setStyle("-fx-text-fill: green;");
                    openUtilisateurView();
                } else {
                    messageLabel.setText("Accès refusé - Réservé aux administrateurs ⛔");
                    messageLabel.setStyle("-fx-text-fill: orange;");
                }
            } else {
                messageLabel.setText("Email ou mot de passe incorrect ❌");
                messageLabel.setStyle("-fx-text-fill: red;");
            }

            rs.close();
            pst.close();

        } catch (Exception e) {
            messageLabel.setText("Erreur de connexion ❌");
            messageLabel.setStyle("-fx-text-fill: red;");
            e.printStackTrace();
        }
    }

    private void openUtilisateurView() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/x404/kouldyeri/view/UtilisateurView.fxml")
            );
            Parent root = loader.load();

            Scene scene = new Scene(root);
            Stage currentStage = (Stage) loginButton.getScene().getWindow();

            Stage newStage = new Stage();
            newStage.setTitle("KoulDyeri - Gestion des Utilisateurs");
            newStage.setScene(scene);
            newStage.setMaximized(true);
            newStage.show();

            currentStage.close();

        } catch (IOException e) {
            messageLabel.setText("Erreur lors du chargement ❌");
            messageLabel.setStyle("-fx-text-fill: red;");
            e.printStackTrace();
        }
    }

    @FXML
    private void openInscriptionView() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/x404/kouldyeri/view/InscriptionView.fxml")
            );
            Parent root = loader.load();

            Scene scene = new Scene(root);
            Stage currentStage = (Stage) loginButton.getScene().getWindow();

            Stage newStage = new Stage();
            newStage.setTitle("KoulDyeri - Inscription");
            newStage.setScene(scene);
            newStage.setMaximized(false);
            newStage.show();

            currentStage.close();

        } catch (IOException e) {
            messageLabel.setText("Erreur lors du chargement de l'inscription ❌");
            messageLabel.setStyle("-fx-text-fill: red;");
            e.printStackTrace();
        }
    }
}
