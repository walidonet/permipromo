<?php
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 26/01/2018
 * Time: 11:42
 */
namespace OM\EspaceUserBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 *
 *
 * User
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class User extends BaseUser
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
    private $nom = "";
    /**
     * @ORM\Column(type="string")
     */
    private $prenom = "";
    /**
     * @ORM\Column(type="blob")
     */
    private $image = "";

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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