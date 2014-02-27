<?php
namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function showAction($name)
    {
        $user = $this->getDoctrine()->getManager()
            ->getRepository('AcmeDemoBundle:Users')
            ->findOneByName($name);




        return $this->render('AcmeDemoBundle:Blog:user.html.twig', array('user' => $user

        ));
    }

}
