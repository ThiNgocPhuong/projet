package com.example.gedimagination;
import static com.loopj.android.http.AsyncHttpClient.log;

import androidx.appcompat.app.AppCompatActivity;
// inclusion des packages nécessaires
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.JsonHttpResponseHandler;

import org.json.JSONArray;
import org.json.JSONException;

import cz.msebera.android.httpclient.Header;

public class MainActivity extends AppCompatActivity {
    private Button btnImporter = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        ConcoursDAO bdd;
        bdd = new ConcoursDAO(MainActivity.this);

        btnImporter = (Button) findViewById(R.id.btnImporter);

        btnImporter.setOnClickListener(EcouteurBouton);
    }
    public View.OnClickListener EcouteurBouton = new View.OnClickListener() {
        @Override
        public void onClick(View view) {
            //Requête HTTP GET
            String urlI= "http://localhost/projet/PHPprojet/realisation.php";
            AsyncHttpClient requestI = new AsyncHttpClient();
            requestI.get(urlI, new JsonHttpResponseHandler() {
                @Override
                public void onSuccess(int statusCode, Header[] headers, JSONArray response) {
                    super.onSuccess(statusCode, headers, response);

                    ConcoursDAO bdd = new ConcoursDAO(MainActivity.this);
                    for (int i = 0; i < response.length(); i++) {
                        try {
                            String id = response.getJSONObject(i).getString("id_realisation");
                            String titre = response.getJSONObject(i).getString("titre_realisation");
                            String description = response.getJSONObject(i).getString("description_realisation");
                            Realisation R = new Realisation();
                            R.setId(id);
                            R.setTitre(titre);
                            R.setDescription(description);
                            log.i("info", R.toString());
                            bdd.ajouterRealisation(R);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }
            });
        }
    };
}