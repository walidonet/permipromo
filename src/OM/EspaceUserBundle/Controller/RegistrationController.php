<?php
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 26/01/2018
 * Time: 14:01
 */

namespace OM\EspaceUserBundle\Controller;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
/*****/

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller managing the registration.

 */
class RegistrationController extends BaseController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function registerAction(Request $request)
    {

        $response = parent::registerAction($request);
        return $response;
    }
}