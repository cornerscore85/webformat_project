<?php

require_once 'src/Ceo.php';
require_once 'src/Progetto.php';

require_once "bootstrap.php";


$ceo_vectors = $entityManager->getRepository("src\Ceo")->findAll();

if(sizeof($ceo_vectors)>0){
    
    


    $progettoDesc = $argv[1];
    

    $records_dev = $entityManager->getRepository('src\Progetto')->findBy(array('descrizione' => $progettoDesc));
    if(sizeof($records_dev)>0){
        echo "Il Progetto che si sta tentando di inserire esiste già.";
    }
    else{
        $ceo=$ceo_vectors[0];
        $progetto=$ceo->creaProgetto($progettoDesc);
        $entityManager->persist($progetto);
        $entityManager->flush();
    
        echo "Creato Progetto con ID " . $progetto->getId() . "\n";

    }

    
    
}
else{
    echo "Non esiste nessun CEO - assunzione non consentita";
}