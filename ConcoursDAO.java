package com.example.gedimagination;
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


}
