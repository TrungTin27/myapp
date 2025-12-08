        const hamburger = document.querySelector(".hamburger");
        const mainMenu = document.querySelector(".main-menu");

        hamburger.addEventListener("click", () => {
            mainMenu.classList.toggle("show");
        });
        // Dropdown mở bằng click trên mobile
        const dropdownBtns = document.querySelectorAll(".dropbtn");

        dropdownBtns.forEach(btn => {
            btn.addEventListener("click", function (e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    this.nextElementSibling.classList.toggle("show");
                }
            });
        });
/* icon active */
document.querySelectorAll(".icon-item").forEach((item) => {
    item.addEventListener("click", () => {
        document.querySelectorAll(".icon-item").forEach(i => i.classList.remove("active"));
        
        item.classList.add("active");

        // click hiệu ứng
        item.style.transform = "scale(1.12)";
        setTimeout(() => {
            item.style.transform = "scale(1.05)";
        }, 150);
    });
});

//mobile căn lại menu 
function updateLayout() {
    const menu = document.querySelector(".icon-menu");

    if (window.innerWidth <= 900) {
        menu.style.flexDirection = "column";
        menu.style.alignItems = "flex-start";
    } else {
        menu.style.flexDirection = "row";
        menu.style.alignItems = "center";
    }
}
window.addEventListener("resize", updateLayout);
updateLayout();
