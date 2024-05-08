import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect(){
        this.reviewSlider();
        this.portfolioSlider();
    }
    
    reviewSlider(){
        const reviewSlider = new Swiper('.review-slider', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            // If we need pagination
            pagination: {
              el: '.swiper-pagination',
            },
          
            // Navigation arrows
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
          
        });
    }
    
    portfolioSlider(){
        const portfolioSlider = new Swiper('.categories-slider', {
            // Optional parameters
            direction: 'horizontal',
            slidesPerView: 4,
            spaceBetween: 10,
            // If we need pagination
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        
        });
    }
}
