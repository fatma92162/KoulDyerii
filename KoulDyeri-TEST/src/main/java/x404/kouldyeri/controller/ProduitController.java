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
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import x404.kouldyeri.model.Produit;
import x404.kouldyeri.util.DBConnection;

import java.io.File;
import java.net.URL;
import java.nio.file.Files;
import java.sql.*;
import java.util.ResourceBundle;

public class ProduitController implements Initializable {

    @FXML private TableView<Produit> tableProduits;
    @FXML private TableColumn<Produit, Integer> colId;
    @FXML private TableColumn<Produit, String> colNom;
    @FXML private TableColumn<Produit, String> colDescription;
    @FXML private TableColumn<Produit, Double> colPrix;

    // ✅ Au lieu de stock, on utilise disponible
    @FXML private TableColumn<Produit, Boolean> colDisponible;

    @FXML private TableColumn<Produit, Void> colActions;
    @FXML private TableColumn<Produit, Void> colPhoto;

    @FXML private TextField searchField;

    private final ObservableList<Produit> listeProduits = FXCollections.observableArrayList();

    @Override
    public void initialize(URL url, ResourceBundle rb) {

        colId.setCellValueFactory(new PropertyValueFactory<>("idProduit"));
        colNom.setCellValueFactory(new PropertyValueFactory<>("nom"));
        colDescription.setCellValueFactory(new PropertyValueFactory<>("description"));
        colPrix.setCellValueFactory(new PropertyValueFactory<>("prix"));
        colDisponible.setCellValueFactory(new PropertyValueFactory<>("disponible"));

        configurerColonneDisponible();
        configurerColonnePhoto();
        configurerColonneActions();

        chargerProduits();
    }

    // ---------------- NAVIGATION ----------------
    @FXML private void goUsers() {
        switchTo("/x404/kouldyeri/view/UtilisateurView.fxml", "Utilisateurs");
    }

    @FXML private void goCommandes() {
        switchTo("/x404/kouldyeri/view/CommandeView.fxml", "Commandes");
    }

    @FXML private void handleDeconnexion() {
        switchTo("/x404/kouldyeri/view/LoginView.fxml", "Connexion");
    }

    private void switchTo(String fxml, String title) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource(fxml));
            Stage stage = (Stage) tableProduits.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - " + title);
            stage.setMaximized(true);
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Navigation: " + e.getMessage());
            e.printStackTrace();
        }
    }

    // ---------------- TABLE COLUMNS ----------------

    // ✅ Afficher ✅ / ❌ pour disponible
    private void configurerColonneDisponible() {
        colDisponible.setCellFactory(col -> new TableCell<>() {
            @Override
            protected void updateItem(Boolean dispo, boolean empty) {
                super.updateItem(dispo, empty);
                if (empty) {
                    setText(null);
                    return;
                }
                setAlignment(Pos.CENTER);
                setText(Boolean.TRUE.equals(dispo) ? "✅ Oui" : "❌ Non");
            }
        });
    }

    private void configurerColonnePhoto() {
        colPhoto.setCellFactory(param -> new TableCell<>() {
            private final ImageView iv = new ImageView();

            {
                iv.setFitWidth(55);
                iv.setFitHeight(55);
                iv.setPreserveRatio(true);
                iv.setSmooth(true);
            }

            @Override
            protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);

                if (empty) {
                    setGraphic(null);
                    return;
                }

                Produit p = getTableView().getItems().get(getIndex());
                Image img = p.getPhotoImage();

                if (img == null) {
                    Label dash = new Label("—");
                    dash.setStyle("-fx-text-fill: #999;");
                    setGraphic(dash);
                } else {
                    iv.setImage(img);
                    setGraphic(iv);
                }
                setAlignment(Pos.CENTER);
            }
        });
    }

    private void configurerColonneActions() {
        colActions.setCellFactory(param -> new TableCell<>() {
            private final Button btnEdit = new Button("✏️");
            private final Button btnDel = new Button("🗑️");
            private final HBox box = new HBox(10, btnEdit, btnDel);

            {
                box.setAlignment(Pos.CENTER);

                // même vibe que Utilisateur
                btnEdit.setStyle(
                        "-fx-background-color: white; " +
                                "-fx-border-color: #CE1126; -fx-border-width: 2; " +
                                "-fx-text-fill: #1a1a1a; -fx-font-size: 16px; " +
                                "-fx-padding: 8 15; -fx-background-radius: 6; " +
                                "-fx-cursor: hand;"
                );

                btnDel.setStyle(
                        "-fx-background-color: #CE1126; " +
                                "-fx-text-fill: white; -fx-font-size: 16px; " +
                                "-fx-padding: 8 15; -fx-background-radius: 6; " +
                                "-fx-cursor: hand;"
                );

                btnEdit.setOnAction(e -> modifierProduit(getTableView().getItems().get(getIndex())));
                btnDel.setOnAction(e -> supprimerProduit(getTableView().getItems().get(getIndex())));
            }

            @Override
            protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);
                setGraphic(empty ? null : box);
            }
        });
    }

    // ---------------- CRUD ----------------
    private void chargerProduits() {
        listeProduits.clear();

        // ✅ On sélectionne EXACTEMENT les colonnes qui existent
        String sql = "SELECT idProduit, nom, description, prix, disponible, photo FROM produit";

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                byte[] photo = rs.getBytes("photo");

                Produit p = new Produit(
                        rs.getInt("idProduit"),
                        rs.getString("nom"),
                        rs.getString("description"),
                        rs.getDouble("prix"),
                        rs.getBoolean("disponible"),
                        photo
                );

                listeProduits.add(p);
            }

            tableProduits.setItems(listeProduits);

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Chargement produits: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    private void handleAjouter() {
        ProduitForm form = showProduitDialog("Ajouter Produit", null);
        if (form == null) return;

        // ✅ Pas de stock ici, on utilise disponible
        String sql = "INSERT INTO produit(nom, description, prix, disponible, photo) VALUES(?,?,?,?,?)";

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setString(1, form.nom);
            ps.setString(2, form.description);
            ps.setDouble(3, form.prix);
            ps.setBoolean(4, form.disponible);

            if (form.photoBytes == null) ps.setNull(5, Types.BLOB);
            else ps.setBytes(5, form.photoBytes);

            ps.executeUpdate();
            chargerProduits();

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Ajout produit: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void modifierProduit(Produit p) {
        if (p == null) return;

        ProduitForm form = showProduitDialog("Modifier Produit (ID=" + p.getIdProduit() + ")", p);
        if (form == null) return;

        String sql = "UPDATE produit SET nom=?, description=?, prix=?, disponible=?, photo=? WHERE idProduit=?";

        try (Connection conn = DBConnection.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setString(1, form.nom);
            ps.setString(2, form.description);
            ps.setDouble(3, form.prix);
            ps.setBoolean(4, form.disponible);

            if (form.photoBytes == null) ps.setNull(5, Types.BLOB);
            else ps.setBytes(5, form.photoBytes);

            ps.setInt(6, p.getIdProduit());

            ps.executeUpdate();
            chargerProduits();

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Update produit: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void supprimerProduit(Produit p) {
        if (p == null) return;

        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION,
                "Supprimer ce produit (ID=" + p.getIdProduit() + ") ?",
                ButtonType.YES, ButtonType.NO);

        confirm.showAndWait().ifPresent(btn -> {
            if (btn == ButtonType.YES) {
                String sql = "DELETE FROM produit WHERE idProduit=?";

                try (Connection conn = DBConnection.getConnection();
                     PreparedStatement ps = conn.prepareStatement(sql)) {

                    ps.setInt(1, p.getIdProduit());
                    ps.executeUpdate();
                    chargerProduits();

                } catch (Exception e) {
                    showAlert(Alert.AlertType.ERROR, "Erreur", "Delete produit: " + e.getMessage());
                    e.printStackTrace();
                }
            }
        });
    }

    // ---------------- SEARCH / REFRESH ----------------
    @FXML
    private void handleRechercher() {
        String q = searchField.getText().trim().toLowerCase();
        if (q.isEmpty()) {
            tableProduits.setItems(listeProduits);
            return;
        }

        ObservableList<Produit> res = FXCollections.observableArrayList();
        for (Produit p : listeProduits) {
            String nom = (p.getNom() == null) ? "" : p.getNom().toLowerCase();
            String desc = (p.getDescription() == null) ? "" : p.getDescription().toLowerCase();

            if (nom.contains(q) || desc.contains(q)) res.add(p);
        }

        tableProduits.setItems(res);
    }

    @FXML
    private void handleActualiser() {
        searchField.clear();
        chargerProduits();
    }

    // ---------------- DIALOG (ADD/EDIT) ----------------
    private static class ProduitForm {
        String nom;
        String description;
        double prix;
        boolean disponible;
        byte[] photoBytes;
    }

    private ProduitForm showProduitDialog(String title, Produit existing) {
        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle(title);

        TextField tfNom = new TextField(existing == null ? "" : existing.getNom());
        TextArea taDesc = new TextArea(existing == null ? "" : existing.getDescription());
        taDesc.setPrefRowCount(3);

        TextField tfPrix = new TextField(existing == null ? "" : String.valueOf(existing.getPrix()));

        CheckBox cbDispo = new CheckBox("Produit disponible");
        cbDispo.setSelected(existing == null || existing.isDisponible());

        Label lblPhoto = new Label(existing != null && existing.getPhoto() != null ? "Photo actuelle ✅" : "Aucune photo");
        Button btnChoosePhoto = new Button("📸 Choisir Photo");

        final byte[][] chosen = new byte[1][];
        if (existing != null) chosen[0] = existing.getPhoto(); // garder l’ancienne si on ne change pas

        btnChoosePhoto.setOnAction(e -> {
            try {
                FileChooser fc = new FileChooser();
                fc.setTitle("Choisir une image");
                fc.getExtensionFilters().add(new FileChooser.ExtensionFilter("Images", "*.png", "*.jpg", "*.jpeg"));
                File f = fc.showOpenDialog(dialog.getDialogPane().getScene().getWindow());
                if (f != null) {
                    chosen[0] = Files.readAllBytes(f.toPath());
                    lblPhoto.setText("Photo sélectionnée ✅ (" + f.getName() + ")");
                }
            } catch (Exception ex) {
                lblPhoto.setText("Erreur photo ❌");
            }
        });

        GridPane grid = new GridPane();
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(20));

        grid.addRow(0, new Label("Nom:"), tfNom);
        grid.addRow(1, new Label("Description:"), taDesc);
        grid.addRow(2, new Label("Prix:"), tfPrix);
        grid.addRow(3, new Label("Disponibilité:"), cbDispo);
        grid.addRow(4, btnChoosePhoto, lblPhoto);

        dialog.getDialogPane().setContent(grid);

        ButtonType ok = new ButtonType(existing == null ? "Ajouter" : "Enregistrer", ButtonBar.ButtonData.OK_DONE);
        dialog.getDialogPane().getButtonTypes().addAll(ok, ButtonType.CANCEL);

        return dialog.showAndWait().filter(b -> b == ok).map(b -> {
            ProduitForm form = new ProduitForm();
            form.nom = tfNom.getText().trim();
            form.description = taDesc.getText().trim();
            form.disponible = cbDispo.isSelected();

            if (form.nom.isEmpty()) {
                showAlert(Alert.AlertType.WARNING, "Attention", "Le nom est obligatoire.");
                return null;
            }

            try {
                form.prix = Double.parseDouble(tfPrix.getText().trim());
            } catch (Exception ex) {
                showAlert(Alert.AlertType.WARNING, "Attention", "Prix invalide.");
                return null;
            }

            form.photoBytes = chosen[0];
            return form;
        }).orElse(null);
    }

    // ---------------- ALERT ----------------
    private void showAlert(Alert.AlertType type, String title, String msg) {
        Alert a = new Alert(type);
        a.setTitle(title);
        a.setHeaderText(null);
        a.setContentText(msg);
        a.showAndWait();
    }
}
