<?php
    session_start();
    require_once "db.php";
    if(isset($_SESSION['user_id'])){
        $cities = mysqli_query($conn, "select * from cities");
    }
    else {
        header("Location: login-email.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styles/common.css" rel="stylesheet"/>
    <link href="styles/index.css" rel="stylesheet"/>
    <style>
        .select-city {
            width: 174px;
            height: 55px;
            line-height: 20px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            color: rgba(0, 13, 67, .87);
            font-size: 15px;
            float: left;
            padding: 0 20px 0 13px;
            border: 1px solid var(--color-gray);
        }
    </style>
</head>
<body>
<div class="main-layout">
    <div class="container">
        <h1 class="title">Авиабилеты в Казахстане</h1>
        <form action="index-result.php" method="POST" class="search">
            <div class="search__input">
                <select
                    class="select-city"
                    name="from"
                    style="border-left: none; border-right: none"
                    placeholder="Откуда"
                    id="from"
                >
                    <option value=""></option>
                    <?php foreach($cities as $city) : ?>
                        <option value="<?php echo $city['id']?>"> <?php echo $city['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="example">
                    <span>Алматы</span>
                    <span>Африка</span>
                </p>
            </div>
            <div class="search__swap" id="swap" >
                <div></div>
            </div>
            <div class="search__input">
                <select
                    class="select-city"
                    style="border-left: none; border-right: none"
                    placeholder="Куда"
                    name="to"
                    id="to"
                >
                    <option value=""></option>
                    <?php foreach($cities as $city) : ?>
                        <option value="<?php echo $city['id']?>"> <?php echo $city['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="example">
                    <span>Алматы</span>
                    <span>Африка</span>
                </p>
            </div>
            <div class="search-form__date_choose">
                <div class="search-form__date_choose__event"></div>
                <div class="left-line"></div>
                <input name="flight_date" class="event__input-no" id="date" placeholder="Дата" type="date">
                <div class="clear"></div>
            </div>
            <select class="search-form__passengers" name="type">
                <div class="left-line"></div>
                <div class="psngrs_type">Класс</div>
                <div class="psngrs_number">Эконом</div>
                <option value="Econom">Эконом</option>
                <option value="Business">Бизнес</option>
                <option value="Comfort">Комфорт+</option>
            </select>
            <button type="submit" class="search__submit">
                Искать
            </button>
        </form>
        <div class="advantages">
            <h2 class="adv__title">Подробнее о поиске авиабилетов на Chocotravel</h2>
            <h3 class="adv__subtitle">Именно по этим причинам люди используют Chocotravel как бесплатный сервис по
                поиску авиабилетов</h3>
            <ul class="adv-list">
                <li class="adv-item">
                    <img src="https://www.chocotravel.com/media/v3/media/images/mainpage-features/mainpage-features-plane.svg"
                         alt="">
                    <p class="adv-item__title">1000 авиакомпаний</p>
                    <p class="adv-item__subtitle">Chocotravel.com сравнивает предложения более 1000 авиакомпаний мира,
                        чтобы найти для вас лучший вариант перелета</p>
                </li>
                <li class="adv-item">
                    <img src="https://www.chocotravel.com/media/v3/media/images/mainpage-features/mainpage-features-wallet.svg"
                         alt="">
                    <p class="adv-item__title">Авиабилеты по цене авиакомпаний</p>
                    <p class="adv-item__subtitle">На Chocotravel.com вы приобретаете билеты по стоимости авиакомпании,
                        без скрытых комиссий и сборов, а иногда даже дешевле</p>
                </li>
                <li class="adv-item">
                    <img src="https://www.chocotravel.com/media/v3/media/images/mainpage-features/mainpage-features-clock.svg"
                         alt="">
                    <p class="adv-item__title">Круглосуточная поддержка</p>
                    <p class="adv-item__subtitle">Мы решаем ваши проблемы 24 часа в сутки</p>
                </li>
                <li class="adv-item">
                    <img src="https://www.chocotravel.com/media/v3/media/images/mainpage-features/mainpage-features-touch.svg"
                         alt="">
                    <p class="adv-item__title">Покупка за 3 минуты</p>
                    <p class="adv-item__subtitle">Вы экономите время, больше не нужно ездить в агентства. Проводите
                        время с любимыми</p>
                </li>
                <li class="adv-item">
                    <img src="https://www.chocotravel.com/media/v3/media/images/mainpage-features/mainpage-features-mobile.svg"
                         alt="">
                    <p class="adv-item__title">Все билеты в твоем мобильном</p>
                    <p class="adv-item__subtitle">Полнофункциональные мобильные приложения для Android и IOS</p>
                </li>
                <li class="adv-item">
                    <img src="https://www.chocotravel.com/media/v3/media/images/mainpage-features/mainpage-features-handshake.svg"
                         alt="">
                    <p class="adv-item__title">Надежность</p>
                    <p class="adv-item__subtitle">Нам доверяют более 200 000 казахстанцев ежегодно</p>
                </li>
            </ul>
        </div>
        <div class="subscript">
            <img src="https://www.chocotravel.com/media/v3/media/images/subscribe-icon.svg" alt="">
            <p>Подпишитесь на рассылку и будьте в курсе всех самых выгодных цен и интересных новостей!</p>
            <form action="">
                <input placeholder="Ваша почта" type="text">
                <button>Подписаться</button>
            </form>
        </div>
        <div class="about-us">
            <p>Часто сталкиваетесь с необходимостью купить билеты на самолет? Думали ли Вы о том,как было бы здорово,
                если бы бронирование авиабилетов занимало всего 5 минут? Теперь это стало реально! Благодаря сервису
                Chocotravel.com купить авиабилеты онлайн в Казахстане можно в несколько кликов.</p>
            <b>Покупка ЖД и авиабилетов онлайн:</b>
            <p>1. Экономит Ваше время.</p>
            <p>Автоматизированная система поиска в режиме онлайн после ввода параметров находит лучшие варианты
                авиаперелета, предлагаемые всеми доступными авиакомпаниями. За считанные минуты перед Вами появится
                перечень выгодных предложений более чем от 1000 авиакомпаний. При этом Вам совершенноне нужно ехать в
                другой конец города и напрасно тратить время в длинных очередях в кассе!</p>
            <p>2. Экономит Ваши деньги.</p>
            <p>Вы сможете подобрать дешевые авиабилеты по различным направлениям. Цены на авиабилеты порадуют Вас, ведь
                мы продаем их без наценок.</p>
            <p>3. Множество способов оплаты.</p>
            <p>Вы можете оплатить покупку любым удобным для вас способом</p>
        </div>
        <div class="media">
            <header class="media__header">СМИ о нас</header>
            <ul class="media__list">
                <li class="media-item">
                    <img src="https://s3.eu-central-1.amazonaws.com/chocotravel/media/images/massmedia/65x25/08bmwvvymkjlcv6qyimu.jpg"
                         alt="">
                </li>
                <li class="media-item">
                    <img src="https://s3.eu-central-1.amazonaws.com/chocotravel/media/images/massmedia/65x25/moz1ydofooegeidb70gm.png"
                         alt="">
                </li>
                <li class="media-item">
                    <img src="https://s3.eu-central-1.amazonaws.com/chocotravel/media/images/massmedia/65x25/moz1ydofooegeidb70gm.png"
                         alt="">
                </li>
                <li class="media-item">
                    <img src="https://s3.eu-central-1.amazonaws.com/chocotravel/media/images/massmedia/65x25/5j360putqmg1gemph2pm.jpg"
                         alt="">
                </li>
                <li class="media-item">
                    <img src="https://s3.eu-central-1.amazonaws.com/chocotravel/media/images/massmedia/65x25/08bmwvvymkjlcv6qyimu.jpg"
                         alt="">
                </li>
            </ul>
        </div>
        <div class="app">
            <div class="app__left">
                <img src="https://www.chocotravel.com/media/v3/media/images/mainpage/download-app.png" alt="">
            </div>
            <div class="app-right">
                <p class="app__title">УСТАНОВИ ПРИЛОЖЕНИЕ CHOCOTRAVEL!</p>
                <p class="app_desc">Все билеты без наценок в твоем мобильном.</p>
                <p class="app_get-link">Получить ссылку для скачивания по СМС</p>
                <input placeholder="+7" class="app__input" type="text">
                <ul class="app_list">
                    <li class="app-item">
                        <img src="https://www.chocotravel.com/media/v3/media/images/icons/apps/app-store-badge.svg"
                             alt="">
                    </li>
                    <li class="app-item">
                        <img src="https://www.chocotravel.com/media/v3/media/images/icons/apps/google-play-badge.png"
                             alt="">
                    </li>
                    <li class="app-item">
                        <img src="https://www.chocotravel.com/media/v3/media/images/icons/apps/app-gallery-badge.png"
                             alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    const sw = document.getElementById("swap").addEventListener('click', (e) => {
        const from = document.getElementById("from").value; 
        const to = document.getElementById("to").value;
        document.getElementById("from").value = to;
        document.getElementById("to").value = from; 
    })

    const id = document.getElementById("date");
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    } 
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("min", today);

</script>
<script src="./js/index.js"></script>
<script src="./js/main-layout.js"></script>
</body>
</html>