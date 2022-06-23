const userAvatarImg = document.getElementById('user-avatar--img');
const userAvatarDropDown = document.getElementById('user-avatar--dropdown');
const userTriangle = document.getElementById('user-triangle');
const menuSearchImg = document.getElementById('search-menu--img');
const dropdownSearch = document.getElementById('dropdown-search');
const dropdownSearchCategories = dropdownSearch.getElementsByClassName('dropdown-categories');
const dropdownMenu = document.getElementById('dropdown-menu');
const dropdownMenuParagraphs = dropdownMenu.getElementsByTagName('p');

console.log(dropdownMenuParagraphs);

for (let i = 0; i < dropdownMenuParagraphs.length; i++) {
    console.log(dropdownMenuParagraphs[i]);
    dropdownMenuParagraphs[i].addEventListener('click', switchMenuParagraphs);
}

function switchMenuParagraphs() {
    const pressedParagraph = this;
    let categoryNumber = 0;
    for(let i = 0; i < dropdownMenuParagraphs.length; i++) {
        if(dropdownMenuParagraphs[i] === pressedParagraph) {
            categoryNumber = i;
        }
        if(dropdownMenuParagraphs[i].classList.contains('selected')){
            dropdownMenuParagraphs[i].classList.remove('selected');
        }
        if(!dropdownSearchCategories[i].classList.contains('hide')){
            dropdownSearchCategories[i].classList.add('hide');
        }
    }
    dropdownSearchCategories[categoryNumber].classList.remove('hide');
    pressedParagraph.classList.add('selected');
}

function switchUserAvatar() {
    if(userAvatarDropDown.classList.contains('show')) {
        userAvatarDropDown.classList.remove('show');
        userTriangle.classList.remove('show');
    } else {
        userAvatarDropDown.classList.add('show');
        userTriangle.classList.add('show');
    }
}

function switchMenuDropdown() {
    if(dropdownSearch.classList.contains('hide')) {
        dropdownSearch.classList.remove('hide');
    } else {
        dropdownSearch.classList.add('hide');
    }
}

userAvatarImg.addEventListener('click', switchUserAvatar);
menuSearchImg.addEventListener('click', switchMenuDropdown);