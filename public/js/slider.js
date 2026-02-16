console.log('Slider script loaded');
document.addEventListener('DOMContentLoaded', function () {
    const carouselSlide = document.getElementById('carousel-slide');
    const carouselImages = document.querySelectorAll('#carousel-slide img');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const carouselNav = document.getElementById('carousel-nav');

    let counter = 0;

    function getImageWidth() {
        // Get the width of the carousel container divided by number of images visible at once
        return carouselSlide.clientWidth;
    }

    // Create navigation dots
    carouselImages.forEach((img, index) => {
        const dot = document.createElement('div');
        dot.classList.add('w-3', 'h-3', 'rounded-full', 'cursor-pointer', 'transition-colors', 'duration-300');
        dot.classList.add(index === 0 ? 'bg-white' : 'bg-white/50');
        dot.addEventListener('click', () => {
            goToSlide(index);
        });
        carouselNav.appendChild(dot);
    });

    const dots = document.querySelectorAll('#carousel-nav div');

    // Set up the slider
    function updateCarousel() {
        const size = getImageWidth();
        carouselSlide.style.transform = `translateX(${-size * counter}px)`;

        // Update active dot
        dots.forEach((dot, index) => {
            dot.classList.toggle('bg-white', index === counter);
            dot.classList.toggle('bg-white/50', index !== counter);
        });
    }

    updateCarousel();

    // Next button
    nextBtn.addEventListener('click', () => {
        if (counter >= carouselImages.length - 1) {
            counter = 0;
        } else {
            counter++;
        }
        updateCarousel();
    });

    // Previous button
    prevBtn.addEventListener('click', () => {
        if (counter <= 0) {
            counter = carouselImages.length - 1;
        } else {
            counter--;
        }
        updateCarousel();
    });

    // Auto slide (optional)
    let autoSlide = setInterval(() => {
        if (counter >= carouselImages.length - 1) {
            counter = 0;
        } else {
            counter++;
        }
        updateCarousel();
    }, 5000);

    // Pause on hover
    carouselSlide.addEventListener('mouseenter', () => {
        clearInterval(autoSlide);
    });

    carouselSlide.addEventListener('mouseleave', () => {
        autoSlide = setInterval(() => {
            if (counter >= carouselImages.length - 1) {
                counter = 0;
            } else {
                counter++;
            }
            updateCarousel();
        }, 5000);
    });

    // Go to specific slide
    function goToSlide(index) {
        counter = index;
        updateCarousel();
    }

    // Handle window resize
    window.addEventListener('resize', () => {
        carouselSlide.style.transition = 'none';
        updateCarousel();
        setTimeout(() => {
            carouselSlide.style.transition = 'transform 1s ease-in-out';
        });
    });

    // Set current year in footer (if exists)
    const yearEl = document.getElementById('year');
    if (yearEl) {
        yearEl.textContent = new Date().getFullYear();
    }
});
