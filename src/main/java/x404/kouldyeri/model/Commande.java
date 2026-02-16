package model;

public class Commande {
    private int id;
    private int productId;
    private String customerName;
    private String phone;
    private String location;

    public Commande() {}

    public Commande(int productId, String customerName, String phone, String location) {
        this.productId = productId;
        this.customerName = customerName;
        this.phone = phone;
        this.location = location;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getProductId() { return productId; }
    public void setProductId(int productId) { this.productId = productId; }

    public String getCustomerName() { return customerName; }
    public void setCustomerName(String customerName) { this.customerName = customerName; }

    public String getPhone() { return phone; }
    public void setPhone(String phone) { this.phone = phone; }

    public String getLocation() { return location; }
    public void setLocation(String location) { this.location = location; }
}
