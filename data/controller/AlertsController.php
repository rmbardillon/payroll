<?php

include_once('../../config/database.php');
include_once('../model/Product.php');
include_once('../model/ProductDetails.php');

$action = $_GET['action'];
$ProductDetails = new ProductDetails($conn);
$Product = new Product($conn);

if ($action == 'getTableDataStockStatus') 
{
    $result = $Product->getAllByStockStatus();

    $table_data = '';
    $counter = 1;
    foreach ($result as $product) {
        $table_data .= '<tr>';
        $table_data .= '<td>' . $counter . '</td>';
        $table_data .= '<td>' . $product['BRAND'] . '</td>';
        $table_data .= '<td>' . $product['MODEL'] . '</td>';
        $table_data .= '<td>' . $product['IN_QUANTITY'] . '</td>';
        $table_data .= '<td><span class="category" style="color: red;">Low Stocks</span></td>';
        $table_data .= '<td><button class="btn btn-info restock" onclick="Alerts.restock(`' . $product['PRODUCT_DETAILS_ID'] .'`)">Restock</button></td>';
        $table_data .= '</tr>';

        $counter++;
        $_SESSION['alert_stock_status'] = $product['QUANTITY'];
    }
    echo json_encode($table_data);
}

else if($action == 'getAlertCount')
{
    $result = $Product->getAllAlert();
    foreach($result as $product)
    {
        $result = $product['TotalRows'];
    }
    echo json_encode($result);
}


