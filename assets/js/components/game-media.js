export default class GameMedia {
    constructor() {
        const
        gamemedia = document.querySelector('.game-media');

        if(!gamemedia){
            return;
        }

        function handleLightbox(){
            const
            newEl = document.createElement('div'),
            newImg = document.createElement('img'),
            newClose = document.createElement('div');
            
            newEl.classList.add('game-media__lightbox');
            newImg.src = this.querySelector('img').src;
            newClose.classList.add('game-media__lightbox-close');

            newEl.appendChild(newClose);
            newEl.appendChild(newImg);
            gamemedia.appendChild(newEl);

            newClose.addEventListener('click', removeLightbox);
        }

        function removeLightbox() {
            document.querySelector('.game-media__lightbox').remove();
        }

        const initLightbox = () => {

            Array.from(gamemedia.children).forEach(item => {
                item.addEventListener('click', handleLightbox);
            });
        };

        return initLightbox();
    }
}

new GameMedia;