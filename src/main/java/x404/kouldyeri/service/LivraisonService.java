package x404.kouldyeri.service;

import x404.kouldyeri.model.Livraison;
import x404.kouldyeri.util.DBConnection;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class LivraisonService {
    private final Connection con = DBConnection.getConnection();

    public void ajouter(Livraison l) throws SQLException {
        String sql = "INSERT INTO livraison (adresse, statutLivraison, idCommande) VALUES (?,?,?)";
        PreparedStatement ps = con.prepareStatement(sql);
        ps.setString(1, l.getAdresse());
        ps.setString(2, l.getStatutLivraison());
        ps.setInt(3, l.getIdCommande());
        ps.executeUpdate();
    }

    public void supprimer(int idLivraison) throws SQLException {
        String sql = "DELETE FROM livraison WHERE idLivraison=?";
        PreparedStatement ps = con.prepareStatement(sql);
        ps.setInt(1, idLivraison);
        ps.executeUpdate();
    }

    public void modifier(Livraison l) throws SQLException {
        String sql = "UPDATE livraison SET adresse=?, statutLivraison=?, idCommande=? WHERE idLivraison=?";
        PreparedStatement ps = con.prepareStatement(sql);
        ps.setString(1, l.getAdresse());
        ps.setString(2, l.getStatutLivraison());
        ps.setInt(3, l.getIdCommande());
        ps.setInt(4, l.getIdLivraison());
        ps.executeUpdate();
    }

    public List<Livraison> afficher() throws SQLException {
        List<Livraison> list = new ArrayList<>();
        String sql = "SELECT * FROM livraison";
        Statement st = con.createStatement();
        ResultSet rs = st.executeQuery(sql);

        while (rs.next()) {
            Livraison l = new Livraison();
            l.setIdLivraison(rs.getInt("idLivraison"));
            l.setAdresse(rs.getString("adresse"));
            l.setStatutLivraison(rs.getString("statutLivraison"));
            l.setIdCommande(rs.getInt("idCommande"));
            list.add(l);
        }
        return list;
    }
}
