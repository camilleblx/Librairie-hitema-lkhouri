<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livres
 *
 * @ORM\Table(name="livres")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LivresRepository")
 */
class Livres
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="livres", type="string", length=50)
     */
    private $livres;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=100)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, unique=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="datepublication", type="string", length=20)
     */
    private $datePublication;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=20, unique=true)
     */
    private $slug;


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
     * Set livres
     *
     * @param string $livres
     *
     * @return Livres
     */
    public function setLivres($livres)
    {
        $this->livres = $livres;

        return $this;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get livres
     *
     * @return string
     */
    public function getLivres()
    {
        return $this->livres;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Livres
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Livres
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Livres
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Livres
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Livres
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Livres
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slugg
     *
     * @param string $slugg
     *
     * @return Livres
     */
    public function setSlugg($slugg)
    {
        $this->slugg = $slugg;

        return $this;
    }

    /**
     * Get slugg
     *
     * @return string
     */
    public function getSlugg()
    {
        return $this->slugg;
    }
}
