package x404.kouldyeri.controller;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import x404.kouldyeri.util.DBConnection;

import java.io.File;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.time.LocalDate;

public class InscriptionController {

    @FXML private TextField nomField;
    @FXML private TextField emailField;
    @FXML private PasswordField passwordField;
    @FXML private DatePicker dateNaissancePicker;
    @FXML private ComboBox<String> regionComboBox;
    @FXML private ComboBox<String> roleComboBox;
    @FXML private Label messageLabel;
    @FXML private ImageView photoImageView;

    private String photoPath;

    @FXML
    public void initialize() {

        regionComboBox.getItems().addAll(
                "Ariana", "Béja", "Ben Arous", "Bizerte", "Gabès", "Gafsa",
                "Jendouba", "Kairouan", "Kasserine", "Kebili", "Kef", "Mahdia",
                "Manouba", "Medenine", "Monastir", "Nabeul", "Sfax",
                "Sidi Bouzid", "Siliana", "Sousse", "Tataouine",
                "Tozeur", "Tunis", "Zaghouan"
        );

        roleComboBox.getItems().addAll("user", "femmeVendeuse");
        roleComboBox.setValue("user");
    }

    // 📷 Upload photo
    @FXML
    private void choisirPhoto() {
        FileChooser chooser = new FileChooser();
        chooser.getExtensionFilters().add(
                new FileChooser.ExtensionFilter("Images", "*.png", "*.jpg", "*.jpeg")
        );

        File file = chooser.showOpenDialog(nomField.getScene().getWindow());
        if (file != null) {
            photoPath = file.getAbsolutePath();
            photoImageView.setImage(new Image(file.toURI().toString()));
        }
    }

    @FXML
    private void handleInscription() {

        String nom = nomField.getText();
        String email = emailField.getText();
        String password = passwordField.getText();
        LocalDate dateNaissance = dateNaissancePicker.getValue();
        String region = regionComboBox.getValue();
        String role = roleComboBox.getValue();

        if (nom.isEmpty() || email.isEmpty() || password.isEmpty()
                || dateNaissance == null || region == null || role == null) {
            messageLabel.setText("⚠️ Veuillez remplir tous les champs");
            return;
        }

        try (Connection conn = DBConnection.getConnection()) {

            String sql = """
                INSERT INTO utilisateur
                (nom, email, motDePasse, dateNaissance, region, role, photo)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            """;

            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, nom);
            pst.setString(2, email);
            pst.setString(3, password);
            pst.setDate(4, java.sql.Date.valueOf(dateNaissance));
            pst.setString(5, region);
            pst.setString(6, role.equals("femmeVendeuse") ? "admin" : "user");
            pst.setString(7, photoPath);

            pst.executeUpdate();
            messageLabel.setText("✅ Inscription réussie");

        } catch (Exception e) {
            messageLabel.setText("❌ Erreur lors de l'inscription");
            e.printStackTrace();
        }
    }

    @FXML
    private void retourLogin() {
        try {
            Parent root = FXMLLoader.load(
                    getClass().getResource("/x404/kouldyeri/view/LoginView.fxml"));
            Stage stage = (Stage) nomField.getScene().getWindow();
            stage.setScene(new Scene(root));
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
