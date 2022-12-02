<?php
    session_start();
    $id = $GET['id'];
    $products = simplexml_load_file('data/products.xml');
    $i = 0;
    $index = 0;
    foreach($products->product as $product){
        if($product->id == $id){
            $index = $i;
            break;
        }
        $i++;
    }
    unset($products->product[$index]);
    file_put_contents('data/products.xml', $products->asXML());

    $_SESSION['message'] = 'successfull';

    
    header("location:index.php");
?>