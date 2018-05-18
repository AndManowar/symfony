<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 18.05.18
 * Time: 16:48
 */

namespace App\Services;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthService
{
    /**
     * @param User $user
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function register(User $user, UserPasswordEncoderInterface $passwordEncoder)
    {
        $passwordEncoder->encodePassword($user, $user->password);
    }

    public function login()
    {

    }
}