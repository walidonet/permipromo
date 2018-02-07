<?php
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 29/01/2018
 * Time: 15:53
 */

namespace OM\AdministrationBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 *
 * User
 * @ORM\Table(name="folder")
 * @ORM\Entity
 */
class Folder
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    private $etat = "";

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
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }




}