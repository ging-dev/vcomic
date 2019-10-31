$("img.lazy").lazyload({effect : "fadeIn"});

function previewFile() {
    var e = document.querySelector("img#previewImg"),
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
    }),$("#login").on("click", function(e) {
        var n = $("#username").val(),
            a = $("#password").val(),
            r = $("#remember").is(':checked') ? 1 : 0;
        $.ajax({
            url: "/login",
            method: "POST",
            data: {
                username: n,
                password: a,
                remember: r
            },
            success: function(e) {
                $("#errorLogin").html(e), "Đăng nhập thành công. Chờ chuyển hướng!!!" === e && setTimeout("location.reload();", 1000)
            },
            dataType: "text"
        })
    }), $("#register").on("click", function(e) {
        var n = $("#usernameReg").val(),
            a = $("#passwordReg").val(),
            t = $("#fullname").val(),
            o = $("#email").val();
        $.ajax({
            url: "/register",
            method: "POST",
            data: {
                usernameReg: n,
                passwordReg: a,
                fullname: t,
                email: o
            },
            success: function(e) {
                $("#errorRegister").html(e), "Đăng ký thành công. Chờ chuyển hướng!!!" === e && setTimeout("location.reload();", 1000);
            },
            dataType: "text"
        }),
        $("#recover").on("click", function(e) {
            var n = $("#usernameRecover").val(),
                a = $("#emailRecover").val()
            $.ajax({
                url: "/users/recover",
                method: "POST",
                data: {
                    usernameRecover: n,
                    emailRecover: a
                },
                success: function(e) {
                    $("#errorRecover").html(e), "Link cấp lại đã được gửi tới email của bạn" === e && setTimeout("location.reload();", 1000)
                },
                dataType: "text"
            })
        })
        // $("#send_status").on("click", function(e) {
        //     var n = $("#msg").val(),
        //         a = $("#private").val()
        //         console.log(n)
        //         console.log(a)
        //     $.ajax({
        //         url: "/ajax/send_status",
        //         method: "POST",
        //         data: {
        //             msg: n,
        //             private: a
        //         },
        //         success: function(e) {
        //             $("#errorStatus").html(e), "Đã gửi lên status" === e && setTimeout("location.reload();", 1000)
        //         },
        //         dataType: "text"
        //     })
        // })
    })
});