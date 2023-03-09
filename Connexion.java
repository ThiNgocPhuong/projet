package com.example.gedimagination;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Connexion extends AppCompatActivity {
    EditText ticket = null;
    EditText email = null;
    CheckBox condition=null;
    Button btnVote = null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_connexion);
        ticket = (EditText) findViewById(R.id.ticket);
        email = (EditText) findViewById(R.id.email);
        condition = (CheckBox)findViewById(R.id.condition);
        btnVote = (Button) findViewById(R.id.btnVote);

        btnVote.setOnClickListener(EcouteurBouton);
    }
    public View.OnClickListener EcouteurBouton = new View.OnClickListener(){
        @Override

        public  void onClick(View view){
            Pattern patternticket = Pattern.compile("(([A-Z-0-9]){4}[-]){2}([A-Z-0-9]){4}");
            Pattern patternEmail = Pattern.compile("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\\.[a-zA-Z0-9-]+)*$/.");
            Matcher MatcherTicket = patternticket.matcher(ticket.getText());
            boolean ValidTicket = MatcherTicket.matches();
            Matcher MatcherEmail = patternEmail.matcher(email.getText());
            boolean ValidEmail = MatcherEmail.matches();
            if(ticket.getText().length() == 0){
                Toast.makeText(getApplicationContext(), "Veuillez saisir le code", Toast.LENGTH_SHORT).show();
            }else if(email.getText().length() == 0){
                Toast.makeText(getApplicationContext(), "Veuillez saisir votre email ", Toast.LENGTH_SHORT).show();
            }else if(!ValidTicket){
                Toast.makeText(getApplicationContext(), "Code invalide", Toast.LENGTH_SHORT).show();
            }else if(!ValidEmail){
                Toast.makeText(getApplicationContext(), "Email invalide", Toast.LENGTH_SHORT).show();
            }else if(!condition.isChecked()){
                Toast.makeText(getApplicationContext(), "Veuillez accepter la collecte de donnée", Toast.LENGTH_SHORT).show();
            }else{
                Intent Vote = new Intent(Connexion.this,Vote.class);
                startActivity(Vote);
            }
        }
    };





}