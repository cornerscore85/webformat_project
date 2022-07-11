<?php

require_once 'src/Ceo.php';

require_once "bootstrap.php";



$records = $entityManager->getRepository("src\Ceo")->findAll();

if(sizeof($records)>0){
    echo "Esiste già un CEO - Impossibile aggiungerne un altro";
}
else{
    $ceoCognome = $argv[1];
    $ceoNome = $argv[2];
    $ceoCodiceFiscale = $argv[3];
    
    $ceo = new src\Ceo($ceoCognome,$ceoNome,$ceoCodiceFiscale);
    
    
    
    $entityManager->persist($ceo);
    $entityManager->flush();
    
    echo "Creato CEO con ID " . $ceo->getId() . "\n";
}


