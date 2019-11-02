export default class smoothScroll {
    constructor() {
        const handleScrolls = () => {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
            
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        }

        return handleScrolls();
    }   
}

new smoothScroll;