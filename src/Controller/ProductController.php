<?php

namespace App\Controller;

use App\Model\ProductManager;
use App\Service\Image;
use App\Model\ImageManager;
use App\Controller\ImageController;

class ProductController extends AbstractController
{
public function index(): string
    {
        $productManager = new ProductManager();
        $products = $productManager->selectAll('name');

        return $this->twig->render('Product/index.html.twig', ['products' => $products]);
    }

public function show(int $id): string
    {
        $productManager = new ProductManager();
        $product = $productManager->selectOneById($id);

        return $this->twig->render('Product/show.html.twig', ['product' => $product]);
    }

public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = array_map('trim', $_POST); 
            $productManager = new ProductManager();
            $id = $productManager->insert($product);

            $image = new ImageController();
            $image->addImage($_FILES, $id);                        
            header('Location: /products/show?id=' . $id);
            return null;
        }
        return $this->twig->render('Product/add.html.twig');
    }

}

// if ($errors) {
//     foreach ($errors as $error) {
//         echo "<p>" . $error . "</p>";
//     }
// }