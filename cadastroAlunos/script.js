function activeMenu() {
    let menu = document.getElementById("menu");

    if(menu.value == 1) {
        menu.style.display = "none";
        menu.value = 0;
        return;
    } else {
        menu.style.display = "flex";
        menu.value = 1;
        return;
    }

    menu.style.display = "flex";
    menu.value = 1;
}