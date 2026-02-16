package x404.kouldyeri.controller;

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
import x404.kouldyeri.model.Livraison;
import x404.kouldyeri.service.LivraisonService;

import java.sql.SQLException;
import java.util.List;

public class LivraisonController {

    // Sidebar
    @FXML private Button btnDeconnexion;
    @FXML private Label lblTotalLivraisons;
    @FXML private Label lblEnCours;
    @FXML private Label lblLivrees;

    // Header search
    @FXML private TextField searchField;

    // Form fields
    @FXML private TextField tfAdresse;
    @FXML private TextField tfStatut;
    @FXML private TextField tfIdCommande;

    // Table
    @FXML private TableView<Livraison> tableLivraison;
    @FXML private TableColumn<Livraison, Integer> colId;
    @FXML private TableColumn<Livraison, String> colAdresse;
    @FXML private TableColumn<Livraison, String> colStatut;
    @FXML private TableColumn<Livraison, Integer> colIdCommande;

    private final LivraisonService service = new LivraisonService();

    private final ObservableList<Livraison> masterData = FXCollections.observableArrayList();
    private final ObservableList<Livraison> filteredData = FXCollections.observableArrayList();

    @FXML
    public void initialize() {
        // Bind table columns
        colId.setCellValueFactory(c -> new SimpleIntegerProperty(c.getValue().getIdLivraison()).asObject());
        colAdresse.setCellValueFactory(c -> new SimpleStringProperty(c.getValue().getAdresse()));
        colStatut.setCellValueFactory(c -> new SimpleStringProperty(c.getValue().getStatutLivraison()));
        colIdCommande.setCellValueFactory(c -> new SimpleIntegerProperty(c.getValue().getIdCommande()).asObject());

        tableLivraison.setItems(filteredData);

        // Click row -> fill fields
        tableLivraison.getSelectionModel().selectedItemProperty().addListener((obs, oldV, selected) -> {
            if (selected != null) {
                tfAdresse.setText(selected.getAdresse());
                tfStatut.setText(selected.getStatutLivraison());
                tfIdCommande.setText(String.valueOf(selected.getIdCommande()));
            }
        });

        refresh();
    }

    // --------- Actions UI ---------

    @FXML
    public void refresh() {
        masterData.clear();
        filteredData.clear();

        try {
            List<Livraison> list = service.afficher();
            masterData.addAll(list);
            filteredData.addAll(list);
            updateStats(list);
        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur SQL", e.getMessage());
        }
    }

    @FXML
    public void handleRechercher() {
        String q = (searchField == null) ? "" : searchField.getText().trim().toLowerCase();

        filteredData.clear();

        if (q.isEmpty()) {
            filteredData.addAll(masterData);
            updateStats(masterData);
            return;
        }

        for (Livraison l : masterData) {
            boolean match =
                    String.valueOf(l.getIdLivraison()).contains(q) ||
                            (l.getAdresse() != null && l.getAdresse().toLowerCase().contains(q)) ||
                            (l.getStatutLivraison() != null && l.getStatutLivraison().toLowerCase().contains(q)) ||
                            String.valueOf(l.getIdCommande()).contains(q);

            if (match) filteredData.add(l);
        }

        updateStats(filteredData);
    }

    @FXML
    public void ajouter() {
        String adresse = tfAdresse.getText().trim();
        String statut = tfStatut.getText().trim();

        if (adresse.isEmpty() || statut.isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Adresse et Statut sont obligatoires.");
            return;
        }

        int idCommande;
        try {
            idCommande = Integer.parseInt(tfIdCommande.getText().trim());
        } catch (Exception e) {
            showAlert(Alert.AlertType.WARNING, "Validation", "ID Commande doit être un nombre.");
            return;
        }

        try {
            service.ajouter(new Livraison(adresse, statut, idCommande));
            clearFields();
            refresh();
            showAlert(Alert.AlertType.INFORMATION, "Succès", "Livraison ajoutée !");
        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur SQL", e.getMessage());
        }
    }

    @FXML
    public void modifier() {
        Livraison selected = tableLivraison.getSelectionModel().getSelectedItem();
        if (selected == null) {
            showAlert(Alert.AlertType.INFORMATION, "Info", "Sélectionne une livraison à modifier.");
            return;
        }

        String adresse = tfAdresse.getText().trim();
        String statut = tfStatut.getText().trim();

        if (adresse.isEmpty() || statut.isEmpty()) {
            showAlert(Alert.AlertType.WARNING, "Validation", "Adresse et Statut sont obligatoires.");
            return;
        }

        int idCommande;
        try {
            idCommande = Integer.parseInt(tfIdCommande.getText().trim());
        } catch (Exception e) {
            showAlert(Alert.AlertType.WARNING, "Validation", "ID Commande doit être un nombre.");
            return;
        }

        try {
            service.modifier(new Livraison(selected.getIdLivraison(), adresse, statut, idCommande));
            clearFields();
            refresh();
            showAlert(Alert.AlertType.INFORMATION, "Succès", "Livraison modifiée !");
        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur SQL", e.getMessage());
        }
    }

    @FXML
    public void supprimer() {
        Livraison selected = tableLivraison.getSelectionModel().getSelectedItem();
        if (selected == null) {
            showAlert(Alert.AlertType.INFORMATION, "Info", "Sélectionne une livraison à supprimer.");
            return;
        }

        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setHeaderText(null);
        confirm.setContentText("Supprimer la livraison ID = " + selected.getIdLivraison() + " ?");
        if (confirm.showAndWait().orElse(ButtonType.CANCEL) != ButtonType.OK) return;

        try {
            service.supprimer(selected.getIdLivraison());
            clearFields();
            refresh();
            showAlert(Alert.AlertType.INFORMATION, "Succès", "Livraison supprimée !");
        } catch (SQLException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur SQL", e.getMessage());
        }
    }

    @FXML
    public void clearFields() {
        tfAdresse.clear();
        tfStatut.clear();
        tfIdCommande.clear();
        tableLivraison.getSelectionModel().clearSelection();
    }

    // --------- Navigation ---------

    @FXML
    public void goUtilisateurs() {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/x404/kouldyeri/view/UtilisateurView.fxml"));
            Stage stage = (Stage) tableLivraison.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Utilisateurs");
            stage.setMaximized(true);
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", e.getMessage());
        }
    }

    @FXML
    public void goLivreurs() {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/x404/kouldyeri/view/LivreurView.fxml"));
            Stage stage = (Stage) tableLivraison.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("KoulDyeri - Livreurs");
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

    // --------- Helpers ---------

    private void updateStats(List<Livraison> list) {
        int total = list.size();
        int enCours = 0;
        int livrees = 0;

        for (Livraison l : list) {
            String s = (l.getStatutLivraison() == null) ? "" : l.getStatutLivraison().trim().toLowerCase();
            if (s.contains("en cours")) enCours++;
            if (s.contains("livr")) livrees++; // couvre "livrée", "livre", "livré"
        }

        if (lblTotalLivraisons != null) lblTotalLivraisons.setText(String.valueOf(total));
        if (lblEnCours != null) lblEnCours.setText(String.valueOf(enCours));
        if (lblLivrees != null) lblLivrees.setText(String.valueOf(livrees));
    }

    private void showAlert(Alert.AlertType type, String title, String msg) {
        Alert a = new Alert(type);
        a.setTitle(title);
        a.setHeaderText(null);
        a.setContentText(msg);
        a.showAndWait();
    }
}
