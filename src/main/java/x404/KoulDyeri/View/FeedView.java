package x404.KoulDyeri.View;

import x404.KoulDyeri.Controller.CommentaireController;
import x404.KoulDyeri.Controller.PostController;
import x404.KoulDyeri.Model.Commentaire;
import x404.KoulDyeri.Model.Post;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.scene.layout.Region;
import javafx.scene.text.Text;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.shape.Circle;
import javafx.scene.paint.Color;

import java.util.List;
import java.util.Optional;

public class FeedView {

    @FXML private TextField titleField;
    @FXML private TextArea contentField;
    @FXML private Button addPostBtn;
    @FXML private ListView<Post> postList;

    private final PostController postService = new PostController();
    private final CommentaireController commentService = new CommentaireController();

    @FXML
    public void initialize() {
        postList.setCellFactory(lv -> new KoulDyeriPostCell());

        Label placeholder = new Label("🍽️ Aucune publication pour le moment.");
        placeholder.setStyle("-fx-text-fill: #95a5a6; -fx-font-size: 15px; -fx-padding: 20;");
        postList.setPlaceholder(placeholder);

        refreshPosts();
        addPostBtn.setOnAction(e -> addPost());
    }

    private void refreshPosts() {
        try {
            var posts = postService.getAll();
            postList.getItems().setAll(posts);
            postList.refresh();
        } catch (Exception e) {
            System.err.println("Erreur chargement posts: " + e.getMessage());
        }
    }

    private void addPost() {
        String title = titleField.getText().trim();
        String content = contentField.getText().trim();

        if (!content.isEmpty()) {
            try {
                String finalTitle = title.isEmpty() ? "Gourmand" : title;
                Post newPost = new Post(finalTitle, content);
                if (postService.add(newPost)) {
                    titleField.clear();
                    contentField.clear();
                    refreshPosts();
                }
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
    }

    private class KoulDyeriPostCell extends ListCell<Post> {
        @Override
        protected void updateItem(Post post, boolean empty) {
            super.updateItem(post, empty);

            if (empty || post == null) {
                setGraphic(null);
                setText(null);
                setStyle("-fx-background-color: transparent;");
            } else {
                VBox postCard = createPostCard(post);
                setGraphic(postCard);
                setText(null);
                // Important: Forcer la cellule à ne pas dépasser la largeur de la ListView
                setStyle("-fx-background-color: transparent; -fx-padding: 0 0 20 0;");
                prefWidthProperty().bind(getListView().widthProperty().subtract(40));
                setMaxWidth(Control.USE_PREF_SIZE);
            }
        }

        private VBox createPostCard(Post post) {
            VBox card = new VBox(15);
            card.setPadding(new Insets(20));
            card.setStyle(
                    "-fx-background-color: white; " +
                            "-fx-background-radius: 15; " +
                            "-fx-border-color: #ffccbc; " +
                            "-fx-border-width: 1; " +
                            "-fx-effect: dropshadow(gaussian, rgba(211,47,47,0.05), 8, 0, 0, 3);"
            );

            // Header
            HBox header = new HBox(12);
            header.setAlignment(Pos.CENTER_LEFT);
            Circle avatar = new Circle(25, Color.web("#fff1e6"));
            avatar.setStroke(Color.web("#ffccbc"));
            VBox nameTime = new VBox(2);
            Label nameLabel = new Label(post.getTitle());
            nameLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 16px; -fx-text-fill: #d32f2f;");
            Label timeLabel = new Label("Posté le " + post.getCreatedAt().toString());
            timeLabel.setStyle("-fx-text-fill: #95a5a6; -fx-font-size: 12px;");
            nameTime.getChildren().addAll(nameLabel, timeLabel);
            Region spacer = new Region();
            HBox.setHgrow(spacer, Priority.ALWAYS);
            MenuButton optionsBtn = createOptionsMenu(() -> handleEditPost(post), () -> handleDeletePost(post));
            header.getChildren().addAll(avatar, nameTime, spacer, optionsBtn);

            // Content
            Text contentText = new Text(post.getContent());
            contentText.setStyle("-fx-font-size: 15px; -fx-fill: #3e2723;");
            // Liaison robuste pour éviter le dépassement
            contentText.wrappingWidthProperty().bind(card.widthProperty().subtract(50));

            // Actions
            Separator sep1 = new Separator();
            HBox actions = new HBox(40);
            actions.setAlignment(Pos.CENTER);
            Button likeBtn = new Button("🍴 J'aime");
            Button commentBtn = new Button("💬 Commenter");
            likeBtn.setStyle("-fx-background-color: transparent; -fx-text-fill: #d32f2f; -fx-font-weight: bold; -fx-cursor: hand;");
            commentBtn.setStyle("-fx-background-color: transparent; -fx-text-fill: #6d4c41; -fx-font-weight: bold; -fx-cursor: hand;");
            actions.getChildren().addAll(likeBtn, commentBtn);
            Separator sep2 = new Separator();

            // Comments
            VBox commentsArea = new VBox(10);
            try {
                List<Commentaire> comments = commentService.getByPostId(post.getId());
                for (Commentaire c : comments) {
                    commentsArea.getChildren().add(createCommentView(c, card));
                }
            } catch (Exception e) {}

            // Add Comment Field
            HBox addCommentBox = new HBox(10);
            addCommentBox.setAlignment(Pos.CENTER_LEFT);
            TextField newCommentField = new TextField();
            newCommentField.setPromptText("Ajouter un commentaire...");
            newCommentField.setStyle("-fx-background-color: #fff1e6; -fx-background-radius: 20; -fx-border-color: #ffccbc; -fx-border-radius: 20; -fx-padding: 10 15;");
            HBox.setHgrow(newCommentField, Priority.ALWAYS);
            newCommentField.setOnAction(e -> {
                String text = newCommentField.getText().trim();
                if (!text.isEmpty()) {
                    try {
                        Commentaire c = new Commentaire(post.getId(), "Moi", text);
                        if (commentService.add(c)) {
                            newCommentField.clear();
                            commentsArea.getChildren().add(createCommentView(c, card));
                        }
                    } catch (Exception ex) {}
                }
            });
            addCommentBox.getChildren().add(newCommentField);

            card.getChildren().addAll(header, contentText, sep1, actions, sep2, commentsArea, addCommentBox);
            return card;
        }

        private HBox createCommentView(Commentaire comment, VBox parentCard) {
            HBox commentBox = new HBox(8);
            commentBox.setAlignment(Pos.TOP_LEFT);
            VBox bubble = new VBox(4);
            bubble.setPadding(new Insets(10, 15, 10, 15));
            bubble.setStyle("-fx-background-color: #fff1e6; -fx-background-radius: 18; -fx-border-color: #ffccbc; -fx-border-width: 0.5;");
            HBox.setHgrow(bubble, Priority.ALWAYS);

            HBox cHeader = new HBox(10);
            cHeader.setAlignment(Pos.CENTER_LEFT);
            Label cAuthor = new Label(comment.getAuthor());
            cAuthor.setStyle("-fx-font-weight: bold; -fx-font-size: 13px; -fx-text-fill: #d32f2f;");
            Region cSpacer = new Region();
            HBox.setHgrow(cSpacer, Priority.ALWAYS);
            MenuButton cOptions = createOptionsMenu(() -> handleEditComment(comment), () -> handleDeleteComment(comment));
            cOptions.setStyle("-fx-background-color: transparent; -fx-padding: 0;");
            cHeader.getChildren().addAll(cAuthor, cSpacer, cOptions);

            Text cText = new Text(comment.getContent());
            cText.setStyle("-fx-fill: #3e2723; -fx-font-size: 13px;");
            cText.wrappingWidthProperty().bind(parentCard.widthProperty().subtract(100));

            bubble.getChildren().addAll(cHeader, cText);
            commentBox.getChildren().addAll(bubble);
            return commentBox;
        }

        private MenuButton createOptionsMenu(Runnable onEdit, Runnable onDelete) {
            MenuButton menuButton = new MenuButton("•••");
            menuButton.setStyle("-fx-background-color: transparent; -fx-text-fill: #95a5a6; -fx-font-weight: bold; -fx-cursor: hand;");
            MenuItem editItem = new MenuItem("📝 Modifier");
            MenuItem deleteItem = new MenuItem("🗑️ Supprimer");
            editItem.setOnAction(e -> onEdit.run());
            deleteItem.setOnAction(e -> onDelete.run());
            menuButton.getItems().addAll(editItem, deleteItem);
            return menuButton;
        }

        private void handleEditPost(Post post) {
            TextInputDialog dialog = new TextInputDialog(post.getContent());
            dialog.setTitle("Modifier");
            dialog.showAndWait().ifPresent(newContent -> {
                try {
                    post.setContent(newContent);
                    if (postService.update(post)) refreshPosts();
                } catch (Exception e) {}
            });
        }

        private void handleDeletePost(Post post) {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION, "Supprimer ?", ButtonType.YES, ButtonType.NO);
            if (alert.showAndWait().get() == ButtonType.YES) {
                try {
                    if (postService.delete(post.getId())) refreshPosts();
                } catch (Exception e) {}
            }
        }

        private void handleEditComment(Commentaire comment) {
            TextInputDialog dialog = new TextInputDialog(comment.getContent());
            dialog.setTitle("Modifier");
            dialog.showAndWait().ifPresent(newContent -> {
                try {
                    comment.setContent(newContent);
                    if (commentService.update(comment)) refreshPosts();
                } catch (Exception e) {}
            });
        }

        private void handleDeleteComment(Commentaire comment) {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION, "Supprimer ?", ButtonType.YES, ButtonType.NO);
            if (alert.showAndWait().get() == ButtonType.YES) {
                try {
                    if (commentService.delete(comment.getId())) refreshPosts();
                } catch (Exception e) {}
            }
        }
    }
}
