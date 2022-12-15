package com.example.gedimagination;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;


public class ConcoursHelper extends SQLiteOpenHelper{
    public ConcoursHelper(Context context){
        super(context,"baseConcour.db", null,1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("CREATE TABLE Realisation ("
                + "id TEXT NOT NULL,"
                + "titre TEXT NOT NULL, "
                + "description TEXT NOT NULL);");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion){
        db.execSQL("DROP TABLE IF EXISTS Realisation");
        onCreate(db);
    }

}
