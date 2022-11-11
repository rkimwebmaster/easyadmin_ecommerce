<?php

namespace App\Controller\Admin;

use App\Entity\Achat;
use App\Entity\Annulation;
use App\Entity\Categorie;
use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\Entreprise;
use App\Entity\MobileMoney;
use App\Entity\NewsLetter;
use App\Entity\Photo;
use App\Entity\Produit;
use App\Entity\Recherche;
use App\Entity\Service;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminURLGenerator $adminURL)
    {
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // $url=$this->adminURL->setController(Photo::class)
        //     ->generateUrl();
        // return $this->redirect($url);
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(ProduitCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle("Fina administration")
            ->generateRelativeUrls()
            ->setTitle('Fina Admin');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Configuration'),
            MenuItem::linkToCrud('Categories', 'fa fa-tags', Categorie::class),
            MenuItem::linkToCrud('Produits', 'fa fa-tags', Produit::class),
            MenuItem::linkToCrud('Services', 'fa fa-tags', Service::class),
            MenuItem::linkToCrud('Entreprise', 'fa fa-tags', Entreprise::class),
            MenuItem::linkToCrud('MobileMoney', 'fa fa-tags', MobileMoney::class),
            MenuItem::section('Métiers '),
            MenuItem::linkToCrud('Achats', 'fa fa-tags', Achat::class),
            MenuItem::linkToCrud('Annulations', 'fa fa-tags', Annulation::class),
            MenuItem::linkToCrud('MewsLetters ', 'fa fa-tags', NewsLetter::class),
            MenuItem::linkToCrud('Contacts', 'fa fa-tags', Contact::class),
            MenuItem::linkToCrud('Clients', 'fa fa-tags', Client::class),
            MenuItem::linkToCrud('Recherches ', 'fa fa-tags', Recherche::class),

            MenuItem::section('Statistiques'),
            MenuItem::linkToCrud('Achats', 'fa fa-tags', Achat::class),
            MenuItem::linkToCrud('Annualtion', 'fa fa-tags', Annulation::class),

            // MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', BlogPost::class),

            MenuItem::section('Users'),
            // MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];

        
    }
}
