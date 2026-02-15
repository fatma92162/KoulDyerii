package x404.KoulDyeri.Controller;

import x404.KoulDyeri.Model.Post;
import x404.KoulDyeri.Utils.DBConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class PostController {

    // ================= VALIDATION =================
    private boolean isValid(Post post) {

        if (post == null) return false;

        // ----- TITLE -----
        if (post.getTitle() == null) return false;
        String title = post.getTitle().trim();

        if (title.isEmpty()) return false;       // champ vide
        if (title.length() < 3) return false;    // minimum
        if (title.length() > 100) return false;  // maximum

        // ----- CONTENT -----
        if (post.getContent() == null) return false;
        String content = post.getContent().trim();

        if (content.isEmpty()) return false;
        if (content.length() < 5) return false;
        if (content.length() > 2000) return false;

        // ----- IMAGE PATH (optionnel) -----
        if (post.getImagePath() != null &&
                post.getImagePath().length() > 255)
            return false;

        return true;
    }

    // ================= ADD =================
    public boolean add(Post post) {
        if (!isValid(post)) return false;

        String query = "INSERT INTO posts (title, content, image_path) VALUES (?, ?, ?)";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setString(1, post.getTitle().trim());
            pstmt.setString(2, post.getContent().trim());
            pstmt.setString(3, post.getImagePath());

            return pstmt.executeUpdate() > 0;

        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    // ================= GET ALL =================
    public List<Post> getAll() {

        List<Post> posts = new ArrayList<>();
        String query = "SELECT * FROM posts ORDER BY created_at DESC";

        try (Connection conn = DBConnexion.getInstance();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(query)) {

            while (rs.next()) {

                Post post = new Post(
                        rs.getInt("id"),
                        rs.getString("title"),
                        rs.getString("content"),
                        rs.getTimestamp("created_at"),
                        rs.getString("image_path")
                );

                posts.add(post);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return posts;
    }

    // ================= GET BY ID =================
    public Post getById(int id) {

        String query = "SELECT * FROM posts WHERE id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setInt(1, id);
            ResultSet rs = pstmt.executeQuery();

            if (rs.next()) {
                return new Post(
                        rs.getInt("id"),
                        rs.getString("title"),
                        rs.getString("content"),
                        rs.getTimestamp("created_at"),
                        rs.getString("image_path")
                );
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return null;
    }

    // ================= UPDATE =================
    public boolean update(Post post) {

        if (!isValid(post)) return false;

        String query = "UPDATE posts SET title = ?, content = ?, image_path = ? WHERE id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setString(1, post.getTitle().trim());
            pstmt.setString(2, post.getContent().trim());
            pstmt.setString(3, post.getImagePath());
            pstmt.setInt(4, post.getId());

            return pstmt.executeUpdate() > 0;

        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    // ================= DELETE =================
    public boolean delete(int id) {

        String query = "DELETE FROM posts WHERE id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setInt(1, id);
            return pstmt.executeUpdate() > 0;

        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    // ================= SEARCH =================
    public List<Post> search(String keyword) {

        List<Post> posts = new ArrayList<>();
        String query = "SELECT * FROM posts WHERE title LIKE ? OR content LIKE ? ORDER BY created_at DESC";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            String pattern = "%" + keyword + "%";
            pstmt.setString(1, pattern);
            pstmt.setString(2, pattern);

            ResultSet rs = pstmt.executeQuery();

            while (rs.next()) {
                Post post = new Post(
                        rs.getInt("id"),
                        rs.getString("title"),
                        rs.getString("content"),
                        rs.getTimestamp("created_at"),
                        rs.getString("image_path")
                );
                posts.add(post);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return posts;
    }
}
