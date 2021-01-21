<?php 
    $todos = json_decode( file_get_contents('../todo.db'), true );

    if( isset($_POST['i']) && is_numeric($_POST['i']) ){
        $index = $_POST['i'];
    }else{
        exit("Greska 1 - nepravilan index");
    }
    if( isset($_POST['tekst']) && $_POST['tekst'] != "" ){
        $tekst = $_POST['tekst'];
    }else{
        exit("Greska 1 - morate unijeti tekst...");
    }
    if( isset($_POST['opis']) && $_POST['opis'] != "" ){
        $opis = $_POST['opis'];
    }else{
        exit("Greska 2 - morate unijeti opis...");
    }

    //izmjena
    $todos[$index]['tekst']=$tekst;
    $todos[$index]['opis']=$opis;

    //cuvanje
    if( file_put_contents( '../todo.db', json_encode($todos) ) ){
        echo "OK";
    }else{
        echo "Greska 3 - pogresan upis podataka...";
    }

?>