<?php
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 17/02/2018
 * Time: 12:23
 */
namespace OM\EspaceUserBundle\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
class DemoController extends FOSRestController
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    /** @return AbstractResourceManager */
    protected function getResourceManager()
    {
        return $this->get('core_rest.resource_manager');
    }

    private function getSecurityAuthChecker()
    {
        return $this->get('security.authorization_checker');
    }
    /**
     * @Rest\Get("/api/user")
     * @param Request $request
     * @Rest\View()
     */
    public function getUserAction()
    {
        $tmpResult=array();
        $grantRequest = new Request(array(
            'client_id'  => "2_4yzd7azk70g0wgkgg4sgwsoswow0kosw8wgw4gkccskwokoc40",
            'client_secret' => "npv1q0ozej4cs4kw4ow84gk0wk8gkgsc4go4sgk4ockgw8c0w",
            'grant_type' => 'password',
            'username' => "walid",
            'password' => "21253300"
        ));
        if (array_key_exists('scope', $tmpResult)) {
            $result['scope'] = $tmpResult['scope'];
        }
        var_dump($this->createJsonResponse($result));
        /*$tokenResponse = $this->get('fos_oauth_server.server')->grantAccessToken($grantRequest);

        $token = $tokenResponse->getContent();

        $user = $this->get('security.token_storage')->getToken()->getUser();
        var_dump($user);die();*/

    }


    /**
     * @Rest\Get("/test")
     * @param Request $request
     * @Rest\View()
     */
    public function getDemosAction()
    {
        $grantRequest = new Request(array(
            'client_id'  => "2_4yzd7azk70g0wgkgg4sgwsoswow0kosw8wgw4gkccskwokoc40",
            'client_secret' => "npv1q0ozej4cs4kw4ow84gk0wk8gkgsc4go4sgk4ockgw8c0w",
            'grant_type' => 'password',
            'username' => "walid",
            'password' => "21253300"
        ));
        var_dump($this->getSecurityAuthChecker());die();

        $tokenResponse = $this->get('fos_oauth_server.server')->grantAccessToken($grantRequest);

        $token = $tokenResponse->getContent();

        var_dump($token);die();
    }



}