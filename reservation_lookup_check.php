<?php
session_start();

//Kết nối DB.
require_once __DIR__ . "/config/dbconnect.php";

//Chặn không phải POST.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("不正なアクセスです。");
}
//Nhận mã và số điện thoại, trim().
$reservation_code = trim($_POST['reservation_code'] ?? "");
$customer_phone = trim($_POST['customer_phone'] ?? "");

//Nếu một trong hai rỗng thì dừng.
if ($reservation_code === "" || $customer_phone === "") {
    exit("入力内容を確認してください。");
}

//Chuẩn bị SQL
$sql = "SELECT id 
        FROM reservations 
        WHERE reservation_code = :reservation_code 
        AND customer_phone = :customer_phone 
        LIMIT 1
        ";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":reservation_code" => $reservation_code,
    ":customer_phone" => $customer_phone
]);

$reservation = $stmt->fetch(PDO::FETCH_ASSOC);

if ($reservation) {
    session_regenerate_id(true);
    $_SESSION["lookup_id"] = (int)$reservation["id"];
    header("Location: reservation_result.php");
    exit;
}
