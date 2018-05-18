<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 17.05.18
 * Time: 14:37
 */

namespace App\Controller;

use App\Form\RegisterForm;
use App\Services\AuthService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AuthController
 * @package App\Controller
 */
class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $form = $this->createForm(RegisterForm::class)->add('Save', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->authService->register($form->getData(), $passwordEncoder);

            $this->addFlash('notice', 'Пост создан');
            return $this->redirectToRoute('articles');
        }


        return $this->render('auth/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {

    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }

}