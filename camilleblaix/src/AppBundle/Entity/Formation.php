<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="Formation", type="string", length=20, unique=true)
     */
    private $formation;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=20, unique=true)
     */
    private $slug;



    /**
     * @ORM\ManyToMany(targetEntity="Module")
     * @ORM\JoinTable(name="formation_module",
     *     joinColumns={@ORM\JoinColumn(name="formation_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="module_id", referencedColumnName="id")}
     *  )
     */
    private $module;


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
     * Set formation
     *
     * @param string $module
     *
     * @return Module
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get module
     *
     * @return string
     */
    public function getFormation()
    {
        return $this->formation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->module = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add module
     *
     * @param \AppBundle\Entity\Module $module
     *
     * @return Formation
     */
    public function addModule(\AppBundle\Entity\Module $module)
    {
        $this->module[] = $module;

        return $this;
    }

       /**
     * Remove module
     *
     * @param \AppBundle\Entity\Module $module
     */
    public function removeModule(\AppBundle\Entity\Module $module)
    {
        $this->module->removeElement($module);
    }

    /**
     * Get module
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Formation
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


    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }


}
