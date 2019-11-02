export default class Subscribe {
    constructor() {

        //Event handlers
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

        function handleFocus(e) {

                this.classList.add('active');
            
                let el = this;

                while(!el.classList.contains('gfield')){
                    el = el.parentElement;
                }

                const asoLabel = el.querySelector('label');

                asoLabel.classList.add('active');
            
        }

        function handleBlur(e) {
            if(this.value.length < 1){
                this.classList.remove('active');
                
                let el = this;

                while(!el.classList.contains('gfield')){
                    el = el.parentElement;
                }

                const asoLabel = el.querySelector('label');

                asoLabel.classList.remove('active');
            }
        }

        //Main functions
        const handleImage = () => {
            const
            main_image = document.querySelector('.subscribe_box__image');

            return main_image.addEventListener('click', handleToggleImage);
        }

        const handleFloatingLabel = () => {
            const 
            allInputs = document.querySelectorAll('input');

            allInputs.forEach(input => {
                input.addEventListener('focus', handleFocus);
                input.addEventListener('blur', handleBlur);
            });
        }

        return [
            handleImage(),
            handleFloatingLabel()
        ];
    }
}

new Subscribe;