import './bootstrap';

import "~resources/scss/app.scss";
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

const previewImgElem = document.getElementById('preview-img');

document.getElementById('cover_image').addEventListener('change', function() {
    const selectedFile = this.files[0];
    // console.log(selectedFile);
    if(selectedFile) {
        const reader = new FileReader();
        reader.addEventListener("load", function() {
            previewImgElem.src = reader.result;
        })
        reader.readAsDataURL(selectedFile);
    }
})