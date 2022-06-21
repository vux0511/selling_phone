<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function connection(){
    $dburl = "mysql:host=localhost;dbname=webdt;charset=utf8";
    $username = 'root';
    $password = '';
    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

/**
 * Thực thi câu lệnh SQL
 */
function execute($sql){
    $conn = connection();
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}


/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * Lấy toàn bộ dữ liệu
 */
function selectAll($sql){
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}


/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 */
function selectOne($sql){
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function selectRow($sql){
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchColumn();
    return $data;
}



/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 */
function query_value($sql){
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row[0];
}


function limitInfo($str,$limit=100){
    if(strlen($str)<=$limit) return $str;
    return mb_substr($str,0,$limit-0,'UTF-8').'...';
}

// Lấy danh mục
function loadCategory() {
    $sql = "SELECT * FROM category";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Lấy Top Sản Phẩm
function loadTopProduct() {
    $sql = "SELECT * FROM product WHERE 1 ORDER BY view DESC LIMIT 0,5";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Lấy Sản Phẩm Theo Danh Mục
function loadTabProduct($sql) {
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Lấy sản phẩm theo id danh mục
function loadProductCategory($id_category,$from,$sotin1trang) {
    $sql = "SELECT * FROM product WHERE id_category = '$id_category' LIMIT $from,$sotin1trang";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Lấy sản phẩm liên quan
function loadOtherProduct($id_category) {
    $sql = "SELECT * FROM product WHERE id_category = $id_category LIMIT 5";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Lấy Top Sản Phẩm
function loadProduct() {
    $sql = "SELECT * FROM product LIMIT 8";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Lấy sản phẩm theo khoảng giá
function loadProductPrice($sql) {
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Load Product
function loadPageProduct($from,$sotin1trang) {
    $sql = "SELECT * FROM product LIMIT $from,$sotin1trang";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}


function loadDetail($sql) {
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

function loadImageDetail($sql) {
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}


function searchProduct($key) {
    $sql = "SELECT * FROM product WHERE name_product LIKE '%$key%' OR new_price_product LIKE '%$key%'";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}


// Hàm đăng kí
function insertUser($user, $password) {
    $sql = "INSERT INTO user (user, password) VALUES ('$user', '$password')";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Lấy sản phẩm từ DB ra theo Session
function loadProductCart($id_product) {
    $sql = "SELECT * FROM product WHERE id_product = '$id_product'";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

// Đặt hàng
function insertCart($sql) {
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}


// Hàm đăng kí
function insertBill($id_user, $address, $phone, $fullname, $note, $pay, $subtotal) {
    $sql = "INSERT INTO bill ( id_user, address, phone, fullname, note, pay, subtotal) VALUES ('$id_user','$address','$phone','$fullname','$note','$pay','$subtotal')";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $sql;
}

// Hàm tài khoản
function account($sql){
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row[0];
}