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
use OM\AdministrationBundle\Entity\Tag;
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
     * @ORM\Column(type="string",nullable=true)
     */
    private $firstname = "";
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $lastname = "";
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $idcard = "";
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $phone = "";
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $adress = "";
    /**
     * @ORM\Column(type="blob",nullable=true)
     */
    private $picture = "";
    /**
     * @ORM\OneToMany(targetEntity="OM\AdministrationBundle\Entity\Meeting", mappedBy="client")
     */
    private $meetings;
    /**
     * @ORM\ManyToOne(targetEntity="OM\EspaceUserBundle\Entity\User", inversedBy="clients")
     * @ORM\JoinColumn(name="monitor_id", referencedColumnName="id")
     * @ORM\JoinColumn(nullable=true)
     */
    private $monitor;
    /**
     * @ORM\OneToMany(targetEntity="OM\EspaceUserBundle\Entity\User", mappedBy="monitor")
     */
    private $clients;
    /**
     * @ORM\ManyToMany(targetEntity="OM\AdministrationBundle\Entity\Tag", cascade={"persist"})
     *
     *
     */
    private $tags;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getIdcard()
    {
        return $this->idcard;
    }

    /**
     * @param mixed $idcard
     */
    public function setIdcard($idcard)
    {
        $this->idcard = $idcard;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getMeetings()
    {
        return $this->meetings;
    }

    /**
     * @param mixed $meetings
     */
    public function setMeetings($meetings)
    {
        $this->meetings = $meetings;
    }

    /**
     * @return mixed
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param mixed $clients
     */
    public function setClients($clients)
    {
        $this->clients = $clients;
    }

    /**
     * @return mixed
     */
    public function getMonitor()
    {
        return $this->monitor;
    }

    /**
     * @param mixed $monitor
     */
    public function setMonitor($monitor)
    {
        $this->monitor = $monitor;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }








}