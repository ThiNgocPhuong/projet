package com.example.gedimagination;

import static com.loopj.android.http.AsyncHttpClient.blockRetryExceptionClass;
import static com.loopj.android.http.AsyncHttpClient.log;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;

import java.util.ArrayList;

public class unVote extends AppCompatActivity {
    private ConcoursDAO bdd;
    private ArrayList<String> lesId = new ArrayList<String>();
    private Button btnVote = null;
    private Spinner spinnerVote1 = null;
    private Spinner spinnerVote2 = null;
    private Spinner spinnerVote3 = null;
    RadioGroup note1 = null ;
    RadioGroup note2 = null;
    RadioGroup note3 = null;
    String ticket;
    String email;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_un_vote);
        spinnerVote1 = (Spinner) findViewById(R.id.vote1);
        spinnerVote2 = (Spinner) findViewById(R.id.vote2);
        spinnerVote3 = (Spinner) findViewById(R.id.vote3);
        btnVote = (Button) findViewById(R.id.valide);
        note1 = (RadioGroup)findViewById(R.id.note1);
        note2 = (RadioGroup)findViewById(R.id.note2);
        note3 = (RadioGroup)findViewById(R.id.note3);
        btnVote.setOnClickListener(EcouteurBouton);
        chargerSpinner();

        Intent i = getIntent();
        ticket = i.getStringExtra("ticket");
        email = i.getStringExtra("email");
    }


    public View.OnClickListener EcouteurBouton = new View.OnClickListener() {
        @Override
        public void onClick(View view){
            switch (view.getId()) {
                case R.id.valide:
                    int vote1=0;
                    int vote2=0;
                    int vote3=0;
                    switch (note1.getCheckedRadioButtonId()){
                        case R.id.note1_un:
                            vote1 = 1;
                            break;
                        case R.id.note1_deux:
                            vote1=2;
                            break;
                        case R.id.note1_trois:
                            vote1=3;
                            break;
                        case R.id.note1_quatre:
                            vote1=4;
                            break;
                        case R.id.note1_cinq:
                            vote1=5;
                            break;
                    }
                    switch (note2.getCheckedRadioButtonId()){
                        case R.id.note2_un:
                            vote2 = 1;
                            break;
                        case R.id.note2_deux:
                            vote2=2;
                            break;
                        case R.id.note2_trois:
                            vote2=3;
                            break;
                        case R.id.note2_quatre:
                            vote2=4;
                            break;
                        case R.id.note2_cinq:
                            vote2=5;
                            break;
                    }
                    switch (note3.getCheckedRadioButtonId()){
                        case R.id.note3_un:
                            vote3 = 1;
                            break;
                        case R.id.note3_deux:
                            vote3 =2;
                            break;
                        case R.id.note3_trois:
                            vote3 =3;
                            break;
                        case R.id.note3_quatre:
                            vote3 =4;
                            break;
                        case R.id.note3_cinq:
                            vote3 =5;
                            break;
                    }


                    String Id_rea1 = spinnerVote1.getSelectedItem().toString();
                    String Id_rea2 = spinnerVote2.getSelectedItem().toString();
                    String Id_rea3 = spinnerVote3.getSelectedItem().toString();
                    if (!verifRealisation(Id_rea1,Id_rea2,Id_rea3)){
                        Toast.makeText(getApplicationContext(),"Veuillez choisir des réalisations différentes", Toast.LENGTH_LONG).show();
                    } else {
                        AlertDialog.Builder alert = new AlertDialog.Builder(unVote.this);
                        alert.setTitle("Info");
                        alert.setMessage("Vos votes ont bien été pris en compte");
                        Toast.makeText(unVote.this, "erreur", Toast.LENGTH_SHORT).show();
                        alert.setPositiveButton("OK", new DialogInterface.OnClickListener(){
                            @Override
                            public void onClick(DialogInterface dialogInterface, int i) {
                                dialogInterface.dismiss();
                                Intent goBack = new Intent(unVote.this, MainActivity.class);
                                startActivity(goBack);
                            }
                        });
                        alert.show();
                    }

                    Vote v = new Vote();
                    v.setCode(ticket);
                    v.setEmail(email);
                    v.setId1(Id_rea1);
                    v.setVote1(vote1);
                    v.setId2(Id_rea2);
                    v.setVote2(vote2);
                    v.setId3(Id_rea3);
                    v.setVote3(vote3);
                    bdd = new ConcoursDAO(unVote.this);
                    bdd.ajouterVote(v);
                    log.i("Info", v.toString());
                    break;
            }
        }
    };
    public boolean verifRealisation(String id_rea1, String id_rea2, String id_rea3){
        boolean result = false;
        if(id_rea1 == id_rea2 || id_rea1 == id_rea3 || id_rea2 == id_rea3){
            return result;
        }
        return true;
    }
    public void chargerSpinner() {
        bdd = new ConcoursDAO(this);
        Cursor cursorTous = bdd.toutLesId();
        lesId.clear();
        for (cursorTous.moveToFirst(); !cursorTous.isAfterLast(); cursorTous.moveToNext()) {
            @SuppressLint("Range")
            String id = cursorTous.getString(cursorTous.getColumnIndex("id"));
            lesId.add(id);
        }
        spinnerVote1.setAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, lesId));
        spinnerVote2.setAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, lesId));
        spinnerVote3.setAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, lesId));
    }
}