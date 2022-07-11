<?php

require_once 'src/Ceo.php';
require_once 'src/Developer.php';
require_once 'src/Impiegato.php';

require_once "bootstrap.php";


$ceo_vectors = $entityManager->getRepository("src\Ceo")->findAll();

if(sizeof($ceo_vectors)>0){
    
    


    $devCognome = $argv[1];
    $devNome = $argv[2];
    $devCodiceFiscale = $argv[3];

    $records_dev = $entityManager->getRepository('src\Developer')->findBy(array('codice_fiscale' => $devCodiceFiscale));
    if(sizeof($records_dev)>0){
        echo "Il Developer che si sta tentando di inserire esiste già.";
    }
    else{
        $ceo=$ceo_vectors[0];
        $developer=$ceo->assumiDeveloper($devCognome,$devNome,$devCodiceFiscale);
        $entityManager->persist($developer);
        $entityManager->flush();
    
        echo "Creato Developer con ID " . $developer->getId() . "\n";

    }

    
    
}
else{
    echo "Non esiste nessun CEO - assunzione non consentita";
}