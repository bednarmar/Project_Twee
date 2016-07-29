<?php

$conn = new mysqli('localhost', 'root', 'coderslab', 'Tweet_pro');

        if ($conn->connect_error){
            die("Błąd bazy, przepraszamy. ");
        }

$conn->close();