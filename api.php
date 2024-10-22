<?php




header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");
// header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
// header("Content-Type: multipart/form-data");

include_once './Database.php';
include_once './Product.php';
include_once './GET.php';
include_once './DELETE.php';


$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);


if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['sku']) && isset($_GET['type'])){
        echo getBySKU($sku = $_GET['sku'], $type = $_GET['type']);
    }
    else{
        echo getAll();
    }
    
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $product = new Product($data);

    if($product->add()){
        echo json_encode(['message'=>'Product Added Successfully','success'=>true]);
    }else{
        echo json_encode(['error'=>'An Error Occured. Check params', 'success'=>false]);

    }
    
}elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    echo delete($selected_products = $data);
}
else{
    echo json_encode(['message'=>''.$_SERVER['REQUEST_METHOD'].' not allowed']);
}


