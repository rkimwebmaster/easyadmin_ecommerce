<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\NewsLetter;
use App\Entity\Produit;
use App\Entity\Service;
use App\Repository\ContactRepository;
use App\Repository\NewsLetterRepository;
use App\Repository\ProduitRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(ProduitRepository $produitRepository, ServiceRepository $serviceRepository): Response
    {
        $produits=$produitRepository->findAll();
        $services=$serviceRepository->findAll();
        return $this->render('accueil/index.html.twig', [
            'produits' => $produits,
            'services' => $services,
        ]);
    }

    #[Route('/produits', name: 'app_produits')]
    public function produits(ProduitRepository $produitRepository): Response
    {
        $produits=$produitRepository->findAll();
        return $this->render('accueil/produits.html.twig', [
            'produits' => $produits,
        ]);
    }

    
    #[Route('/arrivageProduits', name: 'app_arrivage_produits')]
    public function arrivageProduits(ProduitRepository $produitRepository): Response
    {
        $produits=$produitRepository->findAll();
        return $this->render('accueil/arrivages.html.twig', [
            'produits' => $produits,
        ]);
    }

    
    #[Route('/soldeProduits', name: 'app_solde_produits')]
    public function soldeProduits(ProduitRepository $produitRepository): Response
    {
        $produits=$produitRepository->findAll();
        return $this->render('accueil/solde.html.twig', [
            'produits' => $produits,
        ]);
    }


    #[Route('/services', name: 'app_services')]
    public function services(): Response
    {
        return $this->render('accueil/services.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('accueil/contact.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/panier', name: 'app_panier')]
    public function panier(): Response
    {
        return $this->render('accueil/panier.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/creationNewsLetter', name: 'app_creationNewsLetter', methods:'GET')]
    public function creationNewsLetter(Request $request, NewsLetterRepository $newsLetterRepository): Response
    {

        $email=$request->get('email');
        // $route=$request->get('route');
        // dd($route);
        $newsLetter = new NewsLetter();
        $newsLetter->setEmail($email);
        $newsLetterRepository->save($newsLetter, true);
        $this->addFlash("success", "Merci pour votre inscription à la newsletter.");
        return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
        // return $this->redirect();
    }

    #[Route('/creationContact', name: 'app_creationContact')]
    public function creationContact(Request $request, ContactRepository $contactRepository): void
    {
        $contact = new Contact();
        $contactRepository->save($contact, true);

        // return $this->redirectToRoute('app_news_letter_index', [], Response::HTTP_SEE_OTHER);
        $this->addFlash("success", "Merci pour votre inscription à la newsletter.");
        // return $this->redirect();
    }

    #[Route('/detailService/{id}', name: 'app_service_show', methods: ['GET'])]
    public function detailService(Service $service): Response
    {
        return $this->render('accueil/detailService.html.twig', [
            'service' => $service,
        ]);
    }

    
    #[Route('/detailProduit/{id}', name: 'app_produit_show', methods: ['GET'])]
    public function detailProduit(Produit $produit): Response
    {
        return $this->render('accueil/detailProduit.html.twig', [
            'produit' => $produit,
        ]);
    }

    
    #[Route('/garantieRemboursement', name: 'app_garantie_remboursement')]
    public function garantieRemboursement(): Response
    {
        return $this->render('accueil/remboursement.html.twig', [
        ]);
    }

    
    #[Route('/termeConditions', name: 'app_terme_conditions')]
    public function termeConditions(): Response
    {
        return $this->render('accueil/termeConditions.html.twig', [
        ]);
    }

    
    #[Route('/policy', name: 'app_policy')]
    public function policy(): Response
    {
        return $this->render('accueil/policy.html.twig', [
        ]);
    }

    
    

}
