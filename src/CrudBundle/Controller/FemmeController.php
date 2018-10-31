<?php

namespace CrudBundle\Controller;

use CrudBundle\Entity\Article;
use CrudBundle\Entity\femme;
use CrudBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FemmeController extends Controller
{
    public function indexAction()
    {
        $MyForm = $this->createForm('CrudBundle\Form\ArticleType');

        return $this->render('CrudBundle:Default:index.html.twig',array(
           // 'article' => $article,

            'MyForm' => $MyForm->createView()
        ));


    }
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $femme = $em->getRepository('CrudBundle:femme')->findAll();
        return  $this->render('CrudBundle:Femme:affichage.html.twig', array(
            'femmes'=>$femme));

    }
    public function deleteAction( $id){
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('CrudBundle:Article')->find($id);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('list');

    }
    public function addAction(Request $request){
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);//persist the contact object
            $em->flush();//save it to the db
            return $this->redirect('add');
        }
        return  $this->render('CrudBundle:Default:add.html.twig', array(
            'form' => $form->createView(),));
    }
    public function UpdateAction(Request $request , $id){
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('CrudBundle:Article')->find($id);
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isValid()) {
            $em->persist($article);//persist the contact object
            $em->flush();//save it to the db
            return $this->redirect('update');
        }
        return  $this->render('CrudBundle:Default:update.html.twig', array(
            'form' => $form->createView(),));
    }
    public function addfemmeAction(Request $request , $id){
        $em = $this->getDoctrine()->getManager();
        $femme = new femme();
        $femme = $em->getRepository('CrudBundle:Article')->find($id);
        printf('Received data:', $femme);
            $em = $this->getDoctrine()->getManager();
            $em->persist($femme);//persist the contact object
            $em->flush();//save it to the db
        return  $this->render('CrudBundle:Default:affichage.html.twig');
    }
}
