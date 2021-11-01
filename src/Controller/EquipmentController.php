<?php
namespace App\Controller;

use App\Entity\Equipment;
use App\Form\EquipmentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EquipmentController extends AbstractController
{
    /**
    *@Route("/",name="equipment_list"))
    */
    public function home()
    {
        //récupérer tous les equipements de la table equipment de la BD
        // et les mettre dans le tableau $Equipment
        $Equipment = $this->getDoctrine()->getRepository(Equipment::class)->findAll();
        return $this->render('Equipment/index.html.twig',['Equipment'=> $Equipment]);
         
 
    }

        /**
     * @Route("/Equipment/save")
     */
    public function save() {
        
        $entityManager = $this->getDoctrine()->getManager();
        $Equipment = new Equipment();
        $Equipment->setEquipmentName('');
        $Equipment->setEquipmentMark('');
        $Equipment->setEquipmentPrice();
        $Equipment->setEquipmentDescription( "");
        $Equipment->setEquipmentQuantity();
        
        $entityManager->persist($Equipment);
        $entityManager->flush();
        return new Response('Equipment saved with id '.$Equipment->getId());
    }

        /**
     * @Route("/Equipment/new", name="new_Equipment")
     * Method({"GET", "POST"})
     */
    public function new(Request $request) {
        $Equipment = new Equipment();
        $form = $this->createForm(EquipmentType::class,$Equipment);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
        $Equipment = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Equipment);
        $entityManager->flush();
        return $this->redirectToRoute('equipment_list');
        }
        return $this->render('Equipment/new.html.twig',['form' => $form->createView()]);
       
        }

            /**
     * @Route("/Equipment/{id}", name="Equipment_show")
     */
    public function show($id) {
        $Equipment = $this->getDoctrine()
        ->getRepository(Equipment::class)
        ->find($id);
        return $this->render('Equipment/show.html.twig',['Equipment' => $Equipment]);
        }
    
   

   }
