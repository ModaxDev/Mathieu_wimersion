<?php 

namespace App\Controller;



use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController {

    private $manager;
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @Route("/",name="app.home")
     * @param Request $request
     */
    public function addUser(Request $request)
    {
        $user = new User;
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->manager->persist($user);
            $this->manager->flush();
            $this->addFlash('success', "L'utilisateur a bien été enregistré");
            $this->redirectToRoute('app.home');
        }
        return $this->render(
            'new.html.twig',
            array('form' => $form->createView(),
            )
        );
    }
}