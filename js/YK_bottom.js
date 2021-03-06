function initialize() {
    var a = {
            center: myCenter,
            zoom: 10,
            scrollwheel: !1,
            draggable: !1,
            mapTypeId: google.maps.MapTypeId.HYBRID
        },
        b = new google.maps.Map(document.getElementById("googleMap"), a),
        c = new google.maps.Marker({
            position: myCenter,
            animation: google.maps.Animation.BOUNCE
        });
    c.setMap(b), google.maps.event.addListener(c, "click", function() {
        var a = new google.maps.InfoWindow({
            content: "Find Yogesh Kadvekar Here!"
        });
        a.open(b, c)
    })
}
$(".count").each(function() {
        $(this).prop("Counter", 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2e3,
            easing: "swing",
            step: function(a) {
                $(this).text(Math.ceil(a))
            }
        })
    }),
    function(a) {
        a.fn.barfiller = function(b) {
            var j, l, c = a.extend({
                    barColor: "#16b597",
                    tooltip: !0,
                    duration: 1e3,
                    animateOnResize: !0
                }, b),
                d = a(this),
                e = a.extend(c, b),
                f = d.width(),
                g = d.find(".fill"),
                h = d.find(".tip"),
                i = g.attr("data-percentage"),
                k = !1,
                m = {
                    init: function() {
                        return this.each(function() {
                            m.getTransitionSupport() && (k = !0, l = m.getTransitionPrefix()), m.appendHTML(), m.setEventHandlers(), m.initializeItems()
                        })
                    },
                    appendHTML: function() {
                        g.css("background", e.barColor), e.tooltip || h.css("display", "none"), h.text(i + "%")
                    },
                    setEventHandlers: function() {
                        e.animateOnResize && a(window).on("resize", function(a) {
                            clearTimeout(j), j = setTimeout(function() {
                                m.refill()
                            }, 300)
                        })
                    },
                    initializeItems: function() {
                        var a = m.calculateFill(i);
                        d.find(".tipWrap").css({
                            display: "inline"
                        }), k ? m.transitionFill(a) : m.animateFill(a)
                    },
                    getTransitionSupport: function() {
                        var a = document.body || document.documentElement,
                            b = a.style,
                            c = void 0 !== b.transition || void 0 !== b.WebkitTransition || void 0 !== b.MozTransition || void 0 !== b.MsTransition || void 0 !== b.OTransition;
                        return c
                    },
                    getTransitionPrefix: function() {
                        return /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase()) ? "-moz-transition" : /webkit/.test(navigator.userAgent.toLowerCase()) ? "-webkit-transition" : /opera/.test(navigator.userAgent.toLowerCase()) ? "-o-transition" : /msie/.test(navigator.userAgent.toLowerCase()) ? "-ms-transition" : "transition"
                    },
                    getTransition: function(a, b, c) {
                        var d;
                        return "width" === c ? d = {
                            width: a
                        } : "left" === c && (d = {
                            left: a
                        }), b /= 1e3, d[l] = c + " " + b + "s ease-in-out", d
                    },
                    refill: function() {
                        g.css("width", 0), h.css("left", 0), f = d.width(), m.initializeItems()
                    },
                    calculateFill: function(a) {
                        a *= .01;
                        var b = f * a;
                        return b
                    },
                    transitionFill: function(a) {
                        var b = a - h.width();
                        g.css(m.getTransition(a, e.duration, "width")), h.css(m.getTransition(b, e.duration, "left"))
                    },
                    animateFill: function(a) {
                        var b = a - h.width();
                        g.stop().animate({
                            width: "+=" + a
                        }, e.duration), h.stop().animate({
                            left: "+=" + b
                        }, e.duration)
                    }
                };
            return m[b] ? m[b].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof b && b ? void a.error('Method "' + method + '" does not exist in barfiller plugin!') : m.init.apply(this)
        }
    }(jQuery), $("#bar1").barfiller({
        barColor: "#16b597",
        tooltip: !0,
        duration: 1e3,
        animateOnResize: !0
    });
var myCenter = new google.maps.LatLng(59.332807, 18.067206);
google.maps.event.addDomListener(window, "load", initialize), $(document).ready(function() {
    $(window).scroll(function() {
        $(this).scrollTop() > 100 ? $(".scrollToTop").fadeIn() : $(".scrollToTop").fadeOut()
    }), $(".scrollToTop").click(function() {
        return $("html, body").animate({
            scrollTop: 0
        }, 800), !1
    })
});