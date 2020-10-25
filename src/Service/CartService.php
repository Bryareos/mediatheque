<?php

namespace App\Service;

use App\Repository\MediaRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{

    private SessionInterface $session;
    private MediaRepository $mediaRepository;

    public function __construct(SessionInterface $session, MediaRepository $mediaRepository)
    {
        $this->session = $session;
        $this->mediaRepository = $mediaRepository;
    }

    public function add(int $id)
    {
        $cart = $this->session->get('cart', []);

        if (empty($cart[$id])) {
            $cart[$id] = 0;
        }
        $cart[$id]++;

        $this->session->set('cart', $cart);
    }

    public function remove(int $id)
    {
        $cart = $this->session->get('cart', []);
        if (!empty($cart[$id])) {
            unset($cart[$id]);
        }
        $this->session->set('cart', $cart);
    }

    /**
     * @return array - An array containing the cart with the data for each media in it.
     */
    public function getFullCart(): array
    {
        $cart = $this->session->get('cart', []);
        $cartWithData = [];

        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
              'media' => $this->mediaRepository->find($id),
              'quantity' => $quantity
            ];
        }
        return $cartWithData;
    }
}
