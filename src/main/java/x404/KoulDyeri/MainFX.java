package x404.KoulDyeri;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class MainFX extends Application {

    @Override
    public void start(Stage stage) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/x404/KoulDyeri/View/feed.fxml"));
        Scene scene = new Scene(loader.load(), 500, 600);
        stage.setTitle("KoulDiery Feed");
        stage.setScene(scene);
        stage.show();
    }

    public static void main(String[] args) {
        launch();
    }
}
