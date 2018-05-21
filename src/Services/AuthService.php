<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 18.05.18
 * Time: 16:48
 */

namespace App\Services;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AuthService
 * @package App\Services
 */
class AuthService
{
    /**
     * Register user
     *
     * @param User $user
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $encoder
     * @return User
     */
    public function register(User $user, ObjectManager $manager, UserPasswordEncoderInterface $encoder): User
    {
        $user->setPasswordHash($encoder->encodePassword($user, $user->password));
        $manager->persist($user);
        $manager->flush();

        return $user;
    }

    public function authenticateUser(User $user, ContainerInterface $container)
    {
        $providerKey = 'secured_area'; // your firewall name
        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());

        $container->get('security.token_storage')->setToken($token);
    }
}