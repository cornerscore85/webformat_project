<?php
namespace src;
use Doctrine\ORM\Mapping as ORM;
require_once 'Team.php';
/**
 * @ORM\MappedSuperclass
 */
class Impiegato
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

    

    

}