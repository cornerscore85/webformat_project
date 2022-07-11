<?php

require_once 'src/ProjectManager.php';
require_once 'src/Progetto.php';
require_once 'src/Task.php';

require_once "bootstrap.php";


$projectManagerId = $argv[1];
$progettoId = $argv[2];
$taskDescrizione=$argv[3];
$taskStatus=$argv[4];
$taskDeadline=$argv[5];

$records_projectmanager = $entityManager->getRepository('src\ProjectManager')->findBy(array('id' => $projectManagerId));

if(sizeof($records_projectmanager)==0){
    echo "Il Project Manager scelto non esiste.";
}
else{
     
    $records_progetto = $entityManager->getRepository('src\Progetto')->findBy(array('id' => $progettoId));
    if(sizeof($records_progetto)==0){
        echo "Il Progetto che si sta tentando di assegnare non esiste.";
    }
    else{
        $project_manager=$records_projectmanager[0];
        $project=$records_progetto[0];
        

        $task=$project_manager->creaTask($taskDescrizione, $taskStatus, $taskDeadline, $project);
        $entityManager->persist($task);
        $entityManager->flush();

        echo "Task " . $task->getDescrizione() ." creato correttamente ". "\n";
    }
}