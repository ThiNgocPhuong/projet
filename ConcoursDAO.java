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

            // ajout du concurrent dans la table
            maBase.insert("Realisation", null, v);

    }
    public void ajouterVote(Vote v){

    }

    public Cursor toutLesId(){
        Cursor curseurId = maBase.rawQuery("SELECT id FROM Realisation", new String[] {});
        return curseurId;
    }
}
