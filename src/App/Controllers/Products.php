<?php

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;

class Products
{
    public function index()
    {
        $model = new Product;

        $products = $model->getData();

        $viewer = new Viewer;

        echo $viewer->render("Products/index.php", [
            "products" => $products
        ]);
    }

    public function show()
    {
        $viewer = new Viewer;

        echo $viewer->render("Products/show.php");
    }
}