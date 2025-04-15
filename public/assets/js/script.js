function init() {
    if (document.getElementById("countdown")) {
        function e(e) {
            return e.toString().replace(/\d/g, (e) => "۰۱۲۳۴۵۶۷۸۹"[e]);
        }
        function t(e, t) {
            return e.toString().padStart(t, "۰");
        }
        (function (e) {
            const { jy: t, jm: n, jd: o } = e,
                r = jalaali.toGregorian(t, n, o);
            new Date(r.gy, r.gm - 1, r.gd);
        })({ jy: 1403, jm: 6, jd: 2 });
        const c = new Date(Date.now() + 432e5);
        function n() {
            const n = new Date();
            if (c - n <= 0)
                return void (document.getElementById("countdown").textContent =
                    "Offer has expired!");
            const o = dateFns.intervalToDuration({ start: n, end: c });
            (document.getElementById("days").textContent = e(
                t(void 0 !== o.days ? o.days : 0, 2)
            )),
                (document.getElementById("hours").textContent = e(
                    t(void 0 !== o.hours ? o.hours : 0, 2)
                )),
                (document.getElementById("minutes").textContent = e(
                    t(void 0 !== o.minutes ? o.minutes : 0, 2)
                )),
                (document.getElementById("seconds").textContent = e(
                    t(void 0 !== o.seconds ? o.seconds : 0, 2)
                ));
        }
        setInterval(n, 1e3), n();
    }
    function o(e) {
        const t = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"],
            n = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        return e.replace(/[۰-۹]/g, (e) => n[t.indexOf(e)]);
    }
    function r(e) {
        const t = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
        return e.toString().replace(/[0-9]/g, (e) => t[parseInt(e)]);
    }

    if (document.querySelector(".header-megamenu")) {
        let d = document.querySelectorAll(".header-megamenu-subitem");
        d.forEach((e) => {
            e.addEventListener("mouseover", function () {
                [...d].forEach((e) => {
                    e.classList.remove("active");
                }),
                    e.classList.add("active");
            });
        });
    }
    if (document.querySelector(".swiper")) {
        const l = document.querySelectorAll(".swiper"),
            u = {
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: { el: ".swiper-pagination" },
            };
        l.forEach((e) => {
            const t = e.dataset.swiperOptions
                    ? JSON.parse(e.dataset.swiperOptions)
                    : {},
                n = { ...u, ...t };
            new Swiper(e, n);
        });
    }
    if (document.getElementById("productModalTextarea")) {
        let m = document.getElementById("productModalTextarea"),
            g = document.getElementById("productModalTextareaInt"),
            p = 100;
        m.addEventListener("input", function () {
            let e = m.value.length;
            e > p && ((m.value = m.value.substring(0, p)), (e = p)),
                (g.textContent = e + "/" + p);
        });
    }
    if (document.querySelector(".btn-toggle")) {
        const f = document.querySelector(".btn-toggle"),
            y = document.documentElement,
            h = localStorage.getItem("bsTheme");
        let E = f.querySelector(".nt-fw-500"),
            b = f.querySelector(".ti");
        "dark" === h &&
            (document.documentElement.setAttribute("data-bs-theme", "dark"),
            E && (E.innerHTML = "روشن"),
            b && b.classList.replace("ti-moon", "ti-brightness-up")),
            f.addEventListener("click", function () {
                let e = y.getAttribute("data-bs-theme");
                "dark" === e
                    ? (localStorage.setItem("bsTheme", "light"),
                      y.setAttribute("data-bs-theme", "light"),
                      E && (E.innerHTML = "تاریک"),
                      b && b.classList.replace("ti-brightness-up", "ti-moon"))
                    : "light" === e &&
                      (localStorage.setItem("bsTheme", "dark"),
                      y.setAttribute("data-bs-theme", "dark"),
                      E && (E.innerHTML = "روشن"),
                      b && b.classList.replace("ti-moon", "ti-brightness-up"));
            });
    }
    if (document.querySelectorAll("[data-bs-toggle='tooltip']")) {
        [...document.querySelectorAll("[data-bs-toggle='tooltip']")].map(
            (e) => new bootstrap.Tooltip(e)
        );
    }
}
document.addEventListener("DOMContentLoaded", init);
