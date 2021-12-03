document.addEventListener('DOMContentLoaded', () => {

    function operateTabs() {
        let tabs = document.querySelectorAll('.tab');
        let content = document.querySelectorAll('.content-item');

        function removeActive() {
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
                content[i].classList.remove('active');
            }
        }

        function tabClick(currentTab) {
            removeActive();
            tabs[currentTab].classList.add('active');
            content[currentTab].classList.add('active');
        }

        console.log(tabs, content);
    
        if (tabs && content) {
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].addEventListener('click', () => tabClick(i));
            }
        }
    
        
    }
    
    operateTabs();

    jQuery('.offers-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        prevArrow: '<button type="button" class="slick-arrow slick-prev"><</button>',
        nextArrow: '<button type="button" class="slick-arrow slick-next">></button>',
    })

    jQuery('.banners-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        prevArrow: '<button type="button" class="slick-arrow slick-prev"><</button>',
        nextArrow: '<button type="button" class="slick-arrow slick-next">></button>',
    })
})
    

    