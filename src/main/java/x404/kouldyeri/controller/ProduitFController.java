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
import javafx.stage.Stage;

import java.sql.*;

public class ProduitFController {

    @FXML private TableView<ProductRow> productsTable;
    @FXML private TableColumn<ProductRow, Integer> colId;
    @FXML private TableColumn<ProductRow, String> colName;
    @FXML private TableColumn<ProductRow, String> colPrice;

    private final ObservableList<ProductRow> products = FXCollections.observableArrayList();

    private static final String URL  = "jdbc:mysql://localhost:3306/kouldyeridb?useSSL=false&serverTimezone=UTC";
    private static final String USER = "root";
    private static final String PASS = "";

    @FXML
    public void initialize() {
        colId.setCellValueFactory(d -> new SimpleObjectProperty<>(d.getValue().id()));
        colName.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().name()));
        colPrice.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().price()));

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
                products.add(new ProductRow(id, nom, prix));
            }

        } catch (SQLException ex) {
            alert("DB Error", ex.getMessage(), Alert.AlertType.ERROR);
        }
    }

    @FXML
    private void goCommandeF() {
        switchScene("/x404/kouldyeri/view/commandef.fxml");

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

        public ProductRow(int id, String name, String price) {
            this.id = id;
            this.name = name;
            this.price = price;
        }

        public int id() { return id; }
        public String name() { return name; }
        public String price() { return price; }
    }
}
