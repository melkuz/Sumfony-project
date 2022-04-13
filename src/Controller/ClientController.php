<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ClientController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(): Response{
        $form = $this->createFormBuilder()
        ->setAction($this->generateUrl('confirmationMessage'))
        ->setMethod('POST')
        ->add('nom', TextType::class,['label'=>'Nom'])
        ->add('prenom', TextType::class,['label'=>'Prenom'])
        ->add('courriel', TextType::class,['label'=>'Courriel'])
        ->add('Type', ChoiceType::class,array(
            'label' => 'Type de message',
            'choices' => array(
                'Question' => 'Question',
                'Commentaire' => 'Ccommentaire',
                ),
            'expanded' => true,
            'multiple' => false))
        ->add('content', TextareaType::class,['label'=>'Question / Commentaire'])
        ->add('envoyer', SubmitType::class,['label'=>'Envoyer'])
        ->getForm();
        return $this->render('client/index.html.twig',[
        'temp'=>$form->createView()
        ]);
      
    }

    #[Route('/confirmationMessage', name: 'confirmationMessage')]

    public function confirmationMessage(): Response{
        return $this->render('client/confirmation.html.twig',[
            'Nom'=>$_POST['form']['nom'],
            'Courriel'=>$_POST['form']['courriel'],
            'Prenom'=>$_POST['form']['prenom'],
            'Type'=>$_POST['form']['Type'],
            'Content'=>$_POST['form']['content'],
            ]);
    }
}
