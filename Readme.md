1.       Un'azienda informatica ha degli impiegati

2.       Ogni impiegato ha un ruolo (CEO, PM, DEV)

3.       Ogni impiegato tranne il CEO è associato ad un team

4.       * Ogni impiegato ha un badge che usa per entrare / uscire dall'ufficio e registra i tempi di lavoro

5.       L'azienda lavora su progetti che il CEO assegna ad un PM

6.       Il PM per il progetto crea dei task che hanno una descrizione, uno status e una deadline (data entro la quale il task deve essere chiuso)

7.       Un task può essere assegnato ad uno o più sviluppatori (impiegato con ruolo DEV)

8.       * Un task può avere dei commit (messaggi o note) che sono fatti da uno sviluppatore

9.       Il CEO può assumere impiegati PM o DEV



   L'applicazione permette che esista un solo CEO
   Poiché CEO e impiegati normali non hanno nulla in comune ho creato una classe Impiegato da cui ereditano le classi ProjectManager e Developer.
   CEO è una classe a parte 


ISTRUZIONI UTILIZZO FUNZIONI CLI

Inizializzazione

Lanciare inizializza.php es. -> php inizializza.php Albano Salvatore LBNSVT85M14I639P
Se un CEO Esiste già il sistema risponderà che esiste già un CEO, altrimenti lo inserirà

   Crea Team

   Lanciare crea_team es. -> php crea_team.php Team1
   Se esiste già (controlla il nome) lo comunica, altrimenti lo inserisce
   
   Assumi Project Manager

   Lanciare assumi_project_manager.php es. -> php assumi_project_manager.php Albano Salvatore LBNSVT85M14I639Z 1
   Se esiste già (controlla CF) lo comunica, altrimenti lo inserisce

   Assumi Developer

   Lanciare assumi_developer.php es. -> php assumi_developer.php Albano Salvatore LBNSVT85M14I639T 1
   Se esiste già (controlla CF) lo comunica, altrimenti lo inserisce

 
   Crea Progetto

   Lanciare crea_progetto es. -> php crea_progetto.php PrimoProgetto
   Se esiste già (controlla la descrizione) lo comunica, altrimenti lo inserisce

   Assegna Progetto

   Lanciare assegna_progetto es. -> php assegna_progetto.php 1 1
   Il Primo id passato si riferisce al progetto, il secondo al project manager. Se entrambi esistono lo assegna

   Crea Task

   Lanciare crea_task es. -> php crea_task.php 2 1 TaskDiProva Inizializzato "2022-07-11"
   Se project manager e progetto esistono crea il task e lo assegna al progetto, altrimenti da errore

   Assegna Task
   






