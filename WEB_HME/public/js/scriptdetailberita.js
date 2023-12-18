function warna() {
    const navbar = document.querySelector("#navbar");
    const a = navbar.classList.toggle("unav");
    navbar.classList.toggle("unav1");

    if (a == true) {
        $(".w1").html(
            `<i class="bi bi-lightbulb" style="font-size: 20px;"></i>`
        );
    } else {
        $(".w1").html(
            `<i class="bi bi-lightbulb-fill" style="font-size: 20px; color:#FFFF0 0;"></i>`
        );
    }
}
