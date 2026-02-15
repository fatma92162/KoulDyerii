package x404.KoulDyeri;

import x404.KoulDyeri.Controller.CommentaireController;
import x404.KoulDyeri.Controller.PostController;
import x404.KoulDyeri.Model.Commentaire;
import x404.KoulDyeri.Model.Post;

public class Main {

    public static void main(String[] args) {

        PostController postService = new PostController();
        CommentaireController commentService = new CommentaireController();

        // ADD POST
        Post p = new Post("First dish 🍝", "Today I cooked pasta at KoulDyeri", null);
        postService.add(p);

        // SHOW POSTS
        System.out.println("POSTS:");
        postService.getAll().forEach(System.out::println);

        // ADD COMMENT
        Commentaire c = new Commentaire(1, "Fatma", "Looks delicious 😋");
        commentService.add(c);

        // SHOW COMMENTS
        System.out.println("COMMENTS:");
        commentService.getAll().forEach(System.out::println);
    }
}
