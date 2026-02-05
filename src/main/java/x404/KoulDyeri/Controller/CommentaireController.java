package x404.KoulDyeri.Controller;

import x404.KoulDyeri.Model.Commentaire;
import x404.KoulDyeri.Utils.DBConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class CommentaireController {

    /**
     * Add a new comment to the database
     */
    public boolean add(Commentaire commentaire) {
        String query = "INSERT INTO commentaires (post_id, author, content) VALUES (?, ?, ?)";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setInt(1, commentaire.getPostId());
            pstmt.setString(2, commentaire.getAuthor());
            pstmt.setString(3, commentaire.getContent());

            int result = pstmt.executeUpdate();

            return result > 0;

        } catch (SQLException e) {

            System.err.println("Error adding comment: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }

    /**
     * Get all comments from the database
     */
    public List<Commentaire> getAll() {
        List<Commentaire> comments = new ArrayList<>();
        String query = "SELECT * FROM commentaires ORDER BY created_at DESC";

        try (Connection conn = DBConnexion.getInstance();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(query)) {

            while (rs.next()) {
                Commentaire comment = new Commentaire(
                        rs.getInt("id"),
                        rs.getInt("post_id"),
                        rs.getString("author"),
                        rs.getString("content"),
                        rs.getTimestamp("created_at")
                );
                comments.add(comment);
            }

        } catch (SQLException e) {
            System.err.println("Error fetching all comments: " + e.getMessage());
            e.printStackTrace();
        }

        return comments;
    }

    /**
     * Get all comments for a specific post
     * This is the NEW method needed for the enhanced FeedView
     */
    public List<Commentaire> getByPostId(int postId) {
        List<Commentaire> comments = new ArrayList<>();
        String query = "SELECT * FROM commentaires WHERE post_id = ? ORDER BY created_at DESC";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setInt(1, postId);
            ResultSet rs = pstmt.executeQuery();

            while (rs.next()) {
                Commentaire comment = new Commentaire(
                        rs.getInt("id"),
                        rs.getInt("post_id"),
                        rs.getString("author"),
                        rs.getString("content"),
                        rs.getTimestamp("created_at")
                );
                comments.add(comment);
            }

        } catch (SQLException e) {
            System.err.println("Error fetching comments for post " + postId + ": " + e.getMessage());
            e.printStackTrace();
        }

        return comments;
    }

    /**
     * Get a comment by its ID
     */
    public Commentaire getById(int id) {
        String query = "SELECT * FROM commentaires WHERE id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setInt(1, id);
            ResultSet rs = pstmt.executeQuery();

            if (rs.next()) {
                return new Commentaire(
                        rs.getInt("id"),
                        rs.getInt("post_id"),
                        rs.getString("author"),
                        rs.getString("content"),
                        rs.getTimestamp("created_at")
                );
            }

        } catch (SQLException e) {
            System.err.println("Error fetching comment by ID: " + e.getMessage());
            e.printStackTrace();
        }

        return null;
    }

    /**
     * Update an existing comment
     */
    public boolean update(Commentaire commentaire) {
        String query = "UPDATE commentaires SET author = ?, content = ? WHERE id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setString(1, commentaire.getAuthor());
            pstmt.setString(2, commentaire.getContent());
            pstmt.setInt(3, commentaire.getId());

            int result = pstmt.executeUpdate();
            return result > 0;

        } catch (SQLException e) {
            System.err.println("Error updating comment: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }

    /**
     * Delete a comment by its ID
     */
    public boolean delete(int id) {
        String query = "DELETE FROM commentaires WHERE id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setInt(1, id);
            int result = pstmt.executeUpdate();
            return result > 0;

        } catch (SQLException e) {
            System.err.println("Error deleting comment: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }

    /**
     * Delete all comments for a specific post
     */
    public boolean deleteByPostId(int postId) {
        String query = "DELETE FROM commentaires WHERE post_id = ?";

        try (Connection conn = DBConnexion.getInstance();
             PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setInt(1, postId);
            int result = pstmt.executeUpdate();
            return result > 0;

        } catch (SQLException e) {
            System.err.println("Error deleting comments for post: " + e.getMessage());
            e.printStackTrace();
            return false;
        }
    }
}