const categories = document.querySelectorAll('.faq-category');
const allQuestions = document.querySelectorAll('.all');

for(let i = 0; i < categories.length; i++){
    categories[i].addEventListener('click', filterQuestions.bind(this, categories[i]));
}

function filterQuestions(item){
    changeActive(item);
    for(let i = 0; i < allQuestions.length; i++){
        if(allQuestions[i].classList.contains(item.attributes.id.value)){
            allQuestions[i].style.display = "block";
        } else{
            allQuestions[i].style.display = 'none';
        }
    }
}

function changeActive(activeItem){
    for(let i = 0; i < categories.length; i++){
        categories[i].classList.remove('category-active');
    }
    activeItem.classList.add('category-active');
}






for(let i = 0; i < allQuestions.length; i++){
    allQuestions[i].children[0].addEventListener('click', () =>{
        if(allQuestions[i].classList.contains('faq-result-item-active')){
            allQuestions[i].classList.remove('faq-result-item-active');
        } else{
            allQuestions[i].classList.add('faq-result-item-active');
        }
    })
}
