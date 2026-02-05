package x404.KoulDyeri.Controller;

import x404.KoulDyeri.Model.Post;
import x404.KoulDyeri.Utils.DBConnexion;
import x404.KoulDyeri.Utils.DBConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class PostController {

    /**
     * Add a new post to the database
     */
    public boolean add(Post post) {
        String query = "INSERT INTO posts (title, content) VALUES (?, ?)";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setString(1, post.getTitle());
            pstmt.setString(2, post.getContent());

            int result = pstmt.executeUpdate();
            return result > 0;

        } catch (SQLException e) {
            System.err.println("Error adding post: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }

    /**
     * Get all posts from the database
     */
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
                        rs.getTimestamp("created_at")
                );
                posts.add(post);
            }

        } catch (SQLException e) {
            System.err.println("Error fetching all posts: " + e.getMessage());
            e.printStackTrace();
        }

        return posts;
    }

    /**
     * Get a post by its ID
     */
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
                        rs.getTimestamp("created_at")
                );
            }

        } catch (SQLException e) {
            System.err.println("Error fetching post by ID: " + e.getMessage());
            e.printStackTrace();
        }

        return null;
    }

    /**
     * Update an existing post
     */
    public boolean update(Post post) {
        String query = "UPDATE posts SET title = ?, content = ? WHERE id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setString(1, post.getTitle());
            pstmt.setString(2, post.getContent());
            pstmt.setInt(3, post.getId());

            int result = pstmt.executeUpdate();
            return result > 0;

        } catch (SQLException e) {
            System.err.println("Error updating post: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }

    /**
     * Delete a post by its ID
     */
    public boolean delete(int id) {
        String query = "DELETE FROM posts WHERE id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setInt(1, id);
            int result = pstmt.executeUpdate();
            return result > 0;

        } catch (SQLException e) {
            System.err.println("Error deleting post: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }

    /**
     * Search posts by title or content
     */
    public List<Post> search(String keyword) {
        List<Post> posts = new ArrayList<>();
        String query = "SELECT * FROM posts WHERE title LIKE ? OR content LIKE ? ORDER BY created_at DESC";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            String searchPattern = "%" + keyword + "%";
            pstmt.setString(1, searchPattern);
            pstmt.setString(2, searchPattern);

            ResultSet rs = pstmt.executeQuery();

            while (rs.next()) {
                Post post = new Post(
                        rs.getInt("id"),
                        rs.getString("title"),
                        rs.getString("content"),
                        rs.getTimestamp("created_at")
                );
                posts.add(post);
            }

        } catch (SQLException e) {
            System.err.println("Error searching posts: " + e.getMessage());
            e.printStackTrace();
        }

        return posts;
    }
}