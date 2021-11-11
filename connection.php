<?php
    $conn = pg_connect("postgres://qnjmevmozucnte:aff42e5b5cbc098fcb550be01c5dd70af7dd5a0b16f03f50f5a28aaa5aca3e44@ec2-54-147-76-191.compute-1.amazonaws.com:5432/d1av1lf8sjopf7");
    //$conn = pg_connect("postgresql://postgres:kieungan0711@localhost:5432/postgres");
    if(!$conn){
        die("Can not connect database");
    } 
?>