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

    @FXML
    private TableView<Utilisateur> tableUtilisateurs;

    @FXML
    private TableColumn<Utilisateur, Integer> colId;

    @FXML
    private TableColumn<Utilisateur, String> colNom;

    @FXML
    private TableColumn<Utilisateur, String> colEmail;

    @FXML
    private TableColumn<Utilisateur, LocalDate> colDateNaissance;

    @FXML
    private TableColumn<Utilisateur, String> colRegion;

    @FXML
    private TableColumn<Utilisateur, String> colRole;

    @FXML
    private TableColumn<Utilisateur, Void> colActions;

    @FXML
    private Button btnAjouter;

    @FXML
    private Button btnDeconnexion;

    @FXML
    private TextField searchField;

    @FXML
    private Label lblProfileInitials;

    @FXML
    private Label lblTotalUsers;

    @FXML
    private Label lblTotalAdmins;

    @FXML
    private Label lblTotalRegular;

    // Vues principales
    @FXML
    private VBox mainView;

    // Popup Profil
    @FXML
    private StackPane overlayPane;
    @FXML
    private void goProduits() {
        switchTo("/x404/kouldyeri/view/ProduitView.fxml", "Produits");
    }
    @FXML
    private void goCommandes() {
        switchTo("/x404/kouldyeri/view/commandeview.fxml", "Commandes");
    }




    private void switchTo(String fxml, String title) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource(fxml));
            Stage stage = (Stage) tableUtilisateurs.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - " + title);
            stage.setMaximized(true); // To maximize the window when opening the new scene
            stage.show();
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Navigation: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    private VBox profilePopup;

    @FXML
    private Label lblHeaderProfileInitials;

    @FXML
    private Label lblPopupInitials;

    @FXML
    private Label lblPopupNom;

    @FXML
    private Label lblPopupEmail;

    @FXML
    private Label lblPopupDateNaissance;

    @FXML
    private Label lblPopupRegion;

    @FXML
    private Label lblPopupRole;

    @FXML
    private Label lblPopupId;

    private ObservableList<Utilisateur> listeUtilisateurs = FXCollections.observableArrayList();

    private static Utilisateur utilisateurConnecte;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        colId.setCellValueFactory(new PropertyValueFactory<>("idUtilisateur"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colEmail.setCellValueFactory(new PropertyValueFactory<>("email"));
        colDateNaissance.setCellValueFactory(new PropertyValueFactory<>("dateNaissance"));
        colRegion.setCellValueFactory(new PropertyValueFactory<>("region"));
        colRole.setCellValueFactory(new PropertyValueFactory<>("role"));

        // Configuration de la colonne Actions avec les boutons
        configurerColonneActions();

        chargerUtilisateurs();
        updateStatistics();

        if (utilisateurConnecte != null) {
            String initiales = getInitiales(utilisateurConnecte.getNom());
            if (lblProfileInitials != null) {
                lblProfileInitials.setText(initiales);
            }
            if (lblHeaderProfileInitials != null) {
                lblHeaderProfileInitials.setText(initiales);
            }
        }
    }

    private void configurerColonneActions() {
        colActions.setCellFactory(param -> new TableCell<>() {
            private final Button btnModifier = new Button("✏️");
            private final Button btnSupprimer = new Button("🗑️");
            private final HBox pane = new HBox(10, btnModifier, btnSupprimer);

            {
                pane.setAlignment(Pos.CENTER);

                // Style du bouton Modifier
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

                // Effet hover pour le bouton Modifier
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

                // Style du bouton Supprimer
                btnSupprimer.setStyle(
                        "-fx-background-color: #CE1126; " +
                                "-fx-text-fill: white; " +
                                "-fx-font-size: 16px; " +
                                "-fx-padding: 8 15; " +
                                "-fx-background-radius: 6; " +
                                "-fx-cursor: hand;"
                );

                // Effet hover pour le bouton Supprimer
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

                // Actions des boutons
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

    // Gestion du popup profil
    @FXML
    public void handleShowProfilePopup(MouseEvent event) {
        if (utilisateurConnecte == null) {
            showAlert(Alert.AlertType.WARNING, "Attention", "Aucun utilisateur connecté");
            return;
        }

        // Remplir les informations du popup
        if (lblPopupInitials != null) {
            lblPopupInitials.setText(getInitiales(utilisateurConnecte.getNom()));
        }
        if (lblPopupNom != null) {
            lblPopupNom.setText(utilisateurConnecte.getNom());
        }
        if (lblPopupEmail != null) {
            lblPopupEmail.setText(utilisateurConnecte.getEmail());
        }
        if (lblPopupDateNaissance != null) {
            lblPopupDateNaissance.setText(utilisateurConnecte.getDateNaissance() != null ?
                    utilisateurConnecte.getDateNaissance().toString() : "Non renseignée");
        }
        if (lblPopupRegion != null) {
            lblPopupRegion.setText(utilisateurConnecte.getRegion());
        }
        if (lblPopupRole != null) {
            String roleIcon = "admin".equalsIgnoreCase(utilisateurConnecte.getRole()) ? "👑" : "👤";
            lblPopupRole.setText(roleIcon + " " + utilisateurConnecte.getRole());
        }
        if (lblPopupId != null) {
            lblPopupId.setText(String.valueOf(utilisateurConnecte.getIdUtilisateur()));
        }

        // Afficher le popup
        if (overlayPane != null) {
            overlayPane.setVisible(true);
        }
    }

    @FXML
    public void handleCloseProfilePopup() {
        if (overlayPane != null) {
            overlayPane.setVisible(false);
        }
    }

    @FXML
    public void consumeEvent(MouseEvent event) {
        event.consume(); // Empêche la fermeture quand on clique sur la card
    }

    @FXML
    public void handleModifierProfilFromPopup() {
        handleCloseProfilePopup();
        handleModifierProfil();
    }

    @FXML
    public void handleShowProfile(MouseEvent event) {
        // Cette méthode peut rester vide ou rediriger vers le popup
        handleShowProfilePopup(event);
    }

    private void handleModifierUtilisateur(Utilisateur selected) {
        if (selected == null) {
            showAlert(Alert.AlertType.WARNING, "Attention", "Veuillez sélectionner un utilisateur");
            return;
        }

        // Créer un dialogue de modification
        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("Modifier l'utilisateur");
        dialog.setHeaderText("Modifier les informations de : " + selected.getNom());

        // Appliquer le style au dialogue
        DialogPane dialogPane = dialog.getDialogPane();
        dialogPane.setStyle(
                "-fx-background-color: white; " +
                        "-fx-padding: 20;"
        );

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

        // Style pour les labels
        Label lblNom = new Label("Nom:");
        lblNom.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblEmail = new Label("Email:");
        lblEmail.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblRegion = new Label("Région:");
        lblRegion.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblDate = new Label("Date de naissance:");
        lblDate.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblRole = new Label("Rôle:");
        lblRole.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");

        // Style pour les champs
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

        grid.add(lblNom, 0, 0);
        grid.add(tfNom, 1, 0);
        grid.add(lblEmail, 0, 1);
        grid.add(tfEmail, 1, 1);
        grid.add(lblRegion, 0, 2);
        grid.add(tfRegion, 1, 2);
        grid.add(lblDate, 0, 3);
        grid.add(dpDateNaissance, 1, 3);
        grid.add(lblRole, 0, 4);
        grid.add(cbRole, 1, 4);

        dialog.getDialogPane().setContent(grid);

        ButtonType btnSauvegarder = new ButtonType("Sauvegarder", ButtonBar.ButtonData.OK_DONE);
        ButtonType btnAnnuler = new ButtonType("Annuler", ButtonBar.ButtonData.CANCEL_CLOSE);
        dialog.getDialogPane().getButtonTypes().addAll(btnSauvegarder, btnAnnuler);

        // Style pour les boutons
        dialog.setOnShowing(e -> {
            Button saveButton = (Button) dialogPane.lookupButton(btnSauvegarder);
            Button cancelButton = (Button) dialogPane.lookupButton(btnAnnuler);

            if (saveButton != null) {
                saveButton.setStyle(
                        "-fx-background-color: linear-gradient(to right, #CE1126, #8B0000); " +
                                "-fx-text-fill: white; " +
                                "-fx-font-size: 14px; " +
                                "-fx-font-weight: bold; " +
                                "-fx-padding: 10 25; " +
                                "-fx-background-radius: 8; " +
                                "-fx-cursor: hand;"
                );
            }

            if (cancelButton != null) {
                cancelButton.setStyle(
                        "-fx-background-color: white; " +
                                "-fx-text-fill: #1a1a1a; " +
                                "-fx-font-size: 14px; " +
                                "-fx-font-weight: bold; " +
                                "-fx-padding: 10 25; " +
                                "-fx-background-radius: 8; " +
                                "-fx-border-color: #CE1126; " +
                                "-fx-border-width: 2; " +
                                "-fx-cursor: hand;"
                );
            }
        });

        dialog.showAndWait().ifPresent(response -> {
            if (response == btnSauvegarder) {
                try {
                    Connection conn = DBConnection.getConnection();
                    if (conn == null) {
                        showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                        return;
                    }

                    String query = "UPDATE utilisateur SET nom=?, email=?, region=?, dateNaissance=?, role=? WHERE idUtilisateur=?";
                    PreparedStatement pst = conn.prepareStatement(query);
                    pst.setString(1, tfNom.getText());
                    pst.setString(2, tfEmail.getText());
                    pst.setString(3, tfRegion.getText());
                    pst.setDate(4, java.sql.Date.valueOf(dpDateNaissance.getValue()));
                    pst.setString(5, cbRole.getValue());
                    pst.setInt(6, selected.getIdUtilisateur());

                    pst.executeUpdate();
                    pst.close();
                    conn.close();

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

        // Style personnalisé pour l'alerte de confirmation
        DialogPane confirmPane = confirmation.getDialogPane();
        confirmPane.setStyle("-fx-background-color: white;");

        confirmation.setOnShowing(e -> {
            Button okButton = (Button) confirmPane.lookupButton(ButtonType.OK);
            Button cancelButton = (Button) confirmPane.lookupButton(ButtonType.CANCEL);

            if (okButton != null) {
                okButton.setStyle(
                        "-fx-background-color: #CE1126; " +
                                "-fx-text-fill: white; " +
                                "-fx-font-weight: bold; " +
                                "-fx-padding: 10 25; " +
                                "-fx-background-radius: 8;"
                );
            }

            if (cancelButton != null) {
                cancelButton.setStyle(
                        "-fx-background-color: white; " +
                                "-fx-text-fill: #1a1a1a; " +
                                "-fx-font-weight: bold; " +
                                "-fx-padding: 10 25; " +
                                "-fx-background-radius: 8; " +
                                "-fx-border-color: #CE1126; " +
                                "-fx-border-width: 2;"
                );
            }
        });

        if (confirmation.showAndWait().get() == ButtonType.OK) {
            try {
                Connection conn = DBConnection.getConnection();

                if (conn == null) {
                    showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                    return;
                }

                String query = "DELETE FROM utilisateur WHERE idUtilisateur = ?";
                PreparedStatement pst = conn.prepareStatement(query);
                pst.setInt(1, selected.getIdUtilisateur());
                pst.executeUpdate();
                pst.close();
                conn.close();

                chargerUtilisateurs();
                showAlert(Alert.AlertType.INFORMATION, "Succès", "Utilisateur supprimé avec succès!");

            } catch (Exception e) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur: " + e.getMessage());
                e.printStackTrace();
            }
        }
    }

    public static void setUtilisateurConnecte(Utilisateur user) {
        utilisateurConnecte = user;
    }

    private String getInitiales(String nom) {
        if (nom == null || nom.isEmpty()) return "??";
        String[] parts = nom.split(" ");
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
            if ("admin".equalsIgnoreCase(user.getRole())) {
                admins++;
            } else {
                regular++;
            }
        }

        if (lblTotalUsers != null) lblTotalUsers.setText(String.valueOf(total));
        if (lblTotalAdmins != null) lblTotalAdmins.setText(String.valueOf(admins));
        if (lblTotalRegular != null) lblTotalRegular.setText(String.valueOf(regular));
    }

    @FXML
    public void handleModifierProfil() {
        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("Modifier mon profil");
        dialog.setHeaderText("Modifiez vos informations personnelles");

        // Appliquer le style au dialogue
        DialogPane dialogPane = dialog.getDialogPane();
        dialogPane.setStyle(
                "-fx-background-color: white; " +
                        "-fx-padding: 20;"
        );

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20, 150, 10, 10));

        TextField tfNom = new TextField(utilisateurConnecte.getNom());
        TextField tfEmail = new TextField(utilisateurConnecte.getEmail());
        TextField tfRegion = new TextField(utilisateurConnecte.getRegion());
        DatePicker dpDateNaissance = new DatePicker(utilisateurConnecte.getDateNaissance());

        // Style pour les labels
        Label lblNom = new Label("Nom:");
        lblNom.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblEmail = new Label("Email:");
        lblEmail.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblRegion = new Label("Région:");
        lblRegion.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblDate = new Label("Date de naissance:");
        lblDate.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");

        // Style pour les champs
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

        grid.add(lblNom, 0, 0);
        grid.add(tfNom, 1, 0);
        grid.add(lblEmail, 0, 1);
        grid.add(tfEmail, 1, 1);
        grid.add(lblRegion, 0, 2);
        grid.add(tfRegion, 1, 2);
        grid.add(lblDate, 0, 3);
        grid.add(dpDateNaissance, 1, 3);

        dialog.getDialogPane().setContent(grid);

        ButtonType btnSauvegarder = new ButtonType("Sauvegarder", ButtonBar.ButtonData.OK_DONE);
        ButtonType btnAnnuler = new ButtonType("Annuler", ButtonBar.ButtonData.CANCEL_CLOSE);
        dialog.getDialogPane().getButtonTypes().addAll(btnSauvegarder, btnAnnuler);

        // Style pour les boutons
        dialog.setOnShowing(e -> {
            Button saveButton = (Button) dialogPane.lookupButton(btnSauvegarder);
            Button cancelButton = (Button) dialogPane.lookupButton(btnAnnuler);

            if (saveButton != null) {
                saveButton.setStyle(
                        "-fx-background-color: linear-gradient(to right, #CE1126, #8B0000); " +
                                "-fx-text-fill: white; " +
                                "-fx-font-size: 14px; " +
                                "-fx-font-weight: bold; " +
                                "-fx-padding: 10 25; " +
                                "-fx-background-radius: 8; " +
                                "-fx-cursor: hand;"
                );
            }

            if (cancelButton != null) {
                cancelButton.setStyle(
                        "-fx-background-color: white; " +
                                "-fx-text-fill: #1a1a1a; " +
                                "-fx-font-size: 14px; " +
                                "-fx-font-weight: bold; " +
                                "-fx-padding: 10 25; " +
                                "-fx-background-radius: 8; " +
                                "-fx-border-color: #CE1126; " +
                                "-fx-border-width: 2; " +
                                "-fx-cursor: hand;"
                );
            }
        });

        dialog.showAndWait().ifPresent(response -> {
            if (response == btnSauvegarder) {
                utilisateurConnecte.setNom(tfNom.getText());
                utilisateurConnecte.setEmail(tfEmail.getText());
                utilisateurConnecte.setRegion(tfRegion.getText());
                utilisateurConnecte.setDateNaissance(dpDateNaissance.getValue());

                try {
                    Connection conn = DBConnection.getConnection();
                    if (conn == null) {
                        showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                        return;
                    }

                    String query = "UPDATE utilisateur SET nom=?, email=?, region=?, dateNaissance=? WHERE idUtilisateur=?";
                    PreparedStatement pst = conn.prepareStatement(query);
                    pst.setString(1, utilisateurConnecte.getNom());
                    pst.setString(2, utilisateurConnecte.getEmail());
                    pst.setString(3, utilisateurConnecte.getRegion());
                    pst.setDate(4, java.sql.Date.valueOf(utilisateurConnecte.getDateNaissance()));
                    pst.setInt(5, utilisateurConnecte.getIdUtilisateur());

                    pst.executeUpdate();
                    pst.close();
                    conn.close();

                    // Mettre à jour tous les labels
                    if (lblProfileInitials != null) {
                        lblProfileInitials.setText(getInitiales(utilisateurConnecte.getNom()));
                    }
                    if (lblHeaderProfileInitials != null) {
                        lblHeaderProfileInitials.setText(getInitiales(utilisateurConnecte.getNom()));
                    }

                    showAlert(Alert.AlertType.INFORMATION, "Succès", "Profil mis à jour avec succès!");
                    chargerUtilisateurs();

                } catch (Exception e) {
                    showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de la mise à jour: " + e.getMessage());
                    e.printStackTrace();
                }
            }
        });
    }

    private void chargerUtilisateurs() {
        listeUtilisateurs.clear();

        try {
            Connection conn = DBConnection.getConnection();

            if (conn == null) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                return;
            }

            String query = "SELECT * FROM utilisateur ORDER BY idUtilisateur";
            PreparedStatement pst = conn.prepareStatement(query);
            ResultSet rs = pst.executeQuery();

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

            tableUtilisateurs.setItems(listeUtilisateurs);
            updateStatistics();

            rs.close();
            pst.close();
            conn.close();

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors du chargement: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    public void handleActualiser() {
        chargerUtilisateurs();
        updateStatistics();
        searchField.clear();
        showAlert(Alert.AlertType.INFORMATION, "✅ Succès", "Liste actualisée!");
    }

    @FXML
    public void handleAjouter() {
        // Créer un dialogue pour ajouter un utilisateur
        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("Ajouter un utilisateur");
        dialog.setHeaderText("Remplissez les informations du nouvel utilisateur");

        // Appliquer le style au dialogue
        DialogPane dialogPane = dialog.getDialogPane();
        dialogPane.setStyle(
                "-fx-background-color: white; " +
                        "-fx-padding: 20;"
        );

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

        // Style pour les labels
        Label lblNom = new Label("Nom:");
        lblNom.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblEmail = new Label("Email:");
        lblEmail.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblMdp = new Label("Mot de passe:");
        lblMdp.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblRegion = new Label("Région:");
        lblRegion.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblDate = new Label("Date de naissance:");
        lblDate.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");
        Label lblRole = new Label("Rôle:");
        lblRole.setStyle("-fx-text-fill: #1a1a1a; -fx-font-weight: bold;");

        // Style pour les champs
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

        grid.add(lblNom, 0, 0);
        grid.add(tfNom, 1, 0);
        grid.add(lblEmail, 0, 1);
        grid.add(tfEmail, 1, 1);
        grid.add(lblMdp, 0, 2);
        grid.add(tfMotDePasse, 1, 2);
        grid.add(lblRegion, 0, 3);
        grid.add(tfRegion, 1, 3);
        grid.add(lblDate, 0, 4);
        grid.add(dpDateNaissance, 1, 4);
        grid.add(lblRole, 0, 5);
        grid.add(cbRole, 1, 5);

        dialog.getDialogPane().setContent(grid);

        ButtonType btnAjouter = new ButtonType("Ajouter", ButtonBar.ButtonData.OK_DONE);
        ButtonType btnAnnuler = new ButtonType("Annuler", ButtonBar.ButtonData.CANCEL_CLOSE);
        dialog.getDialogPane().getButtonTypes().addAll(btnAjouter, btnAnnuler);

        // Style pour les boutons
        dialog.setOnShowing(e -> {
            Button addButton = (Button) dialogPane.lookupButton(btnAjouter);
            Button cancelButton = (Button) dialogPane.lookupButton(btnAnnuler);

            if (addButton != null) {
                addButton.setStyle(
                        "-fx-background-color: linear-gradient(to right, #CE1126, #8B0000); " +
                                "-fx-text-fill: white; " +
                                "-fx-font-size: 14px; " +
                                "-fx-font-weight: bold; " +
                                "-fx-padding: 10 25; " +
                                "-fx-background-radius: 8; " +
                                "-fx-cursor: hand;"
                );
            }

            if (cancelButton != null) {
                cancelButton.setStyle(
                        "-fx-background-color: white; " +
                                "-fx-text-fill: #1a1a1a; " +
                                "-fx-font-size: 14px; " +
                                "-fx-font-weight: bold; " +
                                "-fx-padding: 10 25; " +
                                "-fx-background-radius: 8; " +
                                "-fx-border-color: #CE1126; " +
                                "-fx-border-width: 2; " +
                                "-fx-cursor: hand;"
                );
            }
        });

        dialog.showAndWait().ifPresent(response -> {
            if (response == btnAjouter) {
                try {
                    Connection conn = DBConnection.getConnection();
                    if (conn == null) {
                        showAlert(Alert.AlertType.ERROR, "Erreur", "Impossible de se connecter à la base de données");
                        return;
                    }

                    String query = "INSERT INTO utilisateur (nom, email, motDePasse, dateNaissance, region, role) VALUES (?, ?, ?, ?, ?, ?)";
                    PreparedStatement pst = conn.prepareStatement(query);
                    pst.setString(1, tfNom.getText());
                    pst.setString(2, tfEmail.getText());
                    pst.setString(3, tfMotDePasse.getText());
                    pst.setDate(4, java.sql.Date.valueOf(dpDateNaissance.getValue()));
                    pst.setString(5, tfRegion.getText());
                    pst.setString(6, cbRole.getValue());

                    pst.executeUpdate();
                    pst.close();
                    conn.close();

                    showAlert(Alert.AlertType.INFORMATION, "Succès", "Utilisateur ajouté avec succès!");
                    chargerUtilisateurs();

                } catch (Exception e) {
                    showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de l'ajout: " + e.getMessage());
                    e.printStackTrace();
                }
            }
        });
    }

    @FXML
    public void handleModifier() {
        Utilisateur selected = tableUtilisateurs.getSelectionModel().getSelectedItem();
        handleModifierUtilisateur(selected);
    }

    @FXML
    public void handleSupprimer() {
        Utilisateur selected = tableUtilisateurs.getSelectionModel().getSelectedItem();
        handleSupprimerUtilisateur(selected);
    }

    @FXML
    public void handleRechercher() {
        String recherche = searchField.getText().trim().toLowerCase();

        if (recherche.isEmpty()) {
            chargerUtilisateurs();
            return;
        }

        ObservableList<Utilisateur> resultats = FXCollections.observableArrayList();

        for (Utilisateur user : listeUtilisateurs) {
            if (user.getNom().toLowerCase().contains(recherche) ||
                    user.getEmail().toLowerCase().contains(recherche) ||
                    user.getRegion().toLowerCase().contains(recherche) ||
                    user.getRole().toLowerCase().contains(recherche)) {
                resultats.add(user);
            }
        }

        tableUtilisateurs.setItems(resultats);
    }

    @FXML
    public void handleDeconnexion() {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/x404/kouldyeri/view/LoginView.fxml")
            );
            Parent root = loader.load();

            Stage stage = (Stage) btnDeconnexion.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Connexion");
            stage.setMaximized(false);
            stage.centerOnScreen();

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Erreur lors de la déconnexion");
            e.printStackTrace();
        }
    }

    private void showAlert(Alert.AlertType type, String title, String message) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);

        // Appliquer le style personnalisé aux alertes
        DialogPane alertPane = alert.getDialogPane();
        alertPane.setStyle("-fx-background-color: white;");

        alert.setOnShowing(e -> {
            for (ButtonType buttonType : alert.getButtonTypes()) {
                Button button = (Button) alertPane.lookupButton(buttonType);
                if (button != null) {
                    if (buttonType == ButtonType.OK || buttonType.getButtonData() == ButtonBar.ButtonData.OK_DONE) {
                        button.setStyle(
                                "-fx-background-color: linear-gradient(to right, #CE1126, #8B0000); " +
                                        "-fx-text-fill: white; " +
                                        "-fx-font-weight: bold; " +
                                        "-fx-padding: 10 25; " +
                                        "-fx-background-radius: 8;"
                        );
                    } else {
                        button.setStyle(
                                "-fx-background-color: white; " +
                                        "-fx-text-fill: #1a1a1a; " +
                                        "-fx-font-weight: bold; " +
                                        "-fx-padding: 10 25; " +
                                        "-fx-background-radius: 8; " +
                                        "-fx-border-color: #CE1126; " +
                                        "-fx-border-width: 2;"
                        );
                    }
                }
            }
        });

        alert.showAndWait();
    }
}