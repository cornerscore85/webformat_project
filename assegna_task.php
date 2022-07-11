<?php

require_once 'src/ProjectManager.php';
require_once 'src/Developer.php';
require_once 'src/Task.php';

require_once "bootstrap.php";


$projectManagerId = $argv[1];
$taskId = $argv[2];
$developerId=$argv[3];

$records_projectmanager = $entityManager->getRepository('src\ProjectManager')->findBy(array('id' => $projectManagerId));

if(sizeof($records_projectmanager)==0){
    echo "Il Project Manager scelto non esiste.";
}
else{
     
    $records_task = $entityManager->getRepository('src\Task')->findBy(array('id' => $taskId));
    if(sizeof($records_task)==0){
        echo "Il Task che si sta tentando di assegnare non esiste.";
    }
    else{
        
        $records_developer = $entityManager->getRepository('src\Developer')->findBy(array('id' => $developerId));
        if(sizeof($records_developer)==0){
            echo "Il Developer che si sta tentando di cercare non esiste.";
        }
        else{
            
            $project_manager=$records_projectmanager[0];
            $task=$records_task[0];
            $developer=$records_developer[0];
            

            $project_manager->assegnaTask($task, $developer);
            
            $entityManager->flush();

            echo "Task " . $task->getDescrizione() ." assegnato correttamente ". "\n";
        }
    }
}