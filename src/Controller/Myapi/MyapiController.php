<?php
namespace App\Controller\Myapi;

use App\Entity\User;
use App\Entity\Post;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/myapi', name: 'my_api_')]
class MyapiController extends AbstractController
{
    #[Route('/posts', name: 'posts', methods: ['GET'])]
    public function index(PostRepository $pr): JsonResponse
    {
        $posts = $pr->findAll();
        return $this->json($posts, Response::HTTP_OK);
    }

    #[Route('/posts/{id}', name: 'post', methods: ['GET'])]
    public function show(Post $post): JsonResponse
    {
        return $this->json($post->getAuthor(), Response::HTTP_OK);
    }



    #[Route('/users', name: 'users', methods: ['GET'])]
    public function users(UserRepository $ur): JsonResponse
    {
        $users = $ur->findAll();
        return $this->json($users, Response::HTTP_OK);
    }


    #[Route('/users/{id}', name: 'user', methods: ['GET'])]
    public function user(User $user): JsonResponse
    {
        return $this->json($user, Response::HTTP_OK);
    }





}
