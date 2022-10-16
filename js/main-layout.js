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
        <a class="choco-projects__login">
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
                <a href="../index.html" class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/plane.svg">
                    <p>Авиабилеты</p>
                </a>
                <a href="../railway.html" class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/jd_ticket.png">
                    <p>ЖД Билеты</p>
                </a>
                <a class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/hotel.svg">
                    <p>Отели</p>
                </a>
                <a class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/rentalcars.svg">
                    <p>Аренда авто</p>
                </a>
                <a class="main-menu__item">
                    <img alt="" src="https://www.chocotravel.com/media/v3/media/images/visa.svg">
                    <p>Виза</p>
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
        Здесь скоро футер будет
    </div>`
    const body = document.querySelector('body');
    body.insertBefore(html, body.lastChild);
}

insertChocoProjects();
insertHeader();
insertFooter();