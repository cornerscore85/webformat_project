<?php
namespace src;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require_once 'Progetto.php';
require_once 'Developer.php';




/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
class Task
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
     * @ORM\Column(type="string")
     */
    private $status;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deadline;

    /**
     * @ORM\ManyToOne(targetEntity="Progetto", inversedBy="tasks")
     * @var Progetto
     */
    private $progetto;

    /**
     * @ORM\ManyToMany(targetEntity="Developer", inversedBy="tasks")
     * @var Developer[]
     */
    private $developers;

    
    
    public function __construct($descrizione, $status, $deadline,$progetto)
    {
        $this->descrizione = $descrizione;
        $this->status = $status;
        $this->deadline = $deadline;
        $this->progetto = $progetto;
        $this->developers = new ArrayCollection();
        
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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getDeadline(): \DateTime
    {
        return $this->deadline;
    }

    public function setDeadline(\DateTime $deadline): void
    {
        $this->deadline = $deadline;
    }

    public function getProgetto(): Progetto
    {
        return $this->progetto;
    }

    public function setProgetto(Progetto $progetto): void
    {
        $this->progetto = $progetto;
    }
}