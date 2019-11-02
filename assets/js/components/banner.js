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

        const animateBannerImage = () => {
            const
            image = document.querySelector('.side-img');

            setTimeout(()=> {
                image.classList.add('toggled');
            }, 600);
        }

        const animateText = () => {
            const
            banner = document.querySelector('.banner_content .col-lg-6');

            Array.from(banner.children).forEach((val, i) => {
                setTimeout(()=> {
                    val.classList.add('toggled');
                }, 800 + 400 * i);
            });
        }

        return [
            animateBanner(),
            animateBannerImage(),
            animateText()
        ];
    }
}