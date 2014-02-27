<?php
namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Acme\DemoBundle\Form\RegistrationType;
use Acme\DemoBundle\Form\Model\Registration;

class AccountController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));
//        $form->add('save', 'submit');

        return $this->render(
            'AcmeDemoBundle:Blog:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new Registration());

        $form->handleRequest($request);

        if ($form->isValid()) {

            $registration = $form->getData();

            $em->persist($registration->getUser());
            $em->flush();

            return $this->redirect($this->get('router')->generate('blog'));
        } else {

            var_dump($form->getErrors());
            var_dump($form->isValid());
        }

        return $this->render(
            'AcmeDemoBundle:Blog:success.html.twig',
            array('form' => $form->createView(),
                'error' => $form->getErrorsAsString()
            )
        );
    }

}