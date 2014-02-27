<?php
namespace Acme\DemoBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use Acme\DemoBundle\Entity\Users;

class Registration
{
    /**
     * @Assert\Type(type="Acme\DemoBundle\Entity\Users")
     * @Assert\Valid()
     */
    protected $user;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function setUser(Users $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean) $termsAccepted;
    }
}