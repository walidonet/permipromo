<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19/02/2018
 * Time: 15:14
 */

namespace OM\AdministrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 *
 * User
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */

class Tag
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nom ;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }






}