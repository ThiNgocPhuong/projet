package com.example.gedimagination;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ListView;
import android.widget.Spinner;

import java.util.ArrayList;

public class Vote extends AppCompatActivity {
    Spinner spinnerVote1 = null;
    ConcoursDAO bdd;

    private ArrayList<String> lesId = new ArrayList<String>();
    private ListView listVote1 = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_vote);
        spinnerVote1 = (Spinner) findViewById(R.id.vote1);
    }

    public void chargerSpinner(){
        bdd = new ConcoursDAO(this);

    }
}