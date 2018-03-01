<?php

namespace OM\AuthBundle\Controller;

use OM\AdministrationBundle\Entity\Folder;
use OM\EspaceUserBundle\Controller\RegistrationController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class SessionController extends FOSRestController
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    public $container;

    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
    /**
     * @Rest\Get("/ss/{token}")
     * @param Request $request
     * @return View
     */
    public function getSessionAction(Request $request)
    {
        $id = $request->get('token');
        $userid = $this->get('doctrine.orm.entity_manager')
            ->getRepository('OMAuthBundle:RefreshToken')
            ->findOneBytoken($id);
        $user = $this->get('doctrine.orm.entity_manager')
            ->getRepository('OMEspaceUserBundle:User')
            ->find($userid->getUser()->getId());
        return $user->getId();
    }
    /**
     * @Rest\Post("/api/add")
     * @param Request $request
     * @return View
     */
    public function testAction(Request $request)
    {


        $reg = new RegistrationController( $this->container);
        $reg->registerAction($request);

    }

    /**
     * @Rest\Get("/api/prospect", name="add_sana")
     * @return View
     */
    public function getAllproespectAction()
    {
        $userid = $this->get('doctrine.orm.entity_manager')
            ->getRepository('OMEspaceUserBundle:User')
            ->findAll();
        $a=count($userid);
        $pro=array();
        for($i=0;$i<$a;$i++){
            if($userid[$i]->getRoles()==array('ROLE_PROSPECT')){

                array_push($pro,$userid[$i]);
            }
        }
        return $pro;
    }
    /**
     * @Rest\Get("/api/prospect/{id}", name="getpros")
     * @return View
     */
    public function getProespectbyIdAction()
    {
        $userid = $this->get('doctrine.orm.entity_manager')
            ->getRepository('OMEspaceUserBundle:User')
            ->findAll();
        $a=count($userid);
        $pro=array();
        for($i=0;$i<$a;$i++){
            if($userid[$i]->getRoles()==array('ROLE_PROSPECT')){

                array_push($pro,$userid[$i]);
            }
        }
        return $pro;
    }



}
