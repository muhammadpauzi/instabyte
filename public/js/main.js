const userMenuButton = document.getElementById('user-menu-button');

userMenuButton.addEventListener('click', function() {
    document.querySelector(`#${this.dataset.target}`).classList.toggle('opacity-0');
    document.querySelector(`#${this.dataset.target}`).classList.toggle('scale-0');
});

function showMenuElement(thisElement){
    document.querySelector(`#${thisElement.dataset.target}`).classList.toggle('opacity-0');
    document.querySelector(`#${thisElement.dataset.target}`).classList.toggle('scale-0');
}

const getImageComponent = ({src, alt} = {src:"", alt: ""}) => {
    return `<div class="">
        <img src="${src}" alt="${alt}" class="object-cover block h-48 w-96">
    </div>`;
}

const getFileInputEmpty = (i) => {
    const button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.setAttribute('class', `file-select-buttons file-select-button-${i} text-center bg-gray-100 rounded overflow-hidden focus:ring-2 ring-indigo-500 ring-offset-2 transition h-48 block align-bottom`);
    const div = document.createElement('div');
    div.setAttribute('class', "p-4 block");
    div.setAttribute('data-parent', `file-select-button-${i}`);
    const h3 = document.createElement('h3');
    h3.setAttribute('class', "font-bold text-sm mb-2");
    h3.setAttribute('data-parent', `file-select-button-${i}`);
    h3.textContent = 'Select an Image';
    const p = document.createElement('p');
    p.setAttribute('class', 'text-xs font-medium text-gray-700 whitespace-normal');
    p.textContent = 'Valid file extensions (JPG, PNG, JPEG, BMP, GIF, SVG or WEBP)';
    p.setAttribute('data-parent', `file-select-button-${i}`);
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('multiple', 'multiple');
    input.setAttribute('name', 'files[]');
    input.setAttribute('class', 'file-select-input hidden');
    div.appendChild(h3);
    div.appendChild(p);
    button.appendChild(div);
    button.appendChild(input);
    return button;
}

const filesGroup = document.getElementById('files-group');
let i = 1; // for unique file select button element
filesGroup.appendChild(getFileInputEmpty(i));

filesGroup.addEventListener('click', function(e){
    if(e.target.classList.contains('file-select-buttons') || (e.target.dataset.parent && document.querySelector(`.${e.target.dataset.parent}`))){
        const fileSelectButton = document.querySelector(`.${e.target.dataset.parent}`) || e.target;
        const fileSelectInput = fileSelectButton.querySelector('.file-select-input');
        fileSelectInput.click();
        fileSelectInput.addEventListener('change', function(){
            const file = this.files[0];
            const fileReader = new FileReader();
            fileReader.onprogress = function(e){
                // console.log(e); // show loading
            }
            fileReader.onloadend = function(e){
                i++;
                fileSelectButton.firstElementChild.innerHTML = getImageComponent({src: e.target.result, alt: file.name});
                fileSelectButton.firstElementChild.className = "";
                fileSelectButton.parentElement.appendChild(getFileInputEmpty(i));
            }
            fileReader.readAsDataURL(file);
        });
    }
});
