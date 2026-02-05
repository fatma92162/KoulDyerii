package x404.KoulDyeri.Utils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DBConnexion {

    // Database configuration
    private static final String URL = "jdbc:mysql://localhost:3306/kouldiery";
    private static final String USER = "root";  // Change to your MySQL username
    private static final String PASSWORD = "";  // Change to your MySQL password

    // Singleton instance (optional - for connection pooling in future)
    private static Connection connection;

    /**
     * Get a database connection
     * This method creates a NEW connection each time it's called
     * The connection should be closed by the caller using try-with-resources
     */
    public static Connection getInstance() throws SQLException {
        try {
            // Load MySQL JDBC Driver (optional for newer versions, but good practice)
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Create and return a new connection
            Connection conn = DriverManager.getConnection(URL, USER, PASSWORD);

            System.out.println("DB Connected ✔");
            return conn;

        } catch (ClassNotFoundException e) {
            System.err.println("MySQL JDBC Driver not found!");
            e.printStackTrace();
            throw new SQLException("Driver not found", e);
        } catch (SQLException e) {
            System.err.println("Failed to connect to database!");
            System.err.println("URL: " + URL);
            System.err.println("Error: " + e.getMessage());
            throw e;
        }
    }

    /**
     * Test the database connection
     */
    public static boolean testConnection() {
        try (Connection conn = getInstance()) {
            return conn != null && !conn.isClosed();
        } catch (SQLException e) {
            System.err.println("Database connection test failed: " + e.getMessage());
            return false;
        }
    }

    /**
     * Close a connection safely
     */
    public static void closeConnection(Connection conn) {
        if (conn != null) {
            try {
                if (!conn.isClosed()) {
                    conn.close();
                    System.out.println("Connection closed successfully");
                }
            } catch (SQLException e) {
                System.err.println("Error closing connection: " + e.getMessage());
                e.printStackTrace();
            }
        }
    }
}