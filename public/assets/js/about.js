// Counter animation for about page
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // lower is faster

    const runCounter = (el) => {    
        const target = +el.getAttribute('data-target');
        let current = 0;
        const step = Math.max(1, Math.floor(target / speed));
        const tick = () => {
            current += step;
            if (current < target) {
                el.textContent = current;
                requestAnimationFrame(tick);
            } else {
                el.textContent = target + (el.classList.contains('plus') ? '+' : '');
            }
        };
        tick();
    };

    // Use intersection observer to trigger when visible
    if ('IntersectionObserver' in window && counters.length) {
        const obs = new IntersectionObserver((entries, o) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    runCounter(entry.target);
                    o.unobserve(entry.target);
                }
            });
        }, {threshold:0.4});

        counters.forEach(c => obs.observe(c));
    } else {
        counters.forEach(runCounter);
    }

    // Simple lightbox for gallery images
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    lightbox.innerHTML = '<div class="close" aria-label="Close">&times;</div><img src="" alt="">';
    document.body.appendChild(lightbox);

    const lbImg = lightbox.querySelector('img');
    const lbClose = lightbox.querySelector('.close');

    document.querySelectorAll('.photo-item img').forEach(img => {
        img.addEventListener('click', () => {
            lbImg.src = img.getAttribute('data-full') || img.src;
            lightbox.classList.add('open');
        });
    });

    lbClose.addEventListener('click', () => lightbox.classList.remove('open'));
    lightbox.addEventListener('click', (e) => { if(e.target === lightbox) lightbox.classList.remove('open'); });
});
