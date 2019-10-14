export default class Background {
    constructor() {
        const handleBackground = () => {
            const
            main = document.querySelector('#main');

            let
            controller,
            i,
            src_arr;

            src_arr = [
                background.controller,
                background.controller_2
            ]

            for(i=0;i<2;i++){
                controller = document.createElement('img');
                controller.classList.add('background_controller', 'lazyload');
                controller.setAttribute('data-src', src_arr[i]);

                main.appendChild(controller);
            }
        }

        return handleBackground();
    }
}

new Background;