<?php
session_start();
require_once __DIR__ . "/config/dbconnect.php";

$id = (int)($_SESSION["lookup_id"] ?? 0);

if ($id <= 0) {
    header("Location: reservation_lookup.php");
    exit;
}

// 2. Truy vấn Database
$sql = "
    SELECT *
    FROM reservations
    WHERE id = :id
    LIMIT 1
";

// 3. Prepare
$stmt = $pdo->prepare($sql);

// 4. Execute
$stmt->execute([
    ":id" => $id
]);

// 5. Nhận dữ liệu
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    exit("予約情報が見つかりません。");
}

// 6. Hàm xử lý HTML
function h($value)
{
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        "UTF-8"
    );
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation_result</title>
    <link rel="stylesheet" href="assets/css/reservation_result.css">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container">
                <a href="index.html" class="header__logo">
                    <h2>Sushi-RO</h2>
                </a>

                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a href="index.html" class="header__nav-link">トップ</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="reservation.php" class="header__nav-link">ご予約</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="" class="header__nav-link">予約照会</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main">
            <div class="reservation__lookups">
                <div class="reservation__lookup-title">
                    <h2>予約の照会・取消</h2>
                </div>

                <form action="reservation_lookup_check.php" class="reservation__lookup" method="POST">
                    <div class="reservation__lookup-form">
                        <div class="lookup__code">
                            <label for="" class="lookup__lable">予約番号</label>
                            <input type="text" name="reservation_code" class="lookup__input" placeholder="bc69d4" value=" <?= h($row['reservation_code']) ?>" required>
                        </div>

                        <div class="lookup__phone">
                            <label for="" class="lookup__lable">電話番号（本人確認）</label>
                            <input type="tel" name="customer_phone" class="lookup__input" placeholder="090-0000-0000" value="  <?= h($row['customer_phone']) ?>" required>
                        </div>

                        <div class="footer">
                            <button type="submit" class="button__lookup">照会する</button>

                        </div>

                        <span class="span">※ 予約番号だけでは照会できません。
                            電話番号などで本人確認を行います。
                        </span>
                    </div>
                </form>
            </div>

            <div class="reservation__results">

                <div class="reservation__result">

                    <div class="reservation__result-form">
                        <div class="reservation__result-title">
                            <h3>照会結果</h3>
                        </div>

                        <div class="reservation__code">
                            <div for="" class="result__lable">予約番号</div>
                            <h3 class="result__input"><?= h($row['reservation_code']) ?></h3>
                        </div>

                        <div class="customer_phone">
                            <div for="" class="result__lable">電話番号</div>
                            <h3 class="result__input"><?= h($row['customer_phone']) ?></h3>
                        </div>

                        <div class="customer_name">
                            <div for="" class="result__lable">お名前</div>
                            <h3 class="result__input"><?= h($row['customer_name']) ?></h3>
                        </div>

                        <div class="reservation__date">
                            <div for="" class="result__lable">日時</div>
                            <h3 class="result__input"><?= h($row['reservation_date']) ?></h3>
                            <h3 class="result__input"><?= h($row['reservation_time']) ?></h3>
                        </div>

                        <div class="paty__size">
                            <div for="" class="result__lable">人数</div>
                            <h3 class="result__input"><?= h($row['party_size']) ?>名</h3>
                            <h3 class="result__input"><?= h($row['note']) ?></h3>
                        </div>

                        <div class="status">
                            <div for="" class="result__lable">状態</div>
                            <h3 class="result__input"><?= h($row['status']) ?></h3>
                        </div>
                        <div class="footer">
                            <button type="submit" class="button__edit">予約を変更する</button>
                            <button type="submit" class="button__Cancel">予約を取り消す</button>

                        </div>

                        <span class="span">※ 取消は条件を満たす場合のみ可能です。
                        </span>
                    </div>
                </div>
            </div>

        </main>

    </div>
</body>

</html>