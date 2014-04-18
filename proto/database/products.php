<?php

function getAllProcucts() {
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM product");
	$stmt->execute();
	return $stmt->fetchAll();
}

function getNotRemovedProducts() {
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM product WHERE removed=false");
	$stmt->execute();
	return $stmt->fetchAll();
}

function getProductsByName($namepart){
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM product WHERE LOWER(title) LIKE LOWER('%$namepart%') and removed=false");
	$stmt->execute();
	return $stmt->fetchAll();
}


function getProductById($id) {
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM product WHERE idproduct=$id");
	$stmt->execute();
	return $stmt->fetch();	
}




function addProduct($title,$description,$price,$stock){
    global $conn;
    
    $sql = "INSERT INTO product(title,description,price,stock)"
            . "VALUES ($title,$description,$price,$stock)";
    
    return $conn->query($sql);
}


?>
