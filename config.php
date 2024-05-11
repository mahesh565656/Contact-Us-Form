<?php
$conn = mysqli_connect('localhost', 'root', '', 'contact_form');

if (!$conn) {        // Validating Database Connection
    echo "Database Not Connected";
}
