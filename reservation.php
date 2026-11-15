<?php
 date_default_timezone_set('Asia/Tokyo'); 

// Nhận dữ liệu khi quay lại từ trang xác nhận
$customer_name = $_POST["customer_name"] ?? "";
$customer_phone = $_POST["customer_phone"] ?? "";
$reservation_date = $_POST["reservation_date"] ?? "";
$reservation_time = $_POST["reservation_time"] ?? "";
$party_size = $_POST["party_size"] ?? "";
$note = $_POST["note"] ?? "";

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
    <title>reservation</title>
    <link rel="stylesheet" href="assets/css/reservation.css">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container">
                <a href="index.php" class="header__logo">
                    <h2>Sushi-RO</h2>
                </a>

                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a href="index.php" class="header__nav-link">トップ</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="reservation.php" class="header__nav-link">ご予約</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="reservation_lookup.php" class="header__nav-link">予約照会</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <main class="main">
            <div class="reservation__content">
                <div class="reservation__form">
                    <div class="reservation__title">
                        <h2>ご予約</h2>
                    </div>

                    <section class="reservation__steps">
                        <div class="reservation__step-active">
                            <div class="step__active">
                                <span class="step__number">1</span>
                                <span class="step__label-active">入力</span>
                            </div>
                            <div class="step">
                                <span class="step__number">2</span>
                                <span class="step__label">確認</span>
                            </div>
                            <div class="step">
                                <span class="step__number">3</span>
                                <span class="step__label">完了</span>
                            </div>
                        </div>
                    </section>
                </div>

                <form action="reservation_confirm.php" method="POST" class="reservation__form-input">
                    <div class="main__form-group">
                        <div class="reservation-form__column">

                            <div class="form__date">
                                <div class="main__form-label">ご来店日</div>
                                <input type="date" lang="ja-JP" class="main__form-input" id="reservation_date"
                                    name="reservation_date" value="<?= h($reservation_date) ?>" required min="<?= date('Y-m-d') ?>">
                            </div>

                            <div class="form__number-of-guests">
                                <label for="number-of-guests" class="main__form-label">
                                    人数
                                </label>
                                <select id="number-of-guests" name="party_size" class="main__form-input" required>
                                    <option value="" disabled selected>人数を選択してください</option>
                                    <option value="1">1名</option>
                                    <option value="2">2名</option>
                                    <option value="3">3名</option>
                                    <option value="4">4名</option>
                                    <option value="5">5名</option>
                                    <option value="6">6名</option>
                                    <option value="7">7名</option>
                                    <option value="8">8名</option>
                                    <option value="9">9名</option>
                                    <option value="10">10名</option>
                                </select>
                            </div>

                            <div class="form__phone-number">
                                <div class="main__form-label">電話番号 </div>
                                <input type="tel" id="customer__phone" name="customer_phone" class="main__form-input"
                                    placeholder="090-0000-0000" value="<?= h($customer_phone) ?>" required>
                            </div>
                        </div>

                        <div class="reservation-form__column">
                            <div class="form__arrival-time">
                                <label for="arrival_time" class="main__form-label">
                                    ご来店時間
                                </label>

                                <select class="main__form-input" id="arrival_time" name="reservation_time" required>

                                    <option value="">時間を選択してください</option>
                                    <option value="11:00" <?= $reservation_time === "11:00" ? "selected" : "" ?>>11:00</option>
                                    <option value="11:30" <?= $reservation_time === "11:30" ? "selected" : "" ?>>11:30</option>
                                    <option value="12:00" <?= $reservation_time === "12:00" ? "selected" : "" ?>>12:00</option>
                                    <option value="12:30" <?= $reservation_time === "12:30" ? "selected" : "" ?>>12:30</option>
                                    <option value="13:00" <?= $reservation_time === "13:00" ? "selected" : "" ?>>13:00</option>
                                    <option value="13:30" <?= $reservation_time === "13:30" ? "selected" : "" ?>>13:30</option>
                                    <option value="14:00" <?= $reservation_time === "14:00" ? "selected" : "" ?>>14:00</option>
                                    <option value="14:30" <?= $reservation_time === "14:30" ? "selected" : "" ?>>14:30</option>
                                    <option value="15:00" <?= $reservation_time === "15:00" ? "selected" : "" ?>>15:00</option>
                                    <option value="15:30" <?= $reservation_time === "15:30" ? "selected" : "" ?>>15:30</option>
                                    <option value="16:00" <?= $reservation_time === "16:00" ? "selected" : "" ?>>16:00</option>
                                    <option value="16:30" <?= $reservation_time === "16:30" ? "selected" : "" ?>>16:30</option>
                                    <option value="17:00" <?= $reservation_time === "17:00" ? "selected" : "" ?>>17:00</option>
                                    <option value="17:30" <?= $reservation_time === "17:30" ? "selected" : "" ?>>17:30</option>
                                    <option value="18:00" <?= $reservation_time === "18:00" ? "selected" : "" ?>>18:00</option>
                                    <option value="18:30" <?= $reservation_time === "18:30" ? "selected" : "" ?>>18:30</option>
                                    <option value="19:00" <?= $reservation_time === "19:00" ? "selected" : "" ?>>19:00</option>
                                    <option value="19:30" <?= $reservation_time === "19:30" ? "selected" : "" ?>>19:30</option>
                                    <option value="20:00" <?= $reservation_time === "20:00" ? "selected" : "" ?>>20:00</option>
                                    <option value="20:30" <?= $reservation_time === "20:30" ? "selected" : "" ?>>20:30</option>
                                    <option value="21:00" <?= $reservation_time === "21:00" ? "selected" : "" ?>>21:00</option>
                                    <option value="21:30" <?= $reservation_time === "21:30" ? "selected" : "" ?>>21:30</option>

                                </select>
                            </div>

                            <div class="form__customer-name">
                                <div class="main__form-label">お名前</div>
                                <input type="text" class="main__form-input" id="customer_name" name="customer_name"
                                    placeholder="田中" value="<?= h($customer_name) ?>" required>
                            </div>

                            <div class="form__special-requests">
                                <div class="main__form-label">ご要望（任意）</div>
                                <input type="text" class="main__form-input" id="note" name="note" 
                                    placeholder="窓側の席を希望します。" value="<?= h($note) ?>" >
                            </div>
                        </div>
                    </div>


                    <section class="form__footer">
                        <div class="form__footer-about">
                            <p>【キャンセルについて】<br>
                                ご予約のキャンセルは、ご予約日の2週間前までにお願いいたします。<br>
                                ご予約日の2週間前を過ぎると、キャンセルできませんので、あらかじめご了承ください。</p>
                        </div>

                        <button type="submit" class="reservation-form__submit">Submit</button>
                    </section>
                </form>

            </div>
            <div class="reservation__sidebar">
                <form action="" class="restaurant-info">
                    <div class="restaurant-info-img">
                        <img src="assets/images/ban.png" alt="" class="">
                    </div>

                    <div class="restaurant-info-description">
                        <h3>店舗情報</h3><br>
                        <span>営業時間 <br>
                            11:00〜21:30 <br>
                            電話番号 <br>
                            092-XXX-XXXX</span>
                    </div>
                </form>
            </div>
        </main>

        <footer class="footer">レストラン彩</footer>
    </div>
</body>

</html>