package x404.kouldyeri.controller;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.KeyEvent;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import x404.kouldyeri.model.Utilisateur;
import x404.kouldyeri.util.DBConnection;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.time.LocalDate;
import java.util.ResourceBundle;

public class UtilisateurController implements Initializable {

    @FXML private TableView<Utilisateur> tableUtilisateurs;

    @FXML private TableColumn<Utilisateur, Integer> colId;
    @FXML private TableColumn<Utilisateur, String> colNom;
    @FXML private TableColumn<Utilisateur, String> colEmail;
    @FXML private TableColumn<Utilisateur, LocalDate> colDateNaissance;
    @FXML private TableColumn<Utilisateur, String> colRegion;
    @FXML private TableColumn<Utilisateur, String> colRole;
    @FXML private TableColumn<Utilisateur, Void> colActions;

    @FXML private Button btnAjouter;
    @FXML private Button btnDeconnexion;

    @FXML private TextField searchField;

    @FXML private Label lblProfileInitials;
    @FXML private Label lblHeaderProfileInitials;

    @FXML private Label lblTotalUsers;
    @FXML private Label lblTotalAdmins;
    @FXML private Label lblTotalRegular;

    // Popup Profil
    @FXML private StackPane overlayPane;
    @FXML private VBox profilePopup;

    @FXML private Label lblPopupInitials;
    @FXML private Label lblPopupNom;
    @FXML private Label lblPopupEmail;
    @FXML private Label lblPopupDateNaissance;
    @FXML private Label lblPopupRegion;
    @FXML private Label lblPopupRole;
    @FXML private Label lblPopupId;

    private final ObservableList<Utilisateur> listeUtilisateurs = FXCollections.observableArrayList();

    private static Utilisateur utilisateurConnecte;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        colId.setCellValueFactory(new PropertyValueFactory<>("idUtilisateur"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colEmail.setCellValueFactory(new PropertyValueFactory<>("email"));
        colDateNaissance.setCellValueFactory(new PropertyValueFactory<>("dateNaissance"));
        colRegion.setCellValueFactory(new PropertyValueFactory<>("region"));
        colRole.setCellValueFactory(new PropertyValueFactory<>("role"));

        configurerColonneActions();

        chargerUtilisateurs();
        updateStatistics();
        refreshInitials();
    }

    // ==========================
    // NAVIGATION
    // ==========================

    @FXML
    public void goLivraisons() {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/x404/kouldyeri/view/LivraisonView.fxml"));
            Stage stage = (Stage) btnDeconnexion.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Livraisons");
            stage.setMaximized(true);
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    public void goLivreurs() {
        try {
            // ⚠️ change le nom si ton fichier est différent
            Parent root = FXMLLoader.load(getClass().getResource("/x404/kouldyeri/view/LivreurView.fxml"));
            Stage stage = (Stage) btnDeconnexion.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Livreurs");
            stage.setMaximized(true);
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", e.getMessage());
            e.printStackTrace();
        }
    }

    // ==========================
    // TABLE ACTIONS
    // ==========================

    private void configurerColonneActions() {
        colActions.setCellFactory(param -> new TableCell<>() {
            private final Button btnModifier = new Button("✏️");
            private final Button btnSupprimer = new Button("🗑️");
            private final HBox pane = new HBox(10, btnModifier, btnSupprimer);

            {
                pane.setAlignment(Pos.CENTER);

                btnModifier.setStyle(
                        "-fx-background-color: white; " +
                                "-fx-text-fill: #1a1a1a; " +
                                "-fx-font-size: 16px; " +
                                "-fx-padding: 8 15; " +
                                "-fx-background-radius: 6; " +
                                "-fx-border-color: #CE1126; " +
                                "-fx-border-width: 2; " +
                                "-fx-cursor: hand;"
                );

                btnModifier.setOnMouseEntered(e -> btnModifier.setStyle(
                        "-fx-background-color: #CE1126; " +
                                "-fx-text-fill: white; " +
                                "-fx-font-size: 16px; " +
                                "-fx-padding: 8 15; " +
                                "-fx-background-radius: 6; " +
                                "-fx-border-color: #CE1126; " +
                                "-fx-border-width: 2; " +
                                "-fx-cursor: hand;"
                ));
                btnModifier.setOnMouseExited(e -> btnModifier.setStyle(
                        "-fx-background-color: white; " +
                                "-fx-text-fill: #1a1a1a; " +
                                "-fx-font-size: 16px; " +
                                "-fx-padding: 8 15; " +
                                "-fx-background-radius: 6; " +
                                "-fx-border-color: #CE1126; " +
                                "-fx-border-width: 2; " +
                                "-fx-cursor: hand;"
                ));

                btnSupprimer.setStyle(
                        "-fx-background-color: #CE1126; " +
                                "-fx-text-fill: white; " +
                                "-fx-font-size: 16px; " +
                                "-fx-padding: 8 15; " +
                                "-fx-background-radius: 6; " +
                                "-fx-cursor: hand;"
                );
                btnSupprimer.setOnMouseEntered(e -> btnSupprimer.setStyle(
                        "-fx-background-color: #8B0000; " +
                                "-fx-text-fill: white; " +
                                "-fx-font-size: 16px; " +
                                "-fx-padding: 8 15; " +
                                "-fx-background-radius: 6; " +
                                "-fx-cursor: hand;"
                ));
                btnSupprimer.setOnMouseExited(e -> btnSupprimer.setStyle(
                        "-fx-background-color: #CE1126; " +
                                "-fx-text-fill: white; " +
                                "-fx-font-size: 16px; " +
                                "-fx-padding: 8 15; " +
                                "-fx-background-radius: 6; " +
                                "-fx-cursor: hand;"
                ));

                btnModifier.setOnAction(event -> {
                    Utilisateur user = getTableView().getItems().get(getIndex());
                    handleModifierUtilisateur(user);
                });

                btnSupprimer.setOnAction(event -> {
                    Utilisateur user = getTableView().getItems().get(getIndex());
                    handleSupprimerUtilisateur(user);
                });
            }

            @Override
            protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);
                setGraphic(empty ? null : pane);
            }
        });
    }

    // ==========================
    // SEARCH / REFRESH
    // ==========================

    @FXML
    public void handleRechercher(KeyEvent event) {
        String recherche = searchField.getText().trim().toLowerCase();

        if (recherche.isEmpty()) {
            tableUtilisateurs.setItems(listeUtilisateurs);
            return;
        }

        ObservableList<Utilisateur> resultats = FXCollections.observableArrayList();
        for (Utilisateur user : listeUtilisateurs) {
            if ((user.getNom() != null && user.getNom().toLowerCase().contains(recherche)) ||
                    (user.getEmail() != null && user.getEmail().toLowerCase().contains(recherche)) ||
                    (user.getRegion() != null && user.getRegion().toLowerCase().contains(recherche)) ||
                    (user.getRole() != null && user.getRole().toLowerCase().contains(recherche))) {
                resultats.add(user);
            }
        }
        tableUtilisateurs.setItems(resultats);
    }

    @FXML
    public void handleActualiser() {
        chargerUtilisateurs();
        updateStatistics();
        searchField.clear();
        showAlert(Alert.AlertType.INFORMATION, "✅ Succès", "Liste actualisée!");
    }

    // ==========================
    // POPUP PROFIL
    // ==========================

    @FXML
    public void handleShowProfilePopup(MouseEvent event) {
        if (utilisateurConnecte == null) {
            showAlert(Alert.AlertType.WARNING, "Attention", "Aucun utilisateur connecté");
            return;
        }

        if (lblPopupInitials != null) lblPopupInitials.setText(getInitiales(utilisateurConnecte.getNom()));
        if (lblPopupNom != null) lblPopupNom.setText(utilisateurConnecte.getNom());
        if (lblPopupEmail != null) lblPopupEmail.setText(utilisateurConnecte.getEmail());
        if (lblPopupDateNaissance != null) {
            lblPopupDateNaissance.setText(utilisateurConnecte.getDateNaissance() != null
                    ? utilisateurConnecte.getDateNaissance().toString()
                    : "Non renseignée");
        }
        if (lblPopupRegion != null) lblPopupRegion.setText(utilisateurConnecte.getRegion());
        if (lblPopupRole != null) {
            String roleIcon = "admin".equalsIgnoreCase(utilisateurConnecte.getRole()) ? "👑" : "👤";
            lblPopupRole.setText(roleIcon + " " + utilisateurConnecte.getRole());
        }
        if (lblPopupId != null) lblPopupId.setText(String.valueOf(utilisateurConnecte.getIdUtilisateur()));

        if (overlayPane != null) overlayPane.setVisible(true);
    }

    @FXML
    public void handleShowProfile(MouseEvent event) {
        handleShowProfilePopup(event);
    }

    @FXML
    public void handleCloseProfilePopup() {
        if (overlayPane != null) overlayPane.setVisible(false);
    }

    @FXML
    public void consumeEvent(MouseEvent event) {
        event.consume();
    }

    @FXML
    public void handleModifierProfilFromPopup() {
        handleCloseProfilePopup();
        handleModifierProfil();
    }

    private void refreshInitials() {
        if (utilisateurConnecte != null) {
            String initiales = getInitiales(utilisateurConnecte.getNom());
            if (lblProfileInitials != null) lblProfileInitials.setText(initiales);
            if (lblHeaderProfileInitials != null) lblHeaderProfileInitials.setText(initiales);
        }
    }

    // ==========================
    // CRUD: AJOUT / MODIF / SUPPR
    // ==========================

    @FXML
    public void handleAjouter() {
        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("Ajouter un utilisateur");
        dialog.setHeaderText("Remplissez les informations du nouvel utilisateur");

        DialogPane dialogPane = dialog.getDialogPane();
        dialogPane.setStyle("-fx-background-color: white; -fx-padding: 20;");

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20, 150, 10, 10));

        TextField tfNom = new TextField();
        tfNom.setPromptText("Nom complet");
        TextField tfEmail = new TextField();
        tfEmail.setPromptText("Email");
        PasswordField tfMotDePasse = new PasswordField();
        tfMotDePasse.setPromptText("Mot de passe");
        TextField tfRegion = new TextField();
        tfRegion.setPromptText("Région");
        DatePicker dpDateNaissance = new DatePicker();
        dpDateNaissance.setPromptText("Date de naissance");
        ComboBox<String> cbRole = new ComboBox<>();
        cbRole.getItems().addAll("admin", "user");
        cbRole.setValue("user");

        String fieldStyle =
                "-fx-background-color: white; " +
                        "-fx-border-color: #CE1126; " +
                        "-fx-border-width: 2; " +
                        "-fx-border-radius: 5; " +
                        "-fx-padding: 8; " +
                        "-fx-font-size: 13px;";

        tfNom.setStyle(fieldStyle);
        tfEmail.setStyle(fieldStyle);
        tfMotDePasse.setStyle(fieldStyle);
        tfRegion.setStyle(fieldStyle);
        dpDateNaissance.setStyle(fieldStyle);
        cbRole.setStyle(fieldStyle);

        grid.add(new Label("Nom:"), 0, 0); grid.add(tfNom, 1, 0);
        grid.add(new Label("Email:"), 0, 1); grid.add(tfEmail, 1, 1);
        grid.add(new Label("Mot de passe:"), 0, 2); grid.add(tfMotDePasse, 1, 2);
        grid.add(new Label("Région:"), 0, 3); grid.add(tfRegion, 1, 3);
        grid.add(new Label("Date de naissance:"), 0, 4); grid.add(dpDateNaissance, 1, 4);
        grid.add(new Label("Rôle:"), 0, 5); grid.add(cbRole, 1, 5);

        dialogPane.setContent(grid);

        ButtonType btnAjouter = new ButtonType("Ajouter", ButtonBar.ButtonData.OK_DONE);
        ButtonType btnAnnuler = new ButtonType("Annuler", ButtonBar.ButtonData.CANCEL_CLOSE);
        dialogPane.getButtonTypes().addAll(btnAjouter, btnAnnuler);

        dialog.showAndWait().ifPresent(response -> {
            if (response == btnAjouter) {
                if (dpDateNaissance.getValue() == null) {
                    showAlert(Alert.AlertType.WARNING, "Attention", "Veuillez choisir une date de naissance");
                    return;
                }

                try (Connection conn = DBConnection.getConnection()) {
                    if (conn == null) {
                        showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                        return;
                    }

                    String query = "INSERT INTO utilisateur (nom, email, motDePasse, dateNaissance, region, role) VALUES (?, ?, ?, ?, ?, ?)";
                    try (PreparedStatement pst = conn.prepareStatement(query)) {
                        pst.setString(1, tfNom.getText());
                        pst.setString(2, tfEmail.getText());
                        pst.setString(3, tfMotDePasse.getText());
                        pst.setDate(4, java.sql.Date.valueOf(dpDateNaissance.getValue()));
                        pst.setString(5, tfRegion.getText());
                        pst.setString(6, cbRole.getValue());
                        pst.executeUpdate();
                    }

                    showAlert(Alert.AlertType.INFORMATION, "Succès", "Utilisateur ajouté avec succès!");
                    chargerUtilisateurs();

                } catch (Exception e) {
                    showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de l'ajout: " + e.getMessage());
                    e.printStackTrace();
                }
            }
        });
    }

    private void handleModifierUtilisateur(Utilisateur selected) {
        if (selected == null) {
            showAlert(Alert.AlertType.WARNING, "Attention", "Veuillez sélectionner un utilisateur");
            return;
        }

        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("Modifier l'utilisateur");
        dialog.setHeaderText("Modifier les informations de : " + selected.getNom());

        DialogPane dialogPane = dialog.getDialogPane();
        dialogPane.setStyle("-fx-background-color: white; -fx-padding: 20;");

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20, 150, 10, 10));

        TextField tfNom = new TextField(selected.getNom());
        TextField tfEmail = new TextField(selected.getEmail());
        TextField tfRegion = new TextField(selected.getRegion());
        DatePicker dpDateNaissance = new DatePicker(selected.getDateNaissance());
        ComboBox<String> cbRole = new ComboBox<>();
        cbRole.getItems().addAll("admin", "user");
        cbRole.setValue(selected.getRole());

        String fieldStyle =
                "-fx-background-color: white; " +
                        "-fx-border-color: #CE1126; " +
                        "-fx-border-width: 2; " +
                        "-fx-border-radius: 5; " +
                        "-fx-padding: 8; " +
                        "-fx-font-size: 13px;";

        tfNom.setStyle(fieldStyle);
        tfEmail.setStyle(fieldStyle);
        tfRegion.setStyle(fieldStyle);
        dpDateNaissance.setStyle(fieldStyle);
        cbRole.setStyle(fieldStyle);

        grid.add(new Label("Nom:"), 0, 0); grid.add(tfNom, 1, 0);
        grid.add(new Label("Email:"), 0, 1); grid.add(tfEmail, 1, 1);
        grid.add(new Label("Région:"), 0, 2); grid.add(tfRegion, 1, 2);
        grid.add(new Label("Date de naissance:"), 0, 3); grid.add(dpDateNaissance, 1, 3);
        grid.add(new Label("Rôle:"), 0, 4); grid.add(cbRole, 1, 4);

        dialogPane.setContent(grid);

        ButtonType btnSauvegarder = new ButtonType("Sauvegarder", ButtonBar.ButtonData.OK_DONE);
        ButtonType btnAnnuler = new ButtonType("Annuler", ButtonBar.ButtonData.CANCEL_CLOSE);
        dialogPane.getButtonTypes().addAll(btnSauvegarder, btnAnnuler);

        dialog.showAndWait().ifPresent(response -> {
            if (response == btnSauvegarder) {
                if (dpDateNaissance.getValue() == null) {
                    showAlert(Alert.AlertType.WARNING, "Attention", "Veuillez choisir une date de naissance");
                    return;
                }

                try (Connection conn = DBConnection.getConnection()) {
                    if (conn == null) {
                        showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                        return;
                    }

                    String query = "UPDATE utilisateur SET nom=?, email=?, region=?, dateNaissance=?, role=? WHERE idUtilisateur=?";
                    try (PreparedStatement pst = conn.prepareStatement(query)) {
                        pst.setString(1, tfNom.getText());
                        pst.setString(2, tfEmail.getText());
                        pst.setString(3, tfRegion.getText());
                        pst.setDate(4, java.sql.Date.valueOf(dpDateNaissance.getValue()));
                        pst.setString(5, cbRole.getValue());
                        pst.setInt(6, selected.getIdUtilisateur());
                        pst.executeUpdate();
                    }

                    showAlert(Alert.AlertType.INFORMATION, "Succès", "Utilisateur modifié avec succès!");
                    chargerUtilisateurs();

                } catch (Exception e) {
                    showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de la modification: " + e.getMessage());
                    e.printStackTrace();
                }
            }
        });
    }

    private void handleSupprimerUtilisateur(Utilisateur selected) {
        if (selected == null) {
            showAlert(Alert.AlertType.WARNING, "Attention", "Veuillez sélectionner un utilisateur");
            return;
        }

        if ("admin".equalsIgnoreCase(selected.getRole())) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de supprimer un administrateur!");
            return;
        }

        Alert confirmation = new Alert(Alert.AlertType.CONFIRMATION);
        confirmation.setTitle("Confirmation");
        confirmation.setHeaderText("Supprimer l'utilisateur");
        confirmation.setContentText("Voulez-vous vraiment supprimer " + selected.getNom() + " ?");

        if (confirmation.showAndWait().orElse(ButtonType.CANCEL) != ButtonType.OK) return;

        try (Connection conn = DBConnection.getConnection()) {
            if (conn == null) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                return;
            }

            String query = "DELETE FROM utilisateur WHERE idUtilisateur = ?";
            try (PreparedStatement pst = conn.prepareStatement(query)) {
                pst.setInt(1, selected.getIdUtilisateur());
                pst.executeUpdate();
            }

            chargerUtilisateurs();
            showAlert(Alert.AlertType.INFORMATION, "Succès", "Utilisateur supprimé avec succès!");

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur: " + e.getMessage());
            e.printStackTrace();
        }
    }

    // ==========================
    // PROFIL CONNECTÉ
    // ==========================

    public static void setUtilisateurConnecte(Utilisateur user) {
        utilisateurConnecte = user;
    }

    private String getInitiales(String nom) {
        if (nom == null || nom.isEmpty()) return "??";
        String[] parts = nom.trim().split("\\s+");
        if (parts.length >= 2) {
            return (parts[0].charAt(0) + "" + parts[1].charAt(0)).toUpperCase();
        }
        return nom.substring(0, Math.min(2, nom.length())).toUpperCase();
    }

    private void updateStatistics() {
        int total = listeUtilisateurs.size();
        int admins = 0;
        int regular = 0;

        for (Utilisateur user : listeUtilisateurs) {
            if ("admin".equalsIgnoreCase(user.getRole())) admins++;
            else regular++;
        }

        if (lblTotalUsers != null) lblTotalUsers.setText(String.valueOf(total));
        if (lblTotalAdmins != null) lblTotalAdmins.setText(String.valueOf(admins));
        if (lblTotalRegular != null) lblTotalRegular.setText(String.valueOf(regular));
    }

    @FXML
    public void handleModifierProfil() {
        if (utilisateurConnecte == null) {
            showAlert(Alert.AlertType.WARNING, "Attention", "Aucun utilisateur connecté");
            return;
        }

        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("Modifier mon profil");
        dialog.setHeaderText("Modifiez vos informations personnelles");

        DialogPane dialogPane = dialog.getDialogPane();
        dialogPane.setStyle("-fx-background-color: white; -fx-padding: 20;");

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20, 150, 10, 10));

        TextField tfNom = new TextField(utilisateurConnecte.getNom());
        TextField tfEmail = new TextField(utilisateurConnecte.getEmail());
        TextField tfRegion = new TextField(utilisateurConnecte.getRegion());
        DatePicker dpDateNaissance = new DatePicker(utilisateurConnecte.getDateNaissance());

        String fieldStyle =
                "-fx-background-color: white; " +
                        "-fx-border-color: #CE1126; " +
                        "-fx-border-width: 2; " +
                        "-fx-border-radius: 5; " +
                        "-fx-padding: 8; " +
                        "-fx-font-size: 13px;";

        tfNom.setStyle(fieldStyle);
        tfEmail.setStyle(fieldStyle);
        tfRegion.setStyle(fieldStyle);
        dpDateNaissance.setStyle(fieldStyle);

        grid.add(new Label("Nom:"), 0, 0); grid.add(tfNom, 1, 0);
        grid.add(new Label("Email:"), 0, 1); grid.add(tfEmail, 1, 1);
        grid.add(new Label("Région:"), 0, 2); grid.add(tfRegion, 1, 2);
        grid.add(new Label("Date de naissance:"), 0, 3); grid.add(dpDateNaissance, 1, 3);

        dialogPane.setContent(grid);

        ButtonType btnSauvegarder = new ButtonType("Sauvegarder", ButtonBar.ButtonData.OK_DONE);
        ButtonType btnAnnuler = new ButtonType("Annuler", ButtonBar.ButtonData.CANCEL_CLOSE);
        dialogPane.getButtonTypes().addAll(btnSauvegarder, btnAnnuler);

        dialog.showAndWait().ifPresent(response -> {
            if (response == btnSauvegarder) {
                if (dpDateNaissance.getValue() == null) {
                    showAlert(Alert.AlertType.WARNING, "Attention", "Veuillez choisir une date de naissance");
                    return;
                }

                utilisateurConnecte.setNom(tfNom.getText());
                utilisateurConnecte.setEmail(tfEmail.getText());
                utilisateurConnecte.setRegion(tfRegion.getText());
                utilisateurConnecte.setDateNaissance(dpDateNaissance.getValue());

                try (Connection conn = DBConnection.getConnection()) {
                    if (conn == null) {
                        showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                        return;
                    }

                    String query = "UPDATE utilisateur SET nom=?, email=?, region=?, dateNaissance=? WHERE idUtilisateur=?";
                    try (PreparedStatement pst = conn.prepareStatement(query)) {
                        pst.setString(1, utilisateurConnecte.getNom());
                        pst.setString(2, utilisateurConnecte.getEmail());
                        pst.setString(3, utilisateurConnecte.getRegion());
                        pst.setDate(4, java.sql.Date.valueOf(utilisateurConnecte.getDateNaissance()));
                        pst.setInt(5, utilisateurConnecte.getIdUtilisateur());
                        pst.executeUpdate();
                    }

                    refreshInitials();
                    showAlert(Alert.AlertType.INFORMATION, "Succès", "Profil mis à jour avec succès!");
                    chargerUtilisateurs();

                } catch (Exception e) {
                    showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de la mise à jour: " + e.getMessage());
                    e.printStackTrace();
                }
            }
        });
    }

    // ==========================
    // LOAD USERS
    // ==========================

    private void chargerUtilisateurs() {
        listeUtilisateurs.clear();

        try (Connection conn = DBConnection.getConnection()) {
            if (conn == null) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                return;
            }

            String query = "SELECT * FROM utilisateur ORDER BY idUtilisateur";
            try (PreparedStatement pst = conn.prepareStatement(query);
                 ResultSet rs = pst.executeQuery()) {

                while (rs.next()) {
                    java.sql.Date sqlDate = rs.getDate("dateNaissance");
                    LocalDate dateNaissance = (sqlDate != null) ? sqlDate.toLocalDate() : null;

                    Utilisateur user = new Utilisateur(
                            rs.getInt("idUtilisateur"),
                            rs.getString("nom"),
                            rs.getString("email"),
                            rs.getString("motDePasse"),
                            dateNaissance,
                            rs.getString("region"),
                            rs.getString("role")
                    );
                    listeUtilisateurs.add(user);
                }
            }

            tableUtilisateurs.setItems(listeUtilisateurs);
            updateStatistics();

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors du chargement: " + e.getMessage());
            e.printStackTrace();
        }
    }

    // ==========================
    // DECONNEXION
    // ==========================

    @FXML
    public void handleDeconnexion() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/x404/kouldyeri/view/LoginView.fxml"));
            Parent root = loader.load();

            Stage stage = (Stage) btnDeconnexion.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Connexion");
            stage.setMaximized(false);
            stage.centerOnScreen();

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de la déconnexion: " + e.getMessage());
            e.printStackTrace();
        }
    }

    // ==========================
    // UTILS
    // ==========================

    private void showAlert(Alert.AlertType type, String title, String message) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}
