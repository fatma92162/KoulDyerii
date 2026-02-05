package x404.KoulDyeri.Model;

import java.sql.Timestamp;
import java.time.LocalDateTime;

public class Post {
    private int id;
    private String title;
    private String content;
    private Timestamp createdAt;

    // Constructor for creating new posts (without ID and timestamp)
    public Post(String title, String content) {
        this.title = title;
        this.content = content;
        this.createdAt = Timestamp.valueOf(LocalDateTime.now());
    }

    // Constructor for existing posts (with ID and timestamp from database)
    public Post(int id, String title, String content, Timestamp createdAt) {
        this.id = id;
        this.title = title;
        this.content = content;
        this.createdAt = createdAt;
    }

    // Getters
    public int getId() {
        return id;
    }

    public String getTitle() {
        return title;
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

    public void setTitle(String title) {
        this.title = title;
    }

    public void setContent(String content) {
        this.content = content;
    }

    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }

    // toString for display in ListView
    @Override
    public String toString() {
        return title;
    }

    // Equals and HashCode for proper comparison
    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Post post = (Post) o;
        return id == post.id;
    }

    @Override
    public int hashCode() {
        return Integer.hashCode(id);
    }
}