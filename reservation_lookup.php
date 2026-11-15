<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation_lookup</title>
    <link rel="stylesheet" href="assets/css/reservation_lookup.css">
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
            <div class="reservation__lookup-title">
                <h2>予約の照会・取消</h2>
            </div>

            <form action="reservation_lookup_check.php" class="reservation__lookup" method="POST">
                <div class="reservation__lookup-form">
                    <div class="lookup__code">
                        <label for="" class="lookup__lable">予約番号</label>
                        <input type="text" class="lookup__input" name="reservation_code" placeholder="DB505C" required>
                    </div>

                    <div class="lookup__phone">
                        <label for="" class="lookup__lable">電話番号（本人確認）</label>
                        <input type="tel" class="lookup__input" name="customer_phone" placeholder="090-0000-0000" required>
                    </div>

                    <div class="footer">
                        <button type="submit" class="button">照会する</button>

                    </div>

                    <span class="span">※ 予約番号だけでは照会できません。
                        電話番号などで本人確認を行います。
                    </span>
                </div>
            </form>
        </main>

    </div>

    <?php

    ?>
</body>

</html>