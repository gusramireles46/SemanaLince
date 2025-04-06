document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("themeToggle");
    const navbar = document.getElementById("navbar");
    const prefersLight = localStorage.getItem("theme") === "light";

    if (prefersLight) {
        document.body.classList.add("light-mode");
        toggle.textContent = "🌞";
        navbar.classList.remove("navbar-dark");
        navbar.classList.add("navbar-light");
    }

    toggle.addEventListener("click", () => {
        document.body.classList.toggle("light-mode");
        const isLight = document.body.classList.contains("light-mode");
        toggle.textContent = isLight ? "🌞" : "🌙";

        if (isLight) {
            navbar.classList.remove("navbar-dark");
            navbar.classList.add("navbar-light");
        } else {
            navbar.classList.remove("navbar-light");
            navbar.classList.add("navbar-dark");
        }

        localStorage.setItem("theme", isLight ? "light" : "dark");
    });
});
