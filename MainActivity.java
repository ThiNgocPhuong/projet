package com.example.gedimagination;
import static com.loopj.android.http.AsyncHttpClient.log;

import androidx.appcompat.app.AppCompatActivity;
// inclusion des packages nécessaires
import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.JsonHttpResponseHandler;

import org.json.JSONArray;
import org.json.JSONException;

import java.util.Calendar;
import java.util.Date;

import cz.msebera.android.httpclient.Header;

public class MainActivity extends AppCompatActivity {
    private Button btnImporter = null;
    private Button btnExport = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btnImporter = (Button) findViewById(R.id.btnImporter);
        btnExport = (Button) findViewById(R.id.btnExporter);

        btnImporter.setOnClickListener(EcouteurBouton);
        btnExport.setOnClickListener(EcouteurBouton);

        Date actuel = Calendar.getInstance().getTime();
        Date debut = new Date(122, 11, 15);
        Date fin = new Date(123, 12, 30);


    }

    public View.OnClickListener EcouteurBouton = new View.OnClickListener() {
        @SuppressLint("Range")
        @Override
        public void onClick(View view) {
            switch (view.getId()) {
                case R.id.btnImporter:
                    // Requête HTTP GET
                    String urlI = "http://10.0.2.2/projet/PHPprojet/realisation.php";
                    AsyncHttpClient requestI = new AsyncHttpClient();

                    requestI.get(urlI, new JsonHttpResponseHandler() {
                        @Override
                        public void onSuccess(int statusCode, Header[] headers, JSONArray response) {
                            super.onSuccess(statusCode, headers, response);
                            Log.i("donnée", response.toString());
                            // Deserialisation du flux JSON
                            ConcoursDAO bdd;

                            bdd = new ConcoursDAO(MainActivity.this);
                            bdd.supprimerTous();

                            for (int i = 0; i < response.length(); i++) {
                                try {
                                    String id = response.getJSONObject(i).getString("id_realisation");
                                    String titre = response.getJSONObject(i).getString("titre_realisation");
                                    String description = response.getJSONObject(i).getString("description_realisation");
                                    String debut = response.getJSONObject(i).getString("date_debut_realisation");
                                    String fin = response.getJSONObject(i).getString("date_fin_realisation");

                                    Realisation R = new Realisation();
                                    R.setId(id);
                                    R.setTitre(titre);
                                    R.setDescription(description);
                                    R.setDebut(debut);
                                    R.setFin(fin);

                                    Log.i("info", R.toString());
                                    bdd.ajouterRealisation(R);
                                } catch (JSONException e) {
                                    e.printStackTrace();
                                }
                            }
                            Toast.makeText(getApplicationContext(), "Imporation terminée", Toast.LENGTH_LONG).show();
                        }

                        @Override
                        public void onFailure(int statusCode, Header[] headers, String responseString, Throwable throwable) {
                            super.onFailure(statusCode, headers, responseString, throwable);
                            Log.i("Erreur", String.valueOf(statusCode) + "Erreur = " + responseString);
                            Toast.makeText(getApplicationContext(), "Echec de l'importation", Toast.LENGTH_LONG).show();
                        }
                    });
            }
        }
    };
}


