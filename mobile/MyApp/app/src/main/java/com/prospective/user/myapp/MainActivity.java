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




        }
    });

    }
}
