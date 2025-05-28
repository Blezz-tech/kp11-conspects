package com.example.zzzamekti;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget. ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;

import java.util. ArrayList;

public class MainActivity extends AppCompatActivity {

    private EditText noteInput;

    private Button addNoteButton;
    private ListView notesList;

    private ArrayList<String> notes;

    private ArrayAdapter<String> adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        noteInput = findViewById(R.id.note_input);
        addNoteButton = findViewById(R.id.add_note_button);
        notesList = findViewById(R.id.notes_list);

        notes = new ArrayList<>();
        adapter = new ArrayAdapter<>( this, android.R.layout.simple_list_item_1, notes);
        notesList.setAdapter(adapter);

        addNoteButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String note = noteInput.getText().toString();
                if (!note.isEmpty()) {
                    notes.add(note);
                    adapter.notifyDataSetChanged();
                    noteInput.setText("");
                }
            }
        });
    }
}