<?php
    session_start();
    if(isset($_POST['productId'],
        $_POST['productName'],
        $_POST['productPrice'],
        $_POST['productImage'],
    )){
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productImage = $_POST['productImage'];
        //พื้นที่ส้างตระกร้า
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach($_SESSION['cart'] as &$item) {
            if($item['productId'] == $productId) {
                $item['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if(!$found) {
            $_SESSION['cart'][] = [
                'productId' => $productId,
                'productName' => $productName,
                'productPrice' => $productPrice,
                'productImage' => $productImage,
                'quantity' => 1
            ];
        }
    }
?>