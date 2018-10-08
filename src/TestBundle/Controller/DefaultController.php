<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function testAction()
    {
        return $this->render('TestBundle:Default:indexx.html.twig');
    }
    public function productsAction()
    {
        return $this->render('TestBundle:Default:products.html.twig');
    }
    public function products1Action()
    {
        return $this->render('TestBundle:Default:products1.html.twig');
    }
    public function registeredAction()
    {
        return $this->render('TestBundle:Default:registered.html.twig');
    }
    public function singleAction()
    {
        return $this->render('TestBundle:Default:single.html.twig');
    }
    public function codesAction()
    {
        return $this->render('TestBundle:Default:codes.html.twig');
    }
    public function checkoutAction()
    {
        return $this->render('TestBundle:Default:checkout.html.twig');
    }
}
