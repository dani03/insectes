<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\insecte;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class insecteController extends Controller
{
      /**
       * @Route("/insectes", name="insecte_list")
       */
      public function listAction()
      {
        $insectes =$this->getDoctrine()
                  ->getRepository('AppBundle:insecte')
                  ->findAll();
          return $this->render('insectes/index.html.twig', array(

               'insectes' => $insectes



          ));
      }

      /**
       * @Route("/insectes/create", name="insecte_create")
       */
      public function createAction(Request $request)
      {

        $insecte = new insecte;

      $form = $this->createFormBuilder($insecte)

             ->add('nomInsecte', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:20px')))
             ->add('age', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:20px')))
             ->add('race', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:20px')))
             ->add('nourriture', TextType::class, array('attr' => array('class' =>'form-control', 'style' => 'margin-bottom:20px')))
             ->add('famille', TextareaType::class, array('attr' => array('class' =>'form-control', 'style' => 'margin-bottom:20px')))
             ->add('save', SubmitType::class, array('label' => 'ajouter insecte', 'attr' => array('class' =>'btn btn-info', 'style' => 'margin-bottom:20px')))

             ->getForm();
             $form->handleRequest($request);

             if($form->isSubmitted() && $form->isValid()){

               $nomInsecte = $form['nomInsecte']->getData();
               $age= $form['age']->getData();
                $race = $form['race']->getData();
                $nourriture = $form['nourriture']->getData();
                $famille = $form['famille']->getData();

                $insecte->setNomInsecte($nomInsecte);
                $insecte->setAge($age);
                $insecte->setRace($race);
                $insecte->setNourriture($nourriture);
                $insecte->setFamille($famille);

                $em =$this->getDoctrine()->getManager();

                $em->persist($insecte);
                $em->flush();
                $this->addFlash(
                  'notice',
                  'insecte ajouté au carnet'
                );
                return $this->redirectToRoute('insecte_list');
             }
                return $this->render('insectes/createInsecte.html.twig', array(

                'form' => $form->createView()
          ));
      }

      /**
       * @Route("/insectes/edit/{id}", name="insecte_edit")
       */
      public function editAction( $id,Request $request)
      {
        $insecte =$this->getDoctrine()
                  ->getRepository('AppBundle:insecte')
                  ->find($id);

                  $insecte->setNomInsecte($insecte->getNomInsecte());
                  $insecte->setAge($insecte->getAge());
                  $insecte->setRace($insecte->getRace());
                  $insecte->setNourriture($insecte->getNourriture());
                  $insecte->setFamille($insecte->getFamille());


                    $form = $this->createFormBuilder($insecte)

                       ->add('nomInsecte', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:20px')))
                       ->add('age', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:20px')))
                       ->add('race', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:20px')))
                       ->add('nourriture', TextType::class, array('attr' => array('class' =>'form-control', 'style' => 'margin-bottom:20px')))
                       ->add('famille', TextareaType::class, array('attr' => array('class' =>'form-control', 'style' => 'margin-bottom:20px')))
                       ->add('save', SubmitType::class, array('label' => 'modif\' insecte', 'attr' => array('class' =>'btn btn-info', 'style' => 'margin-bottom:20px')))

                       ->getForm();
                       $form->handleRequest($request);

                       if($form->isSubmitted() && $form->isValid()){

                         $nomInsecte = $form['nomInsecte']->getData();
                         $age= $form['age']->getData();
                          $race = $form['race']->getData();
                          $nourriture = $form['nourriture']->getData();
                          $famille = $form['famille']->getData();

                            $em =$this->getDoctrine()->getManager();
                            $insecte =$em->getRepository('AppBundle:insecte')->find($id);

                          $insecte->setNomInsecte($nomInsecte);
                          $insecte->setAge($age);
                          $insecte->setRace($race);
                          $insecte->setNourriture($nourriture);
                          $insecte->setFamille($famille);

                          $em->flush();
                          $this->addFlash(
                            'notice',
                            'modification d\'insecte reussi'
                          );
                          return $this->redirectToRoute('insecte_list');
                       }

              return $this->render('insectes/editInsecte.html.twig', array(

           'insecte' => $insecte,
           'form' => $form->createView()

          ));
      }

      /**
       * @Route("/insectes/details/{id}", name="insecte_details")
       */
      public function detailsAction($id)
      {
        $insecte =$this->getDoctrine()
                  ->getRepository('AppBundle:insecte')
                  ->find($id);
                  return $this->render('insectes/detailsInsecte.html.twig', array(

               'insecte' => $insecte

          ));
      }

      /**
       * @Route("/insectes/delete/{id}", name="insecte_delete")
       */
      public function deleteAction($id)
      {
        $em =$this->getDoctrine()->getManager();
        $insecte = $em->getRepository('AppBundle:insecte')->find($id);

        $em->remove($insecte);
        $em->flush();
        $this->addFlash(
          'notice',
          'suppression de l\'insecte'
        );
        return $this->redirectToRoute('insecte_list');
      }

}
