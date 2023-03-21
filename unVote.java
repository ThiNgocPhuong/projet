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
    EditText editTicket = null;
    EditText editEmail = null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_un_vote);
        spinnerVote1 = (Spinner) findViewById(R.id.vote1);
        spinnerVote2 = (Spinner) findViewById(R.id.vote2);
        spinnerVote3 = (Spinner) findViewById(R.id.vote3);
        btnVote = (Button) findViewById(R.id.btnVote);
        note1 = (RadioGroup)findViewById(R.id.note1);
        note2 = (RadioGroup)findViewById(R.id.note2);
        note3 = (RadioGroup)findViewById(R.id.note3);
        btnVote.setOnClickListener(EcouteurBouton);
        chargerSpinner();

        Intent i = getIntent();
        String ticket = i.getStringExtra("ticket");
        String email = i.getStringExtra("email");
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
    };

    public View.OnClickListener EcouteurBouton = new View.OnClickListener() {
        @Override
        public void onClick(View view){
            switch (view.getId()) {
                case R.id.btnVote:
                    String ticket = editTicket.getText().toString();
                    String email = editEmail.getText().toString();
                    int vote1 = 0;
                    int vote2 = 0;
                    int vote3 = 0;

                    if (note1.getCheckedRadioButtonId() == R.id.vote1)
                        vote1 = 1;
                    else if (note1.getCheckedRadioButtonId() == R.id.vote1)
                        vote1 = 2;
                    else if (note1.getCheckedRadioButtonId() == R.id.vote1)
                        vote1 = 3;
                    else if (note1.getCheckedRadioButtonId() == R.id.vote1)
                        vote1 = 4;
                    else
                        vote1 = 5;


                    if (note2.getCheckedRadioButtonId() == R.id.note2)
                        vote2 = 1;
                    else if (note2.getCheckedRadioButtonId() == R.id.note2)
                        vote2 = 2;
                    else if (note2.getCheckedRadioButtonId() == R.id.note2)
                        vote2 = 3;
                    else if (note2.getCheckedRadioButtonId() == R.id.note2)
                        vote2 = 4;
                    else
                        vote2 = 5;

                    if (note3.getCheckedRadioButtonId() == R.id.note3)
                        vote3 = 1;
                    else if (note3.getCheckedRadioButtonId() == R.id.note3)
                        vote3 = 2;
                    else if (note3.getCheckedRadioButtonId() == R.id.note3)
                        vote3 = 3;
                    else if (note3.getCheckedRadioButtonId() == R.id.note3)
                        vote3 = 4;
                    else
                        vote3 = 5;

                    String Id_rea1 = spinnerVote1.getSelectedItem().toString();
                    String Id_rea2 = spinnerVote2.getSelectedItem().toString();
                    String Id_rea3 = spinnerVote3.getSelectedItem().toString();
                    if (!verifRealisation(Id_rea1,Id_rea2,Id_rea3)){
                        Toast.makeText(getApplicationContext(),"Veuillez choisir des réalisations différentes", Toast.LENGTH_LONG).show();
                    } else {
                        AlertDialog.Builder alert = new AlertDialog.Builder(unVote.this);
                        alert.setTitle("Info");
                        alert.setMessage("Vos votes ont bien été pris en compte");
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
                    v.setVote1(vote1);
                    v.setVote2(vote2);
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

}
