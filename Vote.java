package com.example.gedimagination;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Spinner;

import java.util.ArrayList;

public class Vote extends AppCompatActivity {
    private ConcoursDAO bdd;
    private ArrayList<String> lesId = new ArrayList<String>();
    Spinner spinnerVote1 = null;
    Spinner spinnerVote2 = null;
    Spinner spinnerVote3 = null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_vote);

        spinnerVote1 = (Spinner) findViewById(R.id.vote1);
        spinnerVote2 = (Spinner) findViewById(R.id.vote2);
        spinnerVote3 = (Spinner) findViewById(R.id.vote3);

        chargerSpinner();
    }
    public void chargerSpinner(){
        bdd = new ConcoursDAO(this);
        Cursor cursorTous =  bdd.toutLesId();
        lesId.clear();
        for(cursorTous.moveToFirst(); !cursorTous.isAfterLast(); cursorTous.moveToNext()){
            @SuppressLint("Range")
                    String id = cursorTous.getString(cursorTous.getColumnIndex("id"));
            lesId.add(id);
        }
        spinnerVote1.setAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item,lesId));
        spinnerVote2.setAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item,lesId));
        spinnerVote3.setAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item,lesId));

    }

}
