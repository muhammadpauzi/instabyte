const userMenuButton = document.getElementById('user-menu-button');

userMenuButton.addEventListener('click', function() {
    document.querySelector(`#${this.dataset.target}`).classList.toggle('opacity-0');
    document.querySelector(`#${this.dataset.target}`).classList.toggle('scale-0');
})