<?php

namespace App\Controller;

use App\Form\EditUserFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private UserRepository $userRepository;
    private EntityManagerInterface $em;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em)
    {
        $this->userRepository = $userRepository;
        $this->em = $em;
    }

    #[Route('/edit_user/{id}', name: 'app_edit_user')]
    public function edit(Request $request, $id): Response
    {
        $user = $this->userRepository->find($id);
        $form = $this->createForm(EditUserFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setFirstName($form->get('firstName')->getData());
            $user->setEmail($form->get('email')->getData());
            $this->em->flush();
            return $this->redirectToRoute('app_show_member');
        }

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }

    #[Route('/delete_user/{id}', name: 'app_delete_user', methods: ['GET', 'DELETE'])]
    public function delete($id): Response
    {
        $user = $this->userRepository->find($id);
        $this->em->remove($user);
        $this->em->flush();
        return $this->redirectToRoute('app_show_member');
    }
}
