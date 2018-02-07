<?php

namespace OM\AdministrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OMAdministrationBundle:Default:index.html.twig');
    }
}
