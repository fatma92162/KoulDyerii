package x404.kouldyeri;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

public class MainFX extends Application {

    @Override
    public void start(Stage stage) {
        try {
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/x404/kouldyeri/view/LoginView.fxml")
            );

            Scene scene = new Scene(loader.load());

            stage.setTitle("KoulDyeri - Connexion");
            stage.setScene(scene);
            stage.setResizable(false); // Optionnel: empêcher le redimensionnement
            stage.show();

        } catch (IOException e) {
            System.err.println("Erreur lors du chargement de LoginView.fxml");
            e.printStackTrace();
        } catch (Exception e) {
            System.err.println("Erreur inattendue: " + e.getMessage());
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        launch(args);
    }
}