package x404.kouldyeri.controller;

import javafx.beans.property.SimpleBooleanProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import x404.kouldyeri.model.Livreur;
import x404.kouldyeri.service.LivreurService;

import java.sql.SQLException;
import java.util.List;

public class LivreurController {

    // Sidebar
    @FXML private Button btnDeconnexion;

    // Search
    @FXML private TextField searchField;

    // Form
    @FXML private TextField tfNom;
    @FXML private TextField tfPrenom;
    @FXML private TextField tfTelephone;
    @FXML private CheckBox cbDisponible;

    // Table
    @FXML private TableView<Livreur> tableLivreur;
    @FXML private TableColumn<Livreur, Integer> colId;
    @FXML private TableColumn<Livreur, String> colNom;
    @FXML private TableColumn<Livreur, String> colPrenom;
    @FXML private TableColumn<Livreur, String> colTel;
    @FXML private TableColumn<Livreur, Boolean> colDisp;

    private final LivreurService service = new LivreurService();
    private final ObservableList<Livreur> masterData = FXCollections.observableArrayList();
    private final ObservableList<Livreur> filteredData = FXCollections.observableArrayList();

    @FXML
    public void initialize() {
        colId.setCellValueFactory(c -> new SimpleIntegerProperty(c.getValue().getIdLivreur()).asObject());
        colNom.setCellValueFactory(c -> new SimpleStringProperty(c.getValue().getNom()));
        colPrenom.setCellValueFactory(c -> new SimpleStringProperty(c.getValue().getPrenom()));
        colTel.setCellValueFactory(c -> new SimpleStringProperty(c.getValue().getTelephone()));
        colDisp.setCellValueFactory(c -> new SimpleBooleanProperty(c.getValue().isDisponibilite()).asObject());

        tableLivreur.setItems(filteredData);

        tableLivreur.getSelectionModel().selectedItemProperty().addListener((obs, oldV, selected) -> {
            if (selected != null) {
                tfNom.setText(selected.getNom());
                tfPrenom.setText(selected.getPrenom());
                tfTelephone.setText(selected.getTelephone());
                cbDisponible.setSelected(selected.isDisponibilite());
            }
        });

        refresh();
    }

    private void refresh() {
        masterData.clear();
        filteredData.clear();
        try {
            List<Livreur> list = service.afficher();
            masterData.addAll(list);
            filteredData.addAll(list);
        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur SQL", e.getMessage());
        }
    }

    @FXML
    public void handleRechercher() {
        String q = searchField.getText().trim().toLowerCase();
        filteredData.clear();

        if (q.isEmpty()) {
            filteredData.addAll(masterData);
            return;
        }

        for (Livreur l : masterData) {
            boolean match =
                    String.valueOf(l.getIdLivreur()).contains(q) ||
                            (l.getNom() != null && l.getNom().toLowerCase().contains(q)) ||
                            (l.getPrenom() != null && l.getPrenom().toLowerCase().contains(q)) ||
                            (l.getTelephone() != null && l.getTelephone().toLowerCase().contains(q));

            if (match) filteredData.add(l);
        }
    }

    @FXML
    public void ajouter() {
        String nom = tfNom.getText().trim();
        String prenom = tfPrenom.getText().trim();
        String tel = tfTelephone.getText().trim();
        boolean dispo = cbDisponible.isSelected();

        if (nom.isEmpty() || prenom.isEmpty() || tel.isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Nom, Prénom et Téléphone sont obligatoires.");
            return;
        }

        try {
            service.ajouter(new Livreur(nom, prenom, tel, dispo));
            clearFields();
            refresh();
            showAlert(Alert.AlertType.INFORMATION, "Succès", "Livreur ajouté !");
        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur SQL", e.getMessage());
        }
    }

    @FXML
    public void modifier() {
        Livreur selected = tableLivreur.getSelectionModel().getSelectedItem();
        if (selected == null) {
            showAlert(Alert.AlertType.INFORMATION, "Info", "Sélectionne un livreur à modifier.");
            return;
        }

        String nom = tfNom.getText().trim();
        String prenom = tfPrenom.getText().trim();
        String tel = tfTelephone.getText().trim();
        boolean dispo = cbDisponible.isSelected();

        if (nom.isEmpty() || prenom.isEmpty() || tel.isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Nom, Prénom et Téléphone sont obligatoires.");
            return;
        }

        try {
            service.modifier(new Livreur(selected.getIdLivreur(), nom, prenom, tel, dispo));
            clearFields();
            refresh();
            showAlert(Alert.AlertType.INFORMATION, "Succès", "Livreur modifié !");
        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur SQL", e.getMessage());
        }
    }

    @FXML
    public void supprimer() {
        Livreur selected = tableLivreur.getSelectionModel().getSelectedItem();
        if (selected == null) {
            showAlert(Alert.AlertType.INFORMATION, "Info", "Sélectionne un livreur à supprimer.");
            return;
        }

        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setHeaderText(null);
        confirm.setContentText("Supprimer le livreur ID = " + selected.getIdLivreur() + " ?");
        if (confirm.showAndWait().orElse(ButtonType.CANCEL) != ButtonType.OK) return;

        try {
            service.supprimer(selected.getIdLivreur());
            clearFields();
            refresh();
            showAlert(Alert.AlertType.INFORMATION, "Succès", "Livreur supprimé !");
        } catch (SQLException e) {
            // si FK bloque: livraisons liées
            showAlert(Alert.AlertType.ERROR, "Erreur SQL",
                    "Impossible de supprimer. Ce livreur est lié à une livraison.\n" + e.getMessage());
        }
    }

    @FXML
    public void clearFields() {
        tfNom.clear();
        tfPrenom.clear();
        tfTelephone.clear();
        cbDisponible.setSelected(false);
        tableLivreur.getSelectionModel().clearSelection();
    }

    // Navigation
    @FXML
    public void goLivraisons() {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/x404/kouldyeri/view/LivraisonView.fxml"));
            Stage stage = (Stage) tableLivreur.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Livraisons");
            stage.setMaximized(true);
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", e.getMessage());
        }
    }

    @FXML
    public void goUtilisateurs() {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/x404/kouldyeri/view/UtilisateurView.fxml"));
            Stage stage = (Stage) tableLivreur.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Utilisateurs");
            stage.setMaximized(true);
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", e.getMessage());
        }
    }

    @FXML
    public void handleDeconnexion() {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/x404/kouldyeri/view/LoginView.fxml"));
            Stage stage = (Stage) btnDeconnexion.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Connexion");
            stage.setMaximized(false);
            stage.centerOnScreen();
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", e.getMessage());
        }
    }

    private void showAlert(Alert.AlertType type, String title, String msg) {
        Alert a = new Alert(type);
        a.setTitle(title);
        a.setHeaderText(null);
        a.setContentText(msg);
        a.showAndWait();
    }
}
