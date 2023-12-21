//  START SLIDE DI SWIPER 
var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    initialSlide: 1,
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
    },
    pagination: {
        el: ".swiper-pagination",
    },
});
// AND SLIDE SWIPER


// NUMERI INCREMENTALI

let firstNumber = document.querySelector("#firstNumber");
let secondNumber = document.querySelector("#secondNumber");
let thirdNumber = document.querySelector("#thirdNumber");

if(firstNumber != null && secondNumber != null && thirdNumber != null)
{
function createInterval( number , element , timing ){

    let counter = 0;
    let interval =  setInterval( () => {
        
        if (counter < number) {
            counter++
            element.innerHTML = counter
        }else{
            clearInterval(interval);
        } 
    },  timing );
}
// INTERSECTION OBSERVE

let checked = false;

let observer = new IntersectionObserver( (entries)=> {
    entries.forEach((entry)=>  {
        
        if(entry.isIntersecting && checked == false){
            createInterval( 1000 , firstNumber , 10 );
            createInterval( 2000 , secondNumber , 5 );
            createInterval( 100 , thirdNumber , 100 );
            
            checked = true
        }
    })
}) 
observer.observe(firstNumber);
}

// AND NUMERI INCREMENTALI




// START TESTO DINAMICO
let TestoAlternato = document.querySelector("#TestoAlternato");
if(TestoAlternato)
{
function alternareTesti() {
    var TestoAlternatoDiv = document.getElementById("TestoAlternato");
    var testo1 = "PRESTO.IT";
    var testo2 = "ACQUISTA E VENDI SUL NOSTRO SITO";
    var alternato = false;

    setInterval(function() {
        TestoAlternatoDiv.innerHTML = alternato ? testo1 : testo2;
        alternato = !alternato;
    }, 3000);
}

document.addEventListener("DOMContentLoaded", alternareTesti);
}
// AND TESTO DINAMICO

// EVENTO CLICK SEARCHBAR
let search_delete = document.querySelector('#search-delete');
let mysearch = document.querySelector('#mysearch');

search_delete.addEventListener('click', () => mysearch.value = " ");


// //  START APERTURA SEARCHBAR
// const icon = document.querySelector('.icon');
//         const search = document.querySelector('.search');
//         icon.onclick = function(){
//             search.classList.toggle('active')
//         }
// // END APERTURA SEARCHBAR

