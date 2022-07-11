<?php
namespace src;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require_once 'Impiegato.php';
require_once 'Progetto.php';


/**
 * @ORM\Entity
 * @ORM\Table(name="project_managers")
 */
class ProjectManager extends Impiegato
{
    /**
     * @ORM\OneToMany(targetEntity="Progetto", mappedBy="projectmanager", indexBy="id")
     * @var Progetti[]
     */
      
    private $progetti;
    public function __construct()
    {
        $this->progetti = new ArrayCollection();
    }

    public function addProgetto(Progetto $progetto)
    {
        $this->progetti[$progetto->getId()] = $progetto;
    }

    public function getProgetto($id)
    {
        if (!isset($this->progetti[$id])) {
            throw new \InvalidArgumentException("Il progetto non è assegnato a questo PM.");
        }

        return $this->progetti[$id];
    }

    public function getProgetti()
    {
        return $this->progetti;
    }

}