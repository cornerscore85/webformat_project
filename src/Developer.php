<?php
namespace src;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require_once 'Impiegato.php';
require_once 'Task.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="developers")
 */
class Developer extends Impiegato
{
    /**
     * @ORM\ManyToMany(targetEntity="Task", mappedBy="developers", indexBy="id")
     * @var Task[]
     */
      
    private $tasks;
    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

}