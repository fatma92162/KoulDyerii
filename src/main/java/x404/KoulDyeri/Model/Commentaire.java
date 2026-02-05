package x404.KoulDyeri.Model;

import java.sql.Timestamp;
import java.time.LocalDateTime;

public class Commentaire {
    private int id;
    private int postId;
    private String author;
    private String content;
    private Timestamp createdAt;

    // Constructor for creating new comments (without ID and timestamp)
    public Commentaire(int postId, String author, String content) {
        this.postId = postId;
        this.author = author;
        this.content = content;
        this.createdAt = Timestamp.valueOf(LocalDateTime.now());
    }

    // Constructor for existing comments (with ID and timestamp from database)
    public Commentaire(int id, int postId, String author, String content, Timestamp createdAt) {
        this.id = id;
        this.postId = postId;
        this.author = author;
        this.content = content;
        this.createdAt = createdAt;
    }

    // Getters
    public int getId() {
        return id;
    }

    public int getPostId() {
        return postId;
    }

    public String getAuthor() {
        return author;
    }

    public String getContent() {
        return content;
    }

    public Timestamp getCreatedAt() {
        return createdAt;
    }

    // Setters
    public void setId(int id) {
        this.id = id;
    }

    public void setPostId(int postId) {
        this.postId = postId;
    }

    public void setAuthor(String author) {
        this.author = author;
    }

    public void setContent(String content) {
        this.content = content;
    }

    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }

    // toString for display
    @Override
    public String toString() {
        return author + ": " + content;
    }

    // Equals and HashCode for proper comparison
    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Commentaire that = (Commentaire) o;
        return id == that.id;
    }

    @Override
    public int hashCode() {
        return Integer.hashCode(id);
    }
}