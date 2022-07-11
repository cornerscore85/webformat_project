<?php

require_once 'src/Ceo.php';
require_once 'src/Progetto.php';
require_once 'src/ProjectManager.php';

require_once "bootstrap.php";


$ceo_vectors = $entityManager->getRepository("src\Ceo")->findAll();

if(sizeof($ceo_vectors)>0){
    
    


    $progettoId = $argv[1];
    $projectManagerId = $argv[2];

    

    $records_progetto = $entityManager->getRepository('src\Progetto')->findBy(array('id' => $progettoId));
    if(sizeof($records_progetto)==0){
        echo "Il Progetto che si sta tentando di assegnare non esiste.";
    }
    else{
        
        $records_projectmanager = $entityManager->getRepository('src\ProjectManager')->findBy(array('id' => $projectManagerId));
        if(sizeof($records_projectmanager)==0){
            echo "Il Project Manager scelto non esiste.";
        }
        else{
            $ceo=$ceo_vectors[0];
            
            $project_manager=$records_projectmanager[0];
            $progetto=$records_progetto[0];

            $ceo->assegnaProgetto($project_manager,$progetto);
            $entityManager->flush();
        
            echo "Progetto " . $progetto->getDescrizione() ." Assegnato Correttamente al Project Manager ". $project_manager->getCognome()." ".$project_manager->getNome(). "\n";
        }
    }

    
    
}
else{
    echo "Non esiste nessun CEO - assunzione non consentita";
}