package com.prospective.user.myapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import org.json.JSONObject;

public class MainActivity extends AppCompatActivity {

    Button b1;
    EditText et1;

    String request_url = "http://subbu/pa/admin/api/v1.0/controller/user-controller.php?action=userRegister";

    JSONObject

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

    b1 = (Button)findViewById(R.id.button);
    et1 = (EditText)findViewById(R.id.editText);

    b1.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View view) {

            HttpResponse response = null;
            try {
                HttpClient client = new DefaultHttpClient();
                HttpGet request = new HttpGet();
                request.setURI(new URI(
                        "http://subbu/pa/admin/api/v1.0/controller/user-controller.php?action=userRegister  "));
                response = client.execute(request);
            } catch (URISyntaxException e) {
                e.printStackTrace();
            } catch (ClientProtocolException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }

            String responseText = null;
            try {
                responseText = EntityUtils.toString(response.getEntity());
            } catch (ParseException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
                Log.i("Parse Exception", e + "");

            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
                Log.i("IO Exception 2", e + "");

            }

            Log.i("responseText", responseText);

            Toast.makeText(MainActivity.this, responseText + "",
                    Toast.LENGTH_SHORT).show();

        }



    }
    });

    }
}
