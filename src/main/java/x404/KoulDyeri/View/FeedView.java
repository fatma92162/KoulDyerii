package x404.KoulDyeri.View;

import x404.KoulDyeri.Controller.CommentaireController;
import x404.KoulDyeri.Controller.PostController;
import x404.KoulDyeri.Model.Commentaire;
import x404.KoulDyeri.Model.Post;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.shape.Circle;
import javafx.scene.text.Text;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javafx.geometry.Side;

import java.io.File;
import java.io.IOException;
import java.util.List;

public class FeedView {

    @FXML private TextField titleField;
    @FXML private TextArea contentField;
    @FXML private Button addPostBtn;
    @FXML private Button uploadImageBtn;
    @FXML private ListView<Post> postList;
    @FXML private Button profileMenuBtn;

    private String selectedImagePath = null;

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
        uploadImageBtn.setOnAction(e -> chooseImage());
    }

    private void chooseImage() {
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Choisir une image");
        fileChooser.getExtensionFilters().add(
                new FileChooser.ExtensionFilter("Images", "*.png", "*.jpg", "*.jpeg", "*.gif")
        );
        File selectedFile = fileChooser.showOpenDialog(addPostBtn.getScene().getWindow());
        if (selectedFile != null) {
            selectedImagePath = selectedFile.getAbsolutePath();
        }
    }

    private void refreshPosts() {
        try {
            List<Post> posts = postService.getAll();
            postList.getItems().setAll(posts);
            postList.refresh();
        } catch (Exception e) {
            System.err.println("Erreur chargement posts: " + e.getMessage());
        }
    }

    private void addPost() {
        String title = titleField.getText().trim();
        String content = contentField.getText().trim();

        // ===== CONTROLE DE SAISIE =====
        if (content.isEmpty()) {
            Alert alert = new Alert(Alert.AlertType.WARNING);
            alert.setTitle("Champ vide");
            alert.setHeaderText(null);
            alert.setContentText("⚠️ Veuillez écrire un contenu avant de publier.");
            alert.showAndWait();
            return; // stop ici
        }

        try {
            String finalTitle = title.isEmpty() ? "Gourmand" : title;

            Post newPost = new Post(finalTitle, content, selectedImagePath);

            if (postService.add(newPost)) {
                titleField.clear();
                contentField.clear();
                selectedImagePath = null;
                refreshPosts();
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    // ---------------- LOGIQUE DE DECONNEXION ----------------
    @FXML
    private void handleProfileClick() {
        ContextMenu menu = new ContextMenu();
        MenuItem logoutItem = new MenuItem("Se déconnecter");

        logoutItem.setOnAction(e -> {
            try {
                Parent loginRoot = FXMLLoader.load(getClass().getResource("LoginView.fxml"));
                Stage stage = (Stage) profileMenuBtn.getScene().getWindow();
                Scene scene = new Scene(loginRoot);
                stage.setScene(scene);
                stage.setTitle("KoulDyeri - Connexion");
                stage.centerOnScreen();
                stage.show();
            } catch (IOException ex) {
                ex.printStackTrace();
                Alert alert = new Alert(Alert.AlertType.ERROR, "Impossible de charger la page de connexion.");
                alert.showAndWait();
            }
        });

        menu.getItems().add(logoutItem);
        menu.show(profileMenuBtn, Side.BOTTOM, 0, 0);
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
                setStyle("-fx-background-color: transparent; -fx-padding: 0 0 20 0;");
                prefWidthProperty().bind(getListView().widthProperty().subtract(40));
                setMaxWidth(Control.USE_PREF_SIZE);
            }
        }

        private VBox createPostCard(Post post) {
            VBox card = new VBox(15);
            card.setPadding(new Insets(20));
            card.setStyle("-fx-background-color: white; -fx-background-radius: 15; -fx-border-color: #ffccbc; -fx-border-width: 1; -fx-effect: dropshadow(gaussian, rgba(211,47,47,0.05), 8, 0, 0, 3);");

            if (post.getImagePath() != null) {
                try {
                    ImageView imageView = new ImageView(new Image("file:" + post.getImagePath()));
                    imageView.setFitWidth(600);
                    imageView.setPreserveRatio(true);
                    card.getChildren().add(imageView);
                } catch (Exception e) {
                    System.err.println("Erreur chargement image : " + e.getMessage());
                }
            }

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

            Text contentText = new Text(post.getContent());
            contentText.setStyle("-fx-font-size: 15px; -fx-fill: #3e2723;");
            contentText.wrappingWidthProperty().bind(card.widthProperty().subtract(50));

            Separator sep1 = new Separator();
            HBox actions = new HBox(20);
            actions.setAlignment(Pos.CENTER_LEFT);

            int[] reactionCounts = new int[5];
            MenuButton reactBtn = new MenuButton("❤️ J'aime");
            reactBtn.setStyle("-fx-background-color: transparent; -fx-font-weight: bold; -fx-cursor: hand;");
            String[] emojis = {"❤️","😆","😮","😢","😡"};
            String[] names = {"J'aime","Haha","Wow","Triste","Grr"};

            for (int i = 0; i < emojis.length; i++) {
                final int idx = i;
                MenuItem item = new MenuItem(emojis[i] + " " + names[i]);
                item.setOnAction(e -> {
                    reactionCounts[idx]++;
                    reactBtn.setText(emojis[idx] + " " + names[idx] + " " + reactionCounts[idx]);
                });
                reactBtn.getItems().add(item);
            }

            TextField newCommentField = new TextField();
            newCommentField.setPromptText("Ajouter un commentaire...");
            newCommentField.setStyle("-fx-background-color: #fff1e6; -fx-background-radius: 20; -fx-border-color: #ffccbc; -fx-border-radius: 20; -fx-padding: 10 15;");
            HBox.setHgrow(newCommentField, Priority.ALWAYS);

            Button commentBtn = new Button("💬 Commenter");
            commentBtn.setStyle("-fx-background-color: transparent; -fx-font-weight: bold; -fx-cursor: hand;");
            commentBtn.setOnAction(e -> newCommentField.requestFocus());

            actions.getChildren().addAll(reactBtn, commentBtn);
            Separator sep2 = new Separator();

            VBox commentsArea = new VBox(10);
            try {
                List<Commentaire> comments = commentService.getByPostId(post.getId());
                for (Commentaire c : comments) {
                    ajouterCommentaireDansFeed(c, commentsArea, commentService);
                }
            } catch (Exception e) { e.printStackTrace(); }

            HBox addCommentBox = new HBox(10);
            addCommentBox.setAlignment(Pos.CENTER_LEFT);
            addCommentBox.getChildren().add(newCommentField);

            // ===== CONTROLE DE SAISIE POUR LES COMMENTAIRES =====
            newCommentField.setOnAction(e -> {
                String text = newCommentField.getText().trim();
                if (text.isEmpty()) {
                    Alert alert = new Alert(Alert.AlertType.WARNING);
                    alert.setTitle("Champ vide");
                    alert.setHeaderText(null);
                    alert.setContentText("⚠️ Veuillez écrire un commentaire avant de publier.");
                    alert.showAndWait();
                    return;
                }
                try {
                    Commentaire c = new Commentaire(post.getId(), "Moi", text);
                    if (commentService.add(c)) {
                        newCommentField.clear();
                        ajouterCommentaireDansFeed(c, commentsArea, commentService);
                    }
                } catch (Exception ex) { ex.printStackTrace(); }
            });

            card.getChildren().addAll(header, contentText, sep1, actions, sep2, commentsArea, addCommentBox);
            return card;
        }

        private void ajouterCommentaireDansFeed(Commentaire commentaire, VBox commentsArea, CommentaireController commentaireController) {
            VBox commentBox = new VBox();
            commentBox.setPadding(new Insets(10));
            commentBox.setSpacing(5);
            commentBox.setStyle("-fx-border-color: #ffccbc; -fx-border-width: 0.5; -fx-background-color: #fff8f0; -fx-background-radius: 12;");

            HBox commentHeader = new HBox(10);
            commentHeader.setAlignment(Pos.CENTER_LEFT);
            Label authorLabel = new Label(commentaire.getAuthor());
            authorLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: #d32f2f;");
            Region cSpacer = new Region();
            HBox.setHgrow(cSpacer, Priority.ALWAYS);
            MenuButton cOptions = createOptionsMenu(() -> handleEditComment(commentaire), () -> handleDeleteComment(commentaire, commentsArea, commentBox));
            cOptions.setStyle("-fx-background-color: transparent; -fx-padding: 0;");
            commentHeader.getChildren().addAll(authorLabel, cSpacer, cOptions);

            Label dateLabel = new Label("Posté le " + commentaire.getCreatedAt());
            dateLabel.setStyle("-fx-font-size: 10; -fx-text-fill: gray;");
            Label contentLabel = new Label(commentaire.getContent());
            contentLabel.setWrapText(true);

            HBox buttonsBox = new HBox(10);
            int[] reactionCounts = new int[5];
            MenuButton reactBtn = new MenuButton("❤️ 0");
            reactBtn.setStyle("-fx-background-color: transparent; -fx-font-weight: bold; -fx-cursor: hand;");
            String[] emojis = {"❤️","😆","😮","😢","😡"};
            for (int i = 0; i < emojis.length; i++) {
                final int idx = i;
                MenuItem item = new MenuItem(emojis[i]);
                item.setOnAction(e -> {
                    reactionCounts[idx]++;
                    reactBtn.setText(emojis[idx] + " " + reactionCounts[idx]);
                });
                reactBtn.getItems().add(item);
            }

            Button replyBtn = new Button("Répondre");
            replyBtn.setStyle("-fx-background-color: transparent; -fx-font-weight: bold; -fx-cursor: hand;");
            replyBtn.setOnAction(e -> {
                TextInputDialog dialog = new TextInputDialog();
                dialog.setTitle("Répondre au commentaire");
                dialog.setHeaderText("Répondre à " + commentaire.getAuthor());
                dialog.setContentText("Votre commentaire :");
                dialog.showAndWait().ifPresent(response -> {
                    // ===== CONTROLE DE SAISIE POUR LES RÉPONSES =====
                    if (response.isBlank()) {
                        Alert alert = new Alert(Alert.AlertType.WARNING);
                        alert.setTitle("Champ vide");
                        alert.setHeaderText(null);
                        alert.setContentText("⚠️ Veuillez écrire un commentaire avant de publier.");
                        alert.showAndWait();
                        return;
                    }

                    Commentaire newComment = new Commentaire(commentaire.getPostId(), "Moi", response);
                    try {
                        if (commentaireController.add(newComment)) {
                            ajouterCommentaireDansFeed(newComment, commentsArea, commentaireController);
                        }
                    } catch (Exception ex) { ex.printStackTrace(); }
                });
            });

            buttonsBox.getChildren().addAll(reactBtn, replyBtn);
            commentBox.getChildren().addAll(commentHeader, dateLabel, contentLabel, buttonsBox);
            commentsArea.getChildren().add(commentBox);
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
            dialog.setHeaderText("Modifier votre publication :");

            dialog.showAndWait().ifPresent(newContent -> {

                String text = newContent.trim();

                // ===== CONTROLE DE SAISIE =====
                if (text.isEmpty()) {
                    Alert alert = new Alert(Alert.AlertType.WARNING);
                    alert.setTitle("Champ vide");
                    alert.setHeaderText(null);
                    alert.setContentText("⚠️ Le contenu ne peut pas être vide.");
                    alert.showAndWait();
                    return;
                }

                if (text.length() < 5) {
                    Alert alert = new Alert(Alert.AlertType.WARNING);
                    alert.setTitle("Texte trop court");
                    alert.setHeaderText(null);
                    alert.setContentText("⚠️ Le contenu doit contenir au moins 5 caractères.");
                    alert.showAndWait();
                    return;
                }

                try {
                    post.setContent(text);
                    if (postService.update(post)) {
                        refreshPosts();
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            });
        }

        private void handleDeletePost(Post post) {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION, "Supprimer ?", ButtonType.YES, ButtonType.NO);
            if (alert.showAndWait().get() == ButtonType.YES) {
                try {
                    if (postService.delete(post.getId())) refreshPosts();
                } catch (Exception e) { e.printStackTrace(); }
            }
        }

        private void handleEditComment(Commentaire comment) {
            TextInputDialog dialog = new TextInputDialog(comment.getContent());
            dialog.setTitle("Modifier le commentaire");
            dialog.setHeaderText("Modifier votre message :");

            dialog.showAndWait().ifPresent(newContent -> {

                String text = newContent.trim();

                // ===== CONTROLE DE SAISIE =====
                if (text.isEmpty()) {
                    Alert alert = new Alert(Alert.AlertType.WARNING);
                    alert.setTitle("Champ vide");
                    alert.setHeaderText(null);
                    alert.setContentText("⚠️ Le commentaire ne peut pas être vide.");
                    alert.showAndWait();
                    return;
                }

                if (text.length() < 2) {
                    Alert alert = new Alert(Alert.AlertType.WARNING);
                    alert.setTitle("Texte trop court");
                    alert.setHeaderText(null);
                    alert.setContentText("⚠️ Le commentaire doit contenir au moins 2 caractères.");
                    alert.showAndWait();
                    return;
                }

                try {
                    comment.setContent(text);
                    if (commentService.update(comment)) {
                        refreshPosts();
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            });
        }


        private void handleDeleteComment(Commentaire comment, VBox commentsArea, VBox commentBox) {
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION, "Supprimer ce commentaire ?", ButtonType.YES, ButtonType.NO);
            if (alert.showAndWait().get() == ButtonType.YES) {
                try {
                    if (commentService.delete(comment.getId())) commentsArea.getChildren().remove(commentBox);
                } catch (Exception e) { e.printStackTrace(); }
            }
        }
    }
}