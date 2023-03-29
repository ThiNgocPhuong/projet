package com.example.gedimagination;
import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.Cursor;


public class ConcoursDAO {
    private SQLiteDatabase maBase;
    private ConcoursHelper monHelper;

    public ConcoursDAO(Context context){
        monHelper = new ConcoursHelper(context);
        maBase = monHelper.getWritableDatabase();
    }

    public void supprimerTous(){
        maBase.delete("realisation", null, null);
    }

    public void ajouterRealisation(Realisation r) {

            //création d'un ContentValues
            ContentValues v = new ContentValues();

            // ajout des propriétés au ContentValues
            v.put("id", r.getId());
            v.put("titre", r.getTitre());
            v.put("description", r.getDescription());
            v.put("debut",r.getDebut());
            v.put("fin", r.getFin());
            v.put("nbGaime",r.getNbGaime());

            // ajout du concurrent dans la table
            maBase.insert("Realisation", null, v);

    }
    public void ajouterVote(Vote v){
        ContentValues c =  new ContentValues();

        c.put("code", v.getCode());
        c.put("email", v.getEmail());
        c.put("date", v.getDate());
        c.put("id1", v.getId1());
        c.put("vote1",v.getVote1());
        c.put("id2",v.getId2());
        c.put("vote2",v.getVote2());
        c.put("id3",v.getId3());
        c.put("vote3",v.getVote3());

        maBase.insert("Vote", null,c);
    }

    public Cursor toutLesId(){
        Cursor curseurId = maBase.rawQuery("SELECT id FROM Realisation", new String[] {});
        return curseurId;
    }

    public Cursor classement(){
        Cursor classement = maBase.rawQuery("SELECT id, titre, nbGaime FROM Realisation ORDER BY nbGaime DESC", new String[] {});
        return classement;
    }

    public void ajoutGaime(String id, Integer gaime){
        maBase.execSQL("UPDATE Realisation SET nbGaime = nbGaime +" + gaime + " WHERE id =" + id + " ");
    }
}
