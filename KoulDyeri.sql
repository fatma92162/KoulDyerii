-- ==================================
-- KoulDiery - Initial Migration v1
-- ==================================

CREATE DATABASE IF NOT EXISTS kouldiery;
USE kouldiery;

-- -------------------------------
-- POSTS TABLE
-- -------------------------------
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -------------------------------
-- COMMENTAIRES TABLE
-- -------------------------------
CREATE TABLE IF NOT EXISTS commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    author VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_comment_post
        FOREIGN KEY (post_id)
        REFERENCES posts(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- -------------------------------
-- INDEXES
-- -------------------------------
CREATE INDEX idx_comment_post ON commentaires(post_id);
CREATE INDEX idx_post_created ON posts(created_at);
