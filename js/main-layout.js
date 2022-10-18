const insertChocoProjects = () => {
    const html = document.createElement('div');
    html.innerHTML = `<div class="choco-projects">
    <div class="choco-projects__content">
        <nav class="choco-projects__nav">
            <a class="choco-project__item">
                <p>Скидки до 10%</p>
                <img src="https://www.chocotravel.com/media/v3/media/images/chocoprojects/chocolife.svg"/>
            </a>
            <a class="choco-project__item" href="/index.html">
                <p>Авиабилеты</p>
                <img src="https://www.chocotravel.com/media/v3/media/images/chocoprojects/chocotravel.svg"/>
            </a>
            <a class="choco-project__item">
                <p>Оптика</p>
                <img src="https://www.chocotravel.com/media/v3/media/images/chocoprojects/lensmark.svg"/>
            </a>
            <a class="choco-project__item">
                <p>Заказ еды</p>
                <img src="https://www.chocotravel.com/media/v3/media/images/chocoprojects/chocofood.svg"/>
            </a>
        </nav>
        <a href="../choco-travel/login-email.html" class="choco-projects__login">
            Войти
        </a>
    </div>
    </div>`;
    const body = document.querySelector('body');
    body.insertBefore(html, body.firstChild);
}

const insertHeader = () => {
    const html = document.createElement('div');
    html.className = 'container';
    html.innerHTML = `
<header class="header">
            <a class="header__logo">
                <img alt="" src="https://www.chocotravel.com/media/v3/media/images/chocotravel-logo.svg">
            </a>
            <ul class="main-menu">
                <a href="../choco-travel/index.html" class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/plane.svg">
                    <p>Авиабилеты</p>
                </a>
                <a href="../choco-travel/railway.html" class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/jd_ticket.png">
                    <p>ЖД Билеты</p>
                </a>
                <a class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/hotel.svg">
                    <p>Отели</p>
                </a>
                <a  href="../choco-travel/rentalcars.html" class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/rentalcars.svg">
                    <p>Аренда авто</p>
                </a>
                <a href="../choco-travel/visa.html" class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/visa.svg">
                    <p>Виза</p>
                </a>
                <a href="../choco-travel/tours.html" class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/tours.svg">
                    <p>Туры</p>
                </a>
            </ul></header>
        `;
    const mainLayoutDiv = document.querySelector('.main-layout');
    mainLayoutDiv.insertBefore(html, mainLayoutDiv.firstChild)
}

const insertFooter = () => {
    const html = document.createElement('footer');
    html.className = 'footer';
    html.innerHTML = `<div class="container">
        <div class="footer__top">
            <div  class="footer__nav">
                <p class="nav__title">О нас</p>
                <a href="../choco-travel/about.html" class="nav__item">О нас</a>
                <a href="../choco-travel/contacs.html" class="nav__item">Контакты</a>
                <a class="nav__item">Блог</a>
                <a class="nav__item">Способы оплаты</a>
            </div>
            <div class="footer__nav">
                <p class="nav__title">Авиакомпании</p>
                <a href="../choco-travel/faq.html" class="nav__item">SCAT</a>
                <a class="nav__item">Air Astana</a>
                <a class="nav__item">Qazaq Air</a>
                <a class="nav__item">BEK Air</a>
            </div>
             <div class="footer__nav">
                <p class="nav__title">Пользователям</p>
                <a href="../choco-travel/faq.html" class="nav__item">Вопрос - ответ</a>
                <a class="nav__item">Отзывы</a>
                <a class="nav__item">Лучшие цены</a>
                <a class="nav__item">Регистрация</a>
            </div>
        </div>
</div>
    </div>`
    const body = document.querySelector('body');
    body.insertBefore(html, body.lastChild);
}

insertChocoProjects();
insertHeader();
insertFooter();