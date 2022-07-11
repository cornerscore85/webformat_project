<?php

require_once 'src/Ceo.php';
require_once 'src/Team.php';

require_once "bootstrap.php";


$ceo_vectors = $entityManager->getRepository("src\Ceo")->findAll();

if(sizeof($ceo_vectors)>0){
    
    


    $teamNome = $argv[1];
    

    $records_dev = $entityManager->getRepository('src\Team')->findBy(array('nome' => $teamNome));
    if(sizeof($records_dev)>0){
        echo "Il Team che si sta tentando di inserire esiste già.";
    }
    else{
        $ceo=$ceo_vectors[0];
        $team=$ceo->creaTeam($teamNome);
        $entityManager->persist($team);
        $entityManager->flush();
    
        echo "Creato Team con ID " . $team->getId() . "\n";

    }

    
    
}
else{
    echo "Non esiste nessun CEO - assunzione non consentita";
}