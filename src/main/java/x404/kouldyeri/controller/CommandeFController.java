package controller;

import javafx.beans.property.SimpleObjectProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;
import model.Commande;

import java.sql.*;

public class CommandeFController {

    @FXML private TableView<ProductRow> productsTable;
    @FXML private TableColumn<ProductRow, Integer> colId;
    @FXML private TableColumn<ProductRow, String> colName;
    @FXML private TableColumn<ProductRow, String> colPrice;
    @FXML private TableColumn<ProductRow, Button> colAction;

    private final ObservableList<ProductRow> products = FXCollections.observableArrayList();

    private static final String URL  = "jdbc:mysql://localhost:3306/kouldyeridb?useSSL=false&serverTimezone=UTC";
    private static final String USER = "root";
    private static final String PASS = "";

    @FXML
    public void initialize() {
        colId.setCellValueFactory(d -> new SimpleObjectProperty<>(d.getValue().id()));
        colName.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().name()));
        colPrice.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().price()));
        colAction.setCellValueFactory(d -> new SimpleObjectProperty<>(d.getValue().actionButton()));

        loadProducts();
        productsTable.setItems(products);
    }

    private void loadProducts() {
        products.clear();

        String sql = "SELECT idProduit, nom, prix FROM produit WHERE disponible = 1";

        try (Connection cn = DriverManager.getConnection(URL, USER, PASS);
             PreparedStatement ps = cn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                int id = rs.getInt("idProduit");
                String nom = rs.getString("nom");
                String prix = String.valueOf(rs.getDouble("prix"));

                ProductRow row = new ProductRow(id, nom, prix);

                Button btn = new Button("Commander");
                btn.setOnAction(e -> openOrderForm(row.id(), row.name()));
                row.setActionButton(btn);

                products.add(row);
            }

        } catch (SQLException ex) {
            alert("DB Error", ex.getMessage(), Alert.AlertType.ERROR);
        }
    }

    private void openOrderForm(int productId, String productName) {
        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("Commander: " + productName);

        TextField tfName = new TextField();
        TextField tfPhone = new TextField();
        TextField tfLocation = new TextField();

        GridPane gp = new GridPane();
        gp.setHgap(10);
        gp.setVgap(10);

        gp.addRow(0, new Label("Nom:"), tfName);
        gp.addRow(1, new Label("Téléphone:"), tfPhone);
        gp.addRow(2, new Label("Location:"), tfLocation);

        dialog.getDialogPane().setContent(gp);

        ButtonType confirm = new ButtonType("Confirmer", ButtonBar.ButtonData.OK_DONE);
        dialog.getDialogPane().getButtonTypes().addAll(confirm, ButtonType.CANCEL);

        dialog.showAndWait().ifPresent(result -> {
            if (result == confirm) {
                String name = tfName.getText().trim();
                String phone = tfPhone.getText().trim();
                String location = tfLocation.getText().trim();

                if (name.isEmpty() || phone.isEmpty() || location.isEmpty()) {
                    alert("Validation", "Tous les champs sont obligatoires.", Alert.AlertType.WARNING);
                    return;
                }

                insertCommand(new Commande(productId, name, phone, location));
            }
        });
    }

    private void insertCommand(Commande c) {
        String sql = "INSERT INTO commands (product_id, customer_name, phone, location) VALUES (?,?,?,?)";

        try (Connection cn = DriverManager.getConnection(URL, USER, PASS);
             PreparedStatement ps = cn.prepareStatement(sql)) {

            ps.setInt(1, c.getProductId());
            ps.setString(2, c.getCustomerName());
            ps.setString(3, c.getPhone());
            ps.setString(4, c.getLocation());

            ps.executeUpdate();
            alert("Succès", "Commande enregistrée ✅", Alert.AlertType.INFORMATION);

        } catch (SQLException ex) {
            alert("DB Error", ex.getMessage(), Alert.AlertType.ERROR);
        }
    }

    @FXML
    private void goProduitF() {
        switchScene("/x404/kouldyeri/view/produitf.fxml");

    }

    private void switchScene(String fxmlPath) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource(fxmlPath));
            Stage stage = (Stage) productsTable.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
            alert("Navigation Error", "Impossible d'ouvrir: " + fxmlPath + "\n" + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    private void alert(String title, String msg, Alert.AlertType type) {
        Alert a = new Alert(type);
        a.setTitle(title);
        a.setHeaderText(null);
        a.setContentText(msg);
        a.showAndWait();
    }

    public static class ProductRow {
        private final int id;
        private final String name;
        private final String price;
        private Button actionButton;

        public ProductRow(int id, String name, String price) {
            this.id = id;
            this.name = name;
            this.price = price;
        }

        public int id() { return id; }
        public String name() { return name; }
        public String price() { return price; }

        public Button actionButton() { return actionButton; }
        public void setActionButton(Button b) { this.actionButton = b; }
    }
}
