// script.js - Enhancements for the Hotel Management Website

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Form validation enhancements
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const inputs = form.querySelectorAll('input[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.style.borderColor = 'red';
                    isValid = false;
                } else {
                    input.style.borderColor = '#ddd';
                }
            });
            
            // Password validation
            const passwordInput = form.querySelector('input[name="password"]');
            if (passwordInput) {
                const password = passwordInput.value;
                const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{7,}$/;
                if (!passwordRegex.test(password)) {
                    passwordInput.style.borderColor = 'red';
                    isValid = false;
                    alert('Password must be at least 7 characters and contain at least one letter and one number.');
                } else {
                    passwordInput.style.borderColor = '#ddd';
                }
            }
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    });
});

// Dynamic welcome message
function updateWelcomeMessage() {
    const welcomeElement = document.querySelector('.nav li:nth-child(9)');
    if (welcomeElement && welcomeElement.textContent.includes('Welcome')) {
        const userName = welcomeElement.textContent.split(', ')[1].split('!')[0];
        welcomeElement.innerHTML = `<span style="color: #ffd700;">Welcome, ${userName}!</span>`;
    }
}

document.addEventListener('DOMContentLoaded', updateWelcomeMessage);

// Image lazy loading for gallery
const images = document.querySelectorAll('img[data-src]');
const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.remove('lazy');
            observer.unobserve(img);
        }
    });
});

images.forEach(img => imageObserver.observe(img));

// Booking form date validation
function validateBookingDates() {
    const checkIn = document.querySelector('input[name="check_in"]');
    const checkOut = document.querySelector('input[name="check_out"]');
    
    if (checkIn && checkOut) {
        checkIn.addEventListener('change', function() {
            checkOut.min = this.value;
        });
        
        checkOut.addEventListener('change', function() {
            if (this.value < checkIn.value) {
                alert('Check-out date must be after check-in date.');
                this.value = '';
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', validateBookingDates);

// Mobile menu toggle (if needed in future)
function initMobileMenu() {
    const nav = document.querySelector('.navigation ul');
    if (nav) {
        const toggleBtn = document.createElement('button');
        toggleBtn.textContent = '☰';
        toggleBtn.style.display = 'none';
        toggleBtn.style.background = 'none';
        toggleBtn.style.border = 'none';
        toggleBtn.style.fontSize = '1.5rem';
        toggleBtn.style.cursor = 'pointer';
        toggleBtn.style.color = 'white';
        
        document.querySelector('.header').appendChild(toggleBtn);
        
        toggleBtn.addEventListener('click', function() {
            nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
        });
        
        // Show toggle on small screens
        if (window.innerWidth <= 768) {
            toggleBtn.style.display = 'block';
            nav.style.display = 'none';
        }
        
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                toggleBtn.style.display = 'block';
                nav.style.display = 'none';
            } else {
                toggleBtn.style.display = 'none';
                nav.style.display = 'flex';
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', initMobileMenu);