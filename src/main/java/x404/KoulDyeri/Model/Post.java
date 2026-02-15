package x404.KoulDyeri.Model;

import java.sql.Timestamp;
import java.time.LocalDateTime;

public class Post {
    private int id;
    private String title;
    private String content;
    private Timestamp createdAt;
    private String imagePath; // Nouveau champ

    // Constructeur pour nouveau post (avec image)
    public Post(String title, String content, String imagePath) {
        this.title = title;
        this.content = content;
        this.imagePath = imagePath;
        this.createdAt = Timestamp.valueOf(LocalDateTime.now());
    }

    // Constructeur pour post existant (depuis DB)
    public Post(int id, String title, String content, Timestamp createdAt, String imagePath) {
        this.id = id;
        this.title = title;
        this.content = content;
        this.createdAt = createdAt;
        this.imagePath = imagePath;
    }

    // Getters
    public int getId() { return id; }
    public String getTitle() { return title; }
    public String getContent() { return content; }
    public Timestamp getCreatedAt() { return createdAt; }
    public String getImagePath() { return imagePath; }

    // Setters
    public void setId(int id) { this.id = id; }
    public void setTitle(String title) { this.title = title; }
    public void setContent(String content) { this.content = content; }
    public void setCreatedAt(Timestamp createdAt) { this.createdAt = createdAt; }
    public void setImagePath(String imagePath) { this.imagePath = imagePath; }

    @Override
    public String toString() {
        return title;
    }

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
