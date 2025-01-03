let currentSlide = 0;

function moveSlide(direction) {
    const container = document.querySelector('.card-container');
    const cards = document.querySelectorAll('.card');
    const cardWidth = cards[0].offsetWidth;
    const gap = 16; // This should match the gap in your CSS (1rem = 16px)
    const totalSlides = cards.length;
    
    // Update current slide
    currentSlide = (currentSlide + direction);
    
    // Add bounds checking
    if (currentSlide < 0) {
        currentSlide = 0;
    } else if (currentSlide >= totalSlides - 1) {
        currentSlide = totalSlides - 1;
    }
    
    // Calculate the scroll position
    const scrollPosition = currentSlide * (cardWidth + gap);
    
   // Smooth scroll to the position
    container.scrollTo({
        left: scrollPosition,
        behavior: 'smooth'
    });

    // Update button states
    updateButtons();
}

// Add function to update button states
function updateButtons() {
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    
    // Disable/enable buttons based on position
    if (currentSlide === 0) {
        prevButton.style.opacity = '0.5';
        prevButton.style.cursor = 'not-allowed';
    } else {
        prevButton.style.opacity = '1';
        prevButton.style.cursor = 'pointer';
    }
    
    const cards = document.querySelectorAll('.card');
    if (currentSlide >= cards.length - 1) {
        nextButton.style.opacity = '0.5';
        nextButton.style.cursor = 'not-allowed';
    } else {
        nextButton.style.opacity = '1';
        nextButton.style.cursor = 'pointer';
    }
}

// Initialize button states when page loads
document.addEventListener('DOMContentLoaded', function() {
    updateButtons();
});

  const slides = document.querySelectorAll('.card');
  const totalSlides = slides.length;
  const container = document.querySelector('.card-container');

  currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
  const offset = -currentSlide * 100 / totalSlides;
  container.style.transform = `translateX(${offset}%)`;

