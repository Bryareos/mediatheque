<?php

namespace App\Controller\Cart;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart_index")
     * @param CartService $cartService
     * @return Response
     */
    public function index(CartService $cartService)
    {
        return $this->render('cart/index.html.twig', [
           "items" => $cartService->getFullCart(),
        ]);
    }

    /**
     * @Route("/add/{id}", name="cart_add")
     * @param $id
     * @param CartService $cartService
     * @return RedirectResponse
     */
    public function add($id, CartService $cartService)
    {
        $cartService->add($id);
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/remove/{id}", name="cart_remove")
     * @param $id
     * @param CartService $cartService
     * @return RedirectResponse
     */
    public function remove($id, CartService $cartService)
    {
        $cartService->remove($id);
        return $this->redirectToRoute('cart_index');
    }
}
