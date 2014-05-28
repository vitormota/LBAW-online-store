<?php

function getAllProcucts() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM product");
    $stmt->execute();
    return $stmt->fetchAll();
}

function updateProduct($id, $title, $description, $price, $stock, $img) {
    global $conn;

    $sql = 'UPDATE product SET title =?, ' .
            ($img ? 'img =' . $img . ',' : '') .
            ' description =?, price = ?, stock = ? WHERE idproduct = ?';

    $stmt = $conn->prepare($sql);
    return $stmt->execute(array($title, $description, $price, $stock, $id));
}

function getNotRemovedProducts() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM product WHERE removed=false");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getProductsByName($namepart) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM product WHERE LOWER(title) LIKE LOWER(?) and removed=false");
    $stmt->execute(array("%" . $namepart . "%"));
    return $stmt->fetchAll();
}


function getProductsByCat($idcat) {
    global $conn;
   $stmt = $conn->prepare("SELECT product.idproduct, product.title,
        product.stock, product.price,
        product.img, product.description,
        product.idcategory, cat.name
        FROM product
        INNER JOIN category cat
        ON cat.idcategory = product.idcategory
        WHERE cat.idcategory = ?
        ");
    $stmt->execute(array($idcat));
    return $stmt->fetchAll();
}


function getProductsByDep($iddep) {
    global $conn;
   $stmt = $conn->prepare("SELECT product.idproduct, product.title,
        product.stock, product.price,
        product.img, product.description,
        product.idcategory, cat.name,
        cat.iddepartment, dep.name
        FROM product
        INNER JOIN category cat
        ON cat.idcategory = product.idcategory
        INNER JOIN department dep
        ON dep.iddepartment = cat.iddepartment
        WHERE dep.iddepartment = ?
        ");
    $stmt->execute(array($iddep));
    return $stmt->fetchAll();
}

//Return a product filters by prod id
function getProductFilters($prod_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * from filter
                    INNER JOIN prodfilter
                    ON filter.idfilter = prodfilter.idfilter
                    WHERE prodfilter.idproduct = $prod_id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Full details, except filters
function getProductById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT product.idproduct, product.title,
        product.stock, product.price,
        product.img, product.description,
        cat.idcategory,
        cat.iddepartment,
        cat.name as catname,
        dep.name as depname
        FROM product
        INNER JOIN category cat
        ON cat.idcategory = product.idcategory
        INNER JOIN department dep
        ON cat.iddepartment = dep.iddepartment
        WHERE product.idproduct = ?");
        //GROUP BY dep.iddepartment, cat.idcategory, product.idproduct
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//DEPRECATED - use getNextProdId
function getMaxProdId() {
    global $conn;
    $stmt = $conn->prepare("SELECT Max(idproduct) FROM product");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function getNextProdId() {
    global $conn;
    $stmt = $conn->prepare("SELECT last_value FROM product_idproduct_seq");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function addProduct($title, $description, $price, $stock, $img, $catid) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO product(title,description,price,stock,img,idcategory) VALUES (?,?,?,?,?,?)");

    return $stmt->execute(array($title, $description, $price, $stock, $img, $catid));
}

function getWishListProducts($email) {
    global $conn;

    $stmt = $conn->prepare("select product.idproduct,
    product.title, product.description,
    product.price,product.stock,
    product.removed,product.img,
    product.idcategory from product,user_,
    wishlist where user_.email = ?
    AND user_.idUser = wishlist.idUser
    AND product.idProduct = wishlist.idProduct;");
    $stmt->execute(array($email));

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function addProductToWishList($email, $id) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO wishlist(iduser,idproduct,date_added)
    VALUES ((SELECT user_.iduser from user_ where user_.email = ?),?,null)");

   return $stmt->execute(array($email, $id));
}

function isOnWishList($email, $id) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM wishlist,user_ where user_.email = ? AND
    wishlist.iduser = user_.idUser AND wishlist.idProduct = ?");
    $stmt->execute(array($email, $id));
    return $stmt->fetchAll();
}

function purchasedProductBuyer($email, $id) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM user_, order_, orderline where user_.email = ? AND
    order_.idbuyer = user_.iduser AND orderline.idorder = order_.idorder AND orderline.idproduct = ?");
    $stmt->execute(array($email, $id));
    return $stmt->fetchAll();
}

function productReviewdByBuyer($email, $id) {
    global $conn;

    $stmt = $conn->prepare("SELECT review.text, review.rating FROM review, user_, order_ where user_.email = ? AND
    order_.idbuyer = user_.iduser AND order_.idorder = review.idorder AND review.idproduct = ?");
    $stmt->execute(array($email, $id));
    return $stmt->fetch();
}

function averageRatingByProduct($id) {
    global $conn;

    $stmt = $conn->prepare("SELECT AVG(rating) AS average, count(*) AS numreviews FROM review where review.idproduct = ?");
    $stmt->execute(array($id));
    return $stmt->fetch();
}

function reviewsByProduct($id) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM review, order_, user_ where review.idproduct = ? AND review.idorder = order_.idorder
            AND order_.idbuyer = user_.iduser");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}