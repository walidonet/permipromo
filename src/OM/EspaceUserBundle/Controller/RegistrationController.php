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

use OM\AdministrationBundle\Entity\Folder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Controller managing the registration.

 */
class RegistrationController extends BaseController
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    public $container;

    /**
     * AfterLoginFailureRedirection constructor.
     * @param RouterInterface $router
     * @param ContainerInterface $container
     */
    public function __construct( ContainerInterface $container)
    {
        $this->container = $container;
    }





    /**
     *
     * @Route("/signup", name="user_register")
     * @Method("POST")
     * @param Request $request
     * @return Response
     */
    public function registerAction(Request $request)
    {


        $userManager = $this->get('fos_user.user_manager');
       // $confrdv = $request->get('confrdv');
        $phone = $request->get('phone');
        $phone2 = $request->get('phone2');
        $adress = $request->get('adress');
        $adress2 = $request->get('adress2');
        $calltype = $request->get('calltype');
        $fb = $request->get('fb');
        $insta = $request->get('insta');
        $network = $request->get('network');
        $offre = $request->get('offre');
        $note = $request->get('note');
        $confrdv = $request->get('confrdv');
        $confirmation = $request->get('confirmation');
        $rdvfin = $request->get('rdvfin');
        $rdvdep = $request->get('rdvdep');
        $paiementmode = $request->get('paiementmode');
        $paiement = $request->get('paiement');
        $starcount = $request->get('starsCount');
        /***/
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');

        /***/


        $user = $userManager->createUser();
       //var_dump($password['first_options']);die();
        //$user->setUsername($username);
       // $user->setEmail($email);

        $user->setUsername($phone);
        $user->setEmail($phone."@gmail.com");
        $user->setEnabled(true);
        $user->setPassword($phone);
        $user->setPlainPassword($phone);
        $user->setStarcount($starcount);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);

        $user->setPaiement($paiement);
        $user->setPaiementmode($paiementmode);
        $user->setRdvfin(new \DateTime($rdvfin));
        $user->setRdvfin(new \DateTime($rdvfin));
        $user->setRdvdep(new \DateTime($rdvdep));
        if(empty($confirmation)){
            $user->setConfirmation(false);
        }
        else{
            $user->setConfirmation($confirmation);
        }
        $user->setConfrdv(new \DateTime($confrdv));
        $user->setOffre($offre);
        if(empty($network)){
            $user->setNetwork(false);
        }else {
            $user->setNetwork($network);
        }
        if(empty($insta)){
            $user->setInsta(false);
        }else {
            $user->setInsta($insta);
        }
        if(empty($fb)){
            $user->setFb(false);
        }
        else {
            $user->setFb($fb);
        }
        $user->setCalltype($calltype);
        $user->setNote($note);
        $user->setAdress2($adress2);
        $user->setAdress($adress);
        $user->setPhone2($phone2);
        $user->setPhone($phone);
        /***/
        //$user->setRoles(array($roles));

        $user->setRoles(array('ROLE_PROSPECT'));
        $userManager->updateUser($user, true);


        $response = new JsonResponse();
        $response->setData("User" );
        return $response;

    }


    /**
     *
     * @Route("/aa", name="user_aa")
     * @Method("Get")
     * @param Request $request
     * @return Response
     */
    public function testAction(Request $request)
    {

    }

}