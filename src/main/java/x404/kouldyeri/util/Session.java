package x404.kouldyeri.util;

import x404.kouldyeri.model.Utilisateur;

public class Session {

    private static Utilisateur currentUser;

    public static void setCurrentUser(Utilisateur user) {
        currentUser = user;
    }

    public static Utilisateur getCurrentUser() {
        return currentUser;
    }

    public static boolean isAdmin() {
        return currentUser != null &&
                "ADMIN".equalsIgnoreCase(currentUser.getRole());
    }
}
