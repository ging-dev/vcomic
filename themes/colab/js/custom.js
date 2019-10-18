function previewFile() {
    var e = document.querySelector("img"),
        n = document.querySelector("input[type=file]").files[0],
        a = new FileReader;
    a.addEventListener("load", function() {
        e.src = a.result
    }, !1), n && a.readAsDataURL(n)
}
$(document).ready(function() {
    $(".loading").fadeOut(), $(".body").removeClass("d-none"), $(".custom-nav-list .item.cursor").click(function() {
        $(this).toggleClass("active")
    }), $(function() {
        $('[data-toggle="popover"]').popover()
    });
    $(document).ready(function() {
        $(".img-template").click(function() {
            return $("#input_frm").trigger("click"), !1
        }), $("#input_frm").change(function() {
            upload(this.files[0])
        })
    }), $(".setup-btn").click(function() {
        $(".setup").toggleClass("d-none")
    }), $(".clickable").click(function() {
        $("header").hasClass("hide") ? $("header").fadeIn(300, function() {
            $("header").removeClass("hide")
        }) : $("header").fadeOut(300, function() {
            $("header").addClass("hide")
        })
    });
    new Swiper(".swiper-container", {
        slidesPerView: "auto",
        spaceBetween: 30,
        freeMode: !0,
        clickable: !0
    }), new Swiper(".swiper-slider-index", {
        effect: "fade",
        fadeEffect: {
            crossFade: !0
        },
        loop: !0,
        autoplay: {
            delay: 7500,
            disableOnInteraction: !1
        }
    });
    $(".fontsize-chooser").change(function() {
        $(".chapter-content").css({
            "font-size": $(".fontsize-chooser").val() + "px"
        })
    }), $(".background-chooser").change(function() {
        $(".background-custom").removeClass("medium"), $(".background-custom").removeClass("white"), $(".background-custom").removeClass("dark"), $(".background-custom").addClass($(".background-chooser").val())
    }), $("#login").on("click", function(e) {
        e.preventDefault();
        var n = $("#username").val(),
            a = $("#password").val();
        $.ajax({
            url: "/login/",
            method: "POST",
            data: {
                username: n,
                password: a
            },
            success: function(e) {
                $("#errorLogin").html(e), "Đăng nhập thành công. Chờ chuyển hướng!!!" === e && setTimeout("location.reload();", 500)
            },
            dataType: "text"
        })
    }), $("#register").on("click", function(e) {
        e.preventDefault();
        var n = $("#usernameRegister").val(),
            a = $("#passwordRegister").val(),
            t = $("#fullname").val(),
            o = $("#email").val();
        $.ajax({
            url: "/register/",
            method: "POST",
            data: {
                usernameRegister: n,
                passwordRegister: a,
                fullname: t,
                email: o
            },
            success: function(e) {
                $("#errorRegister").html(e), "Đăng ký thành công. Chờ chuyển hướng!!!" === e && setTimeout("location.reload();", 500)
            },
            dataType: "text"
        })
    })
});