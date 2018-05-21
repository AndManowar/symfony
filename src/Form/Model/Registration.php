<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 19.05.2018
 * Time: 12:35
 */

namespace App\Form\Model;

use App\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Class Registration
 * @package App\Form\Model
 */
class Registration
{
    /**
     * @Assert\Type(type="App\Entity\User")
     * @Assert\Valid()
     */
    protected $user;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    /**
     * @param $termsAccepted
     */
    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (bool) $termsAccepted;
    }
}