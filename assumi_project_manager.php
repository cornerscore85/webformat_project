<?php

require_once 'src/Ceo.php';
require_once 'src/ProjectManager.php';
require_once 'src/Impiegato.php';

require_once "bootstrap.php";


$ceo_vectors = $entityManager->getRepository("src\Ceo")->findAll();
echo "<pre>";
print_r($ceo_vectors);
if(sizeof($ceo_vectors)>0){
    
    


    $pmCognome = $argv[1];
    $pmNome = $argv[2];
    $pmCodiceFiscale = $argv[3];
    $teamId = $argv[4];

    $records_pm = $entityManager->getRepository('src\ProjectManager')->findBy(array('codice_fiscale' => $pmCodiceFiscale));
    if(sizeof($records_pm)>0){
        echo "Il Project Manager che si sta tentando di inserire esiste già.";
    }
    else{
        $records_team = $entityManager->getRepository('src\Team')->findBy(array('id' => $teamId));
        if(sizeof($records_team)==0){
            echo "Il Team scelto non esiste.";
        }
        else{
            $ceo=$ceo_vectors[0];
            $team=$records_team[0];
            $project_manager=$ceo->assumiProjectManager($pmCognome,$pmNome,$pmCodiceFiscale,$team);
            $entityManager->persist($project_manager);
            $entityManager->flush();
        
            echo "Creato Project Manager con ID " . $project_manager->getId() . "\n";
        }

    }

    
    
}
else{
    echo "Non esiste nessun CEO - assunzione non consentita";
}