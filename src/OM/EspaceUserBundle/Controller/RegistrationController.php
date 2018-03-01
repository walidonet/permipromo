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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller managing the registration.

 */
class RegistrationController extends BaseController
{
    /**
     * @Route("/signup", name="user_register")
     * @Method("POST")
     * @param Request $request
     *
     * @return Response
     */
    public function registerAction(Request $request)
    {

        $userManager = $this->get('fos_user.user_manager');

        $email = $request->request->get('email');
        $username = $request->request->get('username');
        $password = $request->request->get('plainPassword');
        $roles=$request->request->get('role');


        $email_exist = $userManager->findUserByEmail($email);
        $username_exist = $userManager->findUserByUsername($username);

        if($email_exist || $username_exist){
            $response = new JsonResponse();
            $response->setData("Username/Email ".$username."/".$email." existiert bereits");
            return $response;
        }

        $user = $userManager->createUser();
       //var_dump($password['first_options']);die();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setEnabled(true);
        $user->setPassword($password['first_options']);
        $user->setPlainPassword($password['second_options']);//array('ROLE_ADMIN');
        $user->setRoles(array($roles));
        $userManager->updateUser($user, true);

        $response = new JsonResponse();
        $response->setData("User: ".$user->getUsername()." wurde erstellt");
        return $response;
    }
}