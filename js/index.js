const handleSearch = () => {
    window.history.go('../index-result.html')
}
// document.querySelector('.search__submit').addEventListener('click', handleSearch)

const pickTab = (number) => {
    const start = document.getElementById("start-booking");
    const cancel = document.getElementById("cancel-booking");
    const first = document.getElementById("first-form");
    const second = document.getElementById("second-form");

    if (number === 1) {
        start.classList.add("rental-cars__forms__tabs__tab_active");
        first.classList.add("rental-cars__forms__content__tab_active");
        second.classList.remove("rental-cars__forms__content__tab_active");
        cancel.classList.remove("rental-cars__forms__tabs__tab_active");
    } else if (number === 2) {
        cancel.classList.add("rental-cars__forms__tabs__tab_active");
        start.classList.remove("rental-cars__forms__tabs__tab_active");
        first.classList.remove("rental-cars__forms__content__tab_active");
        second.classList.add("rental-cars__forms__content__tab_active");
    }
}