package com.example.gedimagination;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;


public class ConcoursHelper extends SQLiteOpenHelper{
    public ConcoursHelper(Context context){
        super(context,"baseConcour.db", null,3);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("CREATE TABLE Realisation ("
                + "id TEXT NOT NULL,"
                + "titre TEXT NOT NULL, "
                + "description TEXT NOT NULL,"
                +"debut TEXT NOT NULL,"
                +"fin TEXT NOT NULL,"
                +"nbGaime INTEGER);");

        db.execSQL("CREATE TABLE Vote("
                + "code TEXT NOT NULL,"
                + "email TEXT NOT NULL,"
                + "date TEXT NOT NULL,"
                + "id1 TEXT NOT NULL,"
                + "vote1 INTEGER NOT NULL,"
                + "id2 TEXT NOT NULL,"
                + "vote2 INTEGER NOT NULL,"
                + "id3 TEXT NOT NULL,"
                + "vote3 INTEGER NOT NULL);");

    }


    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion){
        db.execSQL("DROP TABLE IF EXISTS Realisation");
        db.execSQL("DROP TABLE IF EXISTS Vote");
        onCreate(db);
    }


}