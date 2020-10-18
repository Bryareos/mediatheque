<?php

namespace App\Controller\Account;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AccountController
 * @package App\Controller\Account
 * @Route("/")
 */
class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    public function myAccount()
    {
        return $this->render('account/index.html.twig', [
            /**
             * @var User[] user
             */
          'user' => $this->getUser()
        ]);
    }
}
