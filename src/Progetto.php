<?php
namespace src;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require_once 'Task.php';
require_once 'ProjectManager.php';
/**
 * @ORM\Entity
 * @ORM\Table(name="progetti")
 */
class Progetto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $descrizione;

    
    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="progetto", indexBy="id")
     * @var Task[]
     */
    private $tasks;

    /**
     * Un progetto ha un project manager.
     * @ORM\OneToOne(targetEntity="ProjectManager")
     * @ORM\JoinColumn(name="projectmanager_id", referencedColumnName="id")
     */
    private $projectmanager;

    public function __construct()
    {
        
        $this->tasks = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }
    
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    public function getProjectManager(): ProjectManager
    {
        return $this->projectmanager;
    }

    public function setProjectManager(ProjectManager $pm): void
    {
        $this->projectmanager = $pm;
    }

    public function addTask(Task $task)
    {
        $this->tasks[$task->getId()] = $task;
    }

    public function getTask($id)
    {
        if (!isset($this->tasks[$id])) {
            throw new \InvalidArgumentException("Il task non fa parte del progetto selezionato.");
        }

        return $this->tasks[$id];
    }

    public function getTasks()
    {
        return $this->tasks;
    }
}