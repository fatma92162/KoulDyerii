package x404.kouldyeri.service;

import x404.kouldyeri.model.Livreur;
import x404.kouldyeri.util.DBConnection;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class LivreurService {
    private final Connection con;

    public LivreurService() {
        con = DBConnection.getConnection();
    }

    public void ajouter(Livreur l) throws SQLException {
        String sql = "INSERT INTO livreur (nom, prenom, telephone, disponibilite) VALUES (?, ?, ?, ?)";
        try (PreparedStatement ps = con.prepareStatement(sql)) {
            ps.setString(1, l.getNom());
            ps.setString(2, l.getPrenom());
            ps.setString(3, l.getTelephone());
            ps.setBoolean(4, l.isDisponibilite());
            ps.executeUpdate();
        }
    }

    public void supprimer(int idLivreur) throws SQLException {
        String sql = "DELETE FROM livreur WHERE idLivreur = ?";
        try (PreparedStatement ps = con.prepareStatement(sql)) {
            ps.setInt(1, idLivreur);
            ps.executeUpdate();
        }
    }

    public void modifier(Livreur l) throws SQLException {
        String sql = "UPDATE livreur SET nom=?, prenom=?, telephone=?, disponibilite=? WHERE idLivreur=?";
        try (PreparedStatement ps = con.prepareStatement(sql)) {
            ps.setString(1, l.getNom());
            ps.setString(2, l.getPrenom());
            ps.setString(3, l.getTelephone());
            ps.setBoolean(4, l.isDisponibilite());
            ps.setInt(5, l.getIdLivreur());
            ps.executeUpdate();
        }
    }

    public List<Livreur> afficher() throws SQLException {
        List<Livreur> list = new ArrayList<>();
        String sql = "SELECT * FROM livreur ORDER BY idLivreur DESC";
        try (Statement st = con.createStatement();
             ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) {
                list.add(new Livreur(
                        rs.getInt("idLivreur"),
                        rs.getString("nom"),
                        rs.getString("prenom"),
                        rs.getString("telephone"),
                        rs.getBoolean("disponibilite")
                ));
            }
        }
        return list;
    }

    public boolean existe(int idLivreur) throws SQLException {
        String sql = "SELECT 1 FROM livreur WHERE idLivreur=?";
        try (PreparedStatement ps = con.prepareStatement(sql)) {
            ps.setInt(1, idLivreur);
            try (ResultSet rs = ps.executeQuery()) {
                return rs.next();
            }
        }
    }
}
