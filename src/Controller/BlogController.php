<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 17.05.18
 * Time: 14:16
 */

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostForm;
use App\Repository\PostRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * BlogController constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @Route("/articles", name="articles")
     */
    public function articles()
    {
        return $this->render('articles/index.html.twig');
    }

    /**
     * @Route("/article/create", name="article_create")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $form = $this->createForm(PostForm::class)->add('Save', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->addFlash('notice', 'Пост создан');
            return $this->redirectToRoute('articles');
        }

        return $this->render('articles/form.html.twig', [
            'statuses' => Post::$statusList,
            'form'     => $form->createView()
        ]);
    }

    /**
     * @Route("/article/update/{id}", name="article_update")
     *
     * @param integer $id
     * @param Request $request
     */
    public function update($id, Request $request)
    {

    }

    /**
     * @Route("/article/delete/{id}", name="article_delete")
     *
     * @param $id
     */
    public function delete($id)
    {

    }
}