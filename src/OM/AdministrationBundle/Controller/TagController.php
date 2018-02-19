<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 19/02/2018
 * Time: 15:44
 */

namespace OM\AdministrationBundle\Controller;
use Doctrine\DBAL\Schema\View;
use OM\AdministrationBundle\Entity\Tag;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TagController extends FOSRestController
{

    //ajouter un tag
    /**
     * @Rest\Post("/tag", name="_tag")
     * @param Request $request
     * @return View
     */

    public function postAction(Request $request)
    {
        //var_dump($request->get('username'));die();

        $data = new Tag();
        $nom = $request->get('nom');


        $data->setNom($nom);

        //var_dump($data);die();
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        $view = new View("User Added Successfully", Response::HTTP_OK);

        return $view;
    }



}