
function countChecked() {
    "all" === checkState && $(".bulk_action input[name='table_records']").iCheck("check"), "none" === checkState && $(".bulk_action input[name='table_records']").iCheck("uncheck");
    var e = $(".bulk_action input[name='table_records']:checked").length;
    e ? ($(".column-title").hide(), $(".bulk-actions").show(), $(".action-cnt").html(e + " Records Selected")) : ($(".column-title").show(), $(".bulk-actions").hide());
}


var currentUrl = window.location.href.split("?")[0];
var bodyElement = $("body");
var menuToggle = $("a.menuToggler"); // $("#menu_toggle");
var sidebarMenu = $("div.main_menu"); // $("#sidebar-menu");
var     sidebarFooter = $(".sidebar-footer");
var     leftColumn = $(".left_col");
var     rightColumn = $(".right_col");
var navMenu = $(".nav_menu");
var     pageFooter = $("footer");

$(document).ready(function () {
    var e = function () {
        rightColumn.css("min-height", $(window).height());
        var e = bodyElement.outerHeight(),
            t = bodyElement.hasClass("footer_fixed") ? 0 : pageFooter.height(),
            n = leftColumn.eq(1).height() + sidebarFooter.height(),
            i = n > e ? n : e;
        i -= navMenu.height() + t, rightColumn.css("min-height", i);
    };
    // handle sidebar click event on menu item
    sidebarMenu.find("a").on("click", function (t) {
        
        var n = $(this).parent();
        n.is(".active") ? (n.removeClass("active active-sm"), $("ul:first", n).slideUp(function () {
            e();
        })) : (n.parent().is(".child_menu") || (sidebarMenu.find("li").removeClass("active active-sm"),
        sidebarMenu.find("li ul").slideUp()), n.addClass("active"), $("ul:first", n).slideDown(function () {
            e();
        }));
    }), menuToggle.on("click", function () {
        bodyElement.hasClass("nav-md") ? (sidebarMenu.find("li.active ul").hide(),
        sidebarMenu.find("li.active").addClass("active-sm").removeClass("active")) : (sidebarMenu.find("li.active-sm ul").show(),
        sidebarMenu.find("li.active-sm").addClass("active").removeClass("active-sm")),
        bodyElement.toggleClass("nav-md nav-sm"),
        e();
    }),
    sidebarMenu.find('a[href="' + currentUrl + '"]').parent("li").addClass("current-page"), sidebarMenu.find("a").filter(function () {
        return this.href == currentUrl;
    }).parent("li").addClass("current-page").parents("ul").slideDown(function () {
        e();
    }).parent().addClass("active"), $(window).smartresize(function () {
        e();
    }), e(), $.fn.mCustomScrollbar && $(".menu_fixed").mCustomScrollbar({
        autoHideScrollbar: !0,
        theme: "minimal",
        mouseWheel: {
            preventDefault: !0
        }
    });
}),
$(document).ready(function () {
    // handle collapse link on panel
    $(".collapse-link").on("click", function () {
        var e = $(this).closest(".x_panel"),
            t = $(this).find("i"),
            n = e.find(".x_content");
        e.attr("style") ? n.slideToggle(200, function () {
            e.removeAttr("style");
        }) : (n.slideToggle(200), e.css("height", "auto")), t.toggleClass("fa-chevron-up fa-chevron-down");
    }), $(".close-link").click(function () {
        var e = $(this).closest(".x_panel");
        e.remove();
    });
}), $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip({
        container: "body"
    });
}),
$(".progress .progress-bar")[0] && $(".progress .progress-bar").progressbar(), $(document).ready(function () {
    if ($(".js-switch")[0]) {
        var e = Array.prototype.slice.call(document.querySelectorAll(".js-switch"));
        e.forEach(function (e) {
            new Switchery(e, {
                color: "#26B99A"
            });
        });
    }
}),
$(document).ready(function () {
    $("input.flat")[0] && $(document).ready(function () {
    });
}), $("table input").on("ifChecked", function () {
    checkState = "", $(this).parent().parent().parent().addClass("selected"), countChecked();
}), $("table input").on("ifUnchecked", function () {
    checkState = "", $(this).parent().parent().parent().removeClass("selected"), countChecked();
});
var checkState = "";
$(".bulk_action input").on("ifChecked", function () {
    checkState = "", $(this).parent().parent().parent().addClass("selected"), countChecked();
}), $(".bulk_action input").on("ifUnchecked", function () {
    checkState = "", $(this).parent().parent().parent().removeClass("selected"), countChecked();
}), $(".bulk_action input#check-all").on("ifChecked", function () {
    checkState = "all", countChecked();
}), $(".bulk_action input#check-all").on("ifUnchecked", function () {
    checkState = "none", countChecked();
}),
// expand/collapse
$(document).ready(function () {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200), $expand = $(this).find(">:first-child"), "+" == $expand.text() ? $expand.text("-") : $expand.text("+");
    });
}),

// loading progress
"undefined" != typeof NProgress && ($(document).ready(function () {
    NProgress.start();
}), $(window).load(function () {
    NProgress.done();
})),
// resize windows
function (e, t) {
    var n = function (e, t, n) {
        var i;
        return function () {
            function c() {
                n || e.apply(a, o), i = null;
            }
            var a = this,
                o = arguments;
            i ? clearTimeout(i) : n && e.apply(a, o), i = setTimeout(c, t || 100);
        };
    };
    jQuery.fn[t] = function (e) {
        return e ? this.bind("resize", n(e)) : this.trigger(t);
    };
}(jQuery, "smartresize");