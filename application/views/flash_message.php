<?php
 
$message = $this->session->flashdata('message');
 
if ($message) {
    if ($this->session->flashdata('status'))
        echo '<div class="note note-success"><p>';
    else
        echo '<div class="note note-danger"><p>';
 
    echo $message;
    echo '</p></div>';
}