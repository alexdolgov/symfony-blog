<?php
namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function showAction($slug)
    {
        $post = $this->getDoctrine()->getManager()
            ->getRepository('AcmeDemoBundle:Post')
            ->findOneBySlug($slug);



        return $this->render('AcmeDemoBundle:Blog:index.html.twig', array('post' => $post

        ));
    }

}
