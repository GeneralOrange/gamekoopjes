export default class Subscribe {
    constructor() {
        function handleToggleImage(e){
            e.preventDefault();

            const
            complete = subscribe.complete.url,
            before = subscribe.before.url;
            
            if(this.src !== before){
                this.src = before;
            } else {
                this.src = complete;
            }
        }
        const handleImage = () => {
            const
            main_image = document.querySelector('.subscribe_box__image');

            return main_image.addEventListener('click', handleToggleImage);
        }

        return handleImage();
    }
}

new Subscribe;