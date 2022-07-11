<?php
namespace src;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;




/**
 * @ORM\Entity
 * @ORM\Table(name="ceos")
 */
class Ceo
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
    private $cognome;
    /**
     * @ORM\Column(type="string")
     */
    private $nome;
    /**
     * @ORM\Column(type="string")
     */
    private $codice_fiscale;
    public function __construct($cognome,$nome,$codice_fiscale)
    {
        $this->cognome = $cognome;
        $this->nome = $nome;
        $this->codice_fiscale = $codice_fiscale;
        
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getCognome(): string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): void
    {
        $this->cognome = $cognome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getCodiceFiscale(): string
    {
        return $this->codice_fiscale;
    }

    public function setCodiceFiscale(string $codice_fiscale): void
    {
        $this->codice_fiscale = $codice_fiscale;
    }

    public function assumiProjectManager($cognome,$nome,$codice_fiscale): ProjectManager{
        $project_manager = new ProjectManager();
        $project_manager->setCognome($cognome);
        $project_manager->setNome($nome);
        $project_manager->setCodiceFiscale($codice_fiscale);
        
        return $project_manager;
        
    }

    public function assumiDeveloper($cognome,$nome,$codice_fiscale): Developer{
        $developer = new Developer();
        $developer->setCognome($cognome);
        $developer->setNome($nome);
        $developer->setCodiceFiscale($codice_fiscale);
        
        return $developer;
        
    }

    public function creaTeam($nome): Team{
        $team = new Team();
        $team->setNome($nome);
        
        
        return $team;
        
    }

    public function creaProgetto($descrizione): Progetto{
        $progetto = new Progetto();
        $progetto->setDescrizione($descrizione);
        
        
        return $progetto;
        
    }

    public function assegnaProgetto($project_manager,$progetto): void{
        
        $project_manager->addProgetto($progetto);
        $progetto->setProjectManager($project_manager);
        
        
    }

}