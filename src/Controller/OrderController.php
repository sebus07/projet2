<?php

namespace App\Controller;

class OrderController extends AbstractController
{
    public function addOrder()
    {
    }

    public function adminOrder()
    {
        return $this->twig->render('order/adminOrder.html.twig');
    }

    public function userOrder()
    {
        var_dump($_POST);
        return $this->twig->render('order/userOrder.html.twig');
    }
}
