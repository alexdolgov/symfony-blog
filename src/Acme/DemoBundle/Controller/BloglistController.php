<?php
namespace Acme\DemoBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BloglistController extends Controller
{
public function showAction()
{
    $posts = $this->getDoctrine()->getManager()
        ->getRepository('AcmeDemoBundle:Post')
        ->createQueryBuilder('p')
//        ->select('*')
        ->orderBy('p.createdAt', 'DESC')
        ->getQuery()
        ->getResult()
    ;


return $this->render('AcmeDemoBundle:Blog:blog.html.twig', array('posts' => $posts));
}

}
