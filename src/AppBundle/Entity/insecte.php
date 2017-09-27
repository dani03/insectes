<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * insecte
 *
 * @ORM\Table(name="insecte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\insecteRepository")
 */
class insecte
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * @var string
     *
     * @ORM\Column(name="nomInsecte", type="string", length=255)
     */
    private $nomInsecte;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255)
     */
    private $race;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="nourriture", type="string", length=255)
     */
    private $nourriture;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255)
     */
    private $famille;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomIsecte
     *
     * @param string $nomIsecte
     *
     * @return insecte
     */
    public function setNomInsecte($nomInsecte)
    {
        $this->nomInsecte = $nomInsecte;

        return $this;
    }

    /**
     * Get nomIsecte
     *
     * @return string
     */
    public function getNomInsecte()
    {
        return $this->nomInsecte;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return insecte
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return insecte
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set nourriture
     *
     * @param string $nourriture
     *
     * @return insecte
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    /**
     * Get nourriture
     *
     * @return string
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return insecte
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }
}
