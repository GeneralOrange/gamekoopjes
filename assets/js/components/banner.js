export default class Banner {
    constructor() {
        const animateBanner = () => {
            const
            navBar = document.querySelector('#site-navigation'),
            overlay = navBar.querySelector('.overlay'),
            overlay_2 = navBar.querySelector('.overlay_2');

            let layers = [
                overlay,
                overlay_2
            ]
            
            layers.forEach((val, i) => {
                setTimeout(()=> {
                    val.classList.add('toggled');
                }, 400 * i);
            });
        }

        return animateBanner();
    }
}