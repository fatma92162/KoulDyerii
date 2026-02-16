package controller;

import javafx.beans.property.SimpleObjectProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.stage.Stage;
import model.Commande;

import java.sql.*;

public class CommandeController {

    // ====== PRODUITS TABLE ======
    @FXML private TableView<ProductRow> productsTable;
    @FXML private TableColumn<ProductRow, Integer> colId;
    @FXML private TableColumn<ProductRow, String> colName;
    @FXML private TableColumn<ProductRow, String> colPrice;
    @FXML private TableColumn<ProductRow, Button> colAction;

    private final ObservableList<ProductRow> products = FXCollections.observableArrayList();

    // ====== COMMANDS TABLE ======
    @FXML private TableView<OrderRow> ordersTable;
    @FXML private TableColumn<OrderRow, Integer> orderColId;
    @FXML private TableColumn<OrderRow, String> orderColProduct;
    @FXML private TableColumn<OrderRow, String> orderColName;
    @FXML private TableColumn<OrderRow, String> orderColPhone;
    @FXML private TableColumn<OrderRow, String> orderColLocation;
    @FXML private TableColumn<OrderRow, String> orderColStatus;
    @FXML private TableColumn<OrderRow, HBox> orderColAction;

    private final ObservableList<OrderRow> orders = FXCollections.observableArrayList();

    // ====== DB CONFIG ======
    private static final String URL  = "jdbc:mysql://localhost:3306/kouldyeridb?useSSL=false&serverTimezone=UTC";
    private static final String USER = "root";
    private static final String PASS = "";

    @FXML
    public void initialize() {
        // --- Products columns
        colId.setCellValueFactory(d -> new SimpleObjectProperty<>(d.getValue().id()));
        colName.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().name()));
        colPrice.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().price()));
        colAction.setCellValueFactory(d -> new SimpleObjectProperty<>(d.getValue().actionButton()));

        // --- Orders columns
        orderColId.setCellValueFactory(d -> new SimpleObjectProperty<>(d.getValue().getId()));
        orderColProduct.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().getProductName()));
        orderColName.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().getCustomerName()));
        orderColPhone.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().getPhone()));
        orderColLocation.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().getLocation()));
        orderColStatus.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().getStatus()));
        orderColAction.setCellValueFactory(d -> new SimpleObjectProperty<>(d.getValue().getActions()));

        loadProducts();
        productsTable.setItems(products);

        loadOrders();
        ordersTable.setItems(orders);
    }

    // ===================== NAVIGATION =====================
    @FXML
    private void goProduits() {
        // ✅ change path if your fxml name/location differs
        switchScene("/x404/kouldyeri/view/ProduitView.fxml");
    }

    @FXML
    private void goUtilisateurs() {
        // ✅ change path if your fxml name/location differs
        switchScene("/x404/kouldyeri/view/UtilisateurView.fxml");
    }

    private void switchScene(String fxmlPath) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource(fxmlPath));
            Stage stage = (Stage) productsTable.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
            showAlert("Navigation Error", "Impossible d'ouvrir: " + fxmlPath + "\n" + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    // ===================== LOAD PRODUCTS =====================
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
            showAlert("DB Error", ex.getMessage(), Alert.AlertType.ERROR);
        }
    }

    // ===================== OPEN FORM =====================
    private void openOrderForm(int productId, String productName) {
        Dialog<ButtonType> dialog = new Dialog<>();
        dialog.setTitle("Commander: " + productName);

        Label l1 = new Label("Nom:");
        TextField tfName = new TextField();

        Label l2 = new Label("Téléphone:");
        TextField tfPhone = new TextField();

        Label l3 = new Label("Location:");
        TextField tfLocation = new TextField();

        GridPane gp = new GridPane();
        gp.setHgap(10);
        gp.setVgap(10);

        gp.addRow(0, l1, tfName);
        gp.addRow(1, l2, tfPhone);
        gp.addRow(2, l3, tfLocation);

        dialog.getDialogPane().setContent(gp);

        ButtonType confirm = new ButtonType("Confirmer", ButtonBar.ButtonData.OK_DONE);
        dialog.getDialogPane().getButtonTypes().addAll(confirm, ButtonType.CANCEL);

        dialog.showAndWait().ifPresent(result -> {
            if (result == confirm) {
                String name = tfName.getText().trim();
                String phone = tfPhone.getText().trim();
                String location = tfLocation.getText().trim();

                if (name.isEmpty() || phone.isEmpty() || location.isEmpty()) {
                    showAlert("Validation", "Tous les champs sont obligatoires.", Alert.AlertType.WARNING);
                    return;
                }

                insertCommand(new Commande(productId, name, phone, location));
            }
        });
    }

    // ===================== INSERT COMMAND =====================
    private void insertCommand(Commande c) {
        String sql = "INSERT INTO commands (product_id, customer_name, phone, location) VALUES (?,?,?,?)";

        try (Connection cn = DriverManager.getConnection(URL, USER, PASS);
             PreparedStatement ps = cn.prepareStatement(sql)) {

            ps.setInt(1, c.getProductId());
            ps.setString(2, c.getCustomerName());
            ps.setString(3, c.getPhone());
            ps.setString(4, c.getLocation());

            ps.executeUpdate();

            showAlert("Succès", "Commande enregistrée ✅", Alert.AlertType.INFORMATION);
            loadOrders();

        } catch (SQLException ex) {
            showAlert("DB Error", ex.getMessage(), Alert.AlertType.ERROR);
        }
    }

    // ===================== LOAD ORDERS =====================
    private void loadOrders() {
        orders.clear();

        String sql = """
            SELECT c.id, c.customer_name, c.phone, c.location, c.status, p.nom AS product_name
            FROM commands c
            JOIN produit p ON c.product_id = p.idProduit
            ORDER BY c.id DESC
        """;

        try (Connection cn = DriverManager.getConnection(URL, USER, PASS);
             PreparedStatement ps = cn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                int id = rs.getInt("id");
                String productName = rs.getString("product_name");
                String customerName = rs.getString("customer_name");
                String phone = rs.getString("phone");
                String location = rs.getString("location");
                String status = rs.getString("status");

                OrderRow row = new OrderRow(id, productName, customerName, phone, location, status);

                Button btnAccept = new Button("Accepter");
                Button btnDecline = new Button("Refuser");

                if (!"PENDING".equalsIgnoreCase(status)) {
                    btnAccept.setDisable(true);
                    btnDecline.setDisable(true);
                }

                btnAccept.setOnAction(e -> updateOrderStatus(id, "ACCEPTED"));
                btnDecline.setOnAction(e -> updateOrderStatus(id, "DECLINED"));

                HBox actions = new HBox(8, btnAccept, btnDecline);
                row.setActions(actions);

                orders.add(row);
            }

        } catch (SQLException ex) {
            showAlert("DB Error", ex.getMessage(), Alert.AlertType.ERROR);
        }
    }

    // ===================== UPDATE STATUS =====================
    private void updateOrderStatus(int orderId, String status) {
        String sql = "UPDATE commands SET status = ? WHERE id = ?";

        try (Connection cn = DriverManager.getConnection(URL, USER, PASS);
             PreparedStatement ps = cn.prepareStatement(sql)) {

            ps.setString(1, status);
            ps.setInt(2, orderId);

            ps.executeUpdate();
            loadOrders();

        } catch (SQLException ex) {
            showAlert("DB Error", ex.getMessage(), Alert.AlertType.ERROR);
        }
    }

    private void showAlert(String title, String msg, Alert.AlertType type) {
        Alert a = new Alert(type);
        a.setTitle(title);
        a.setHeaderText(null);
        a.setContentText(msg);
        a.showAndWait();
    }

    // ===================== TABLE ROWS =====================
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

    public static class OrderRow {
        private final int id;
        private final String productName;
        private final String customerName;
        private final String phone;
        private final String location;
        private final String status;
        private HBox actions;

        public OrderRow(int id, String productName, String customerName, String phone, String location, String status) {
            this.id = id;
            this.productName = productName;
            this.customerName = customerName;
            this.phone = phone;
            this.location = location;
            this.status = status;
        }

        public int getId() { return id; }
        public String getProductName() { return productName; }
        public String getCustomerName() { return customerName; }
        public String getPhone() { return phone; }
        public String getLocation() { return location; }
        public String getStatus() { return status; }

        public HBox getActions() { return actions; }
        public void setActions(HBox actions) { this.actions = actions; }
    }
}
