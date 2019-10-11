export default class TopBar {
    constructor() {
        const toggleTopbar = () => {
            const topbar = document.querySelector('.topbar');

            if(topbar){
                setTimeout(() => {
                    topbar.classList.add('toggled');
                }, 200);
            }
            
        }

        return toggleTopbar();
    }
}

new TopBar;