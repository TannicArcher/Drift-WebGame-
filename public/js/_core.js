if ("undefined" == typeof core && (core = {}), core.main = {
    rand: function(e, t) {
        return Math.floor(Math.random() * (t - e + 1)) + e
    },
    num: function(e, t, r, n, a) {
        var o, c, i, s, l;
        return void 0 === t && (t = 0), void 0 === r && (r = ","), void 0 === n && (n = " "), void 0 === a && (a = !0), isNaN(t = Math.abs(t)) && (t = 2), 3 < (c = (o = -1 != e.toString().indexOf(".") ? parseInt(e = (+e || 0).toString().slice(0, e.toString().indexOf(".") + t + 1)) + "" : parseInt(e = (+e || 0).toFixed(t)) + "").length) ? c %= 3 : c = 0, l = c ? o.substr(0, c) + n : "", i = o.substr(c).replace(/(\d{3})(?=\d)/g, "$1" + n), s = t ? r + Math.abs(e - o).toFixed(t).replace(/-/, 0).slice(2) : "", l + i + core.main.rtrim(a ? core.main.rtrim(s, "0") : s, r)
    },
    rtrim: function(e, t) {
        t = t ? t.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, "$1") : " s ";
        var r = new RegExp("[" + t + "]+$", "g");
        return e.replace(r, "")
    },
    rotation: function(e) {
        var t = $(e),
            r = t.css("-webkit-transform") || t.css("-moz-transform") || t.css("-ms-transform") || t.css("-o-transform") || t.css("transform");
        if ("none" !== r) var n = r.split("(")[1].split(")")[0].split(","),
            a = n[0],
            o = n[1],
            c = Math.round(Math.atan2(o, a) * (180 / Math.PI));
        else c = 0;
        return c < 0 ? c += 360 : c
    },
    timer: function(e, t, r, n, a) {
        function o() {
            if ($(e).html((t < 10 ? "0" + t : t) + ":" + (r < 10 ? "0" + r : r) + ":" + (n < 10 ? "0" + n : n)), --n < 0) {
                if (--r < 0) {
                    if (--t < 0) return core.interval.clear(e), a ? a(e) : location.reload();
                    r = 59
                }
                n = 59
            }
        }
        t = parseInt(t), r = parseInt(r), n = parseInt(n), o(), core.interval.set(function() {
            o()
        }, 1e3, e)
    },
    scrollBlock: function(e) {
        $(e).bind("mousewheel DOMMouseScroll", function(e) {
            var t = null;
            "mousewheel" == e.type ? t = -1 * e.originalEvent.wheelDelta : "DOMMouseScroll" == e.type && (t = 40 * e.originalEvent.detail), t && (e.preventDefault(), $(this).scrollTop(t + $(this).scrollTop()))
        })
    },
    scrollInside: function(e, t) {
        var r = $(e);
        r.stop().animate({
            scrollTop: r.prop("scrollHeight")
        }, t || 1500)
    },
    plural: function(e, t, r, n) {
        var a = (e = e % 100) % 10;
        return 10 < e && e < 20 ? n : 1 < a && a < 5 ? r : 1 == a ? t : n
    },
    setCaretPosition: function(e, t, r) {
        if (e.setSelectionRange) e.focus(), e.setSelectionRange(t, r);
        else if (e.createTextRange) {
            var n = e.createTextRange();
            n.collapse(!0), n.moveEnd("character", r), n.moveStart("character", t), n.select()
        }
    },
    md5: function(e) {
        function i(e, t) {
            return e << t | e >>> 32 - t
        }

        function s(e, t) {
            var r, n, a, o, c;
            return a = 2147483648 & e, o = 2147483648 & t, c = (1073741823 & e) + (1073741823 & t), (r = 1073741824 & e) & (n = 1073741824 & t) ? 2147483648 ^ c ^ a ^ o : r | n ? 1073741824 & c ? 3221225472 ^ c ^ a ^ o : 1073741824 ^ c ^ a ^ o : c ^ a ^ o
        }

        function t(e, t, r, n, a, o, c) {
            return s(i(e = s(e, s(s(function(e, t, r) {
                return e & t | ~e & r
            }(t, r, n), a), c)), o), t)
        }

        function r(e, t, r, n, a, o, c) {
            return s(i(e = s(e, s(s(function(e, t, r) {
                return e & r | t & ~r
            }(t, r, n), a), c)), o), t)
        }

        function n(e, t, r, n, a, o, c) {
            return s(i(e = s(e, s(s(function(e, t, r) {
                return e ^ t ^ r
            }(t, r, n), a), c)), o), t)
        }

        function a(e, t, r, n, a, o, c) {
            return s(i(e = s(e, s(s(function(e, t, r) {
                return t ^ (e | ~r)
            }(t, r, n), a), c)), o), t)
        }

        function o(e) {
            var t, r = "",
                n = "";
            for (t = 0; t <= 3; t++) r += (n = "0" + (e >>> 8 * t & 255).toString(16)).substr(n.length - 2, 2);
            return r
        }
        e += global.salt;
        var c, l, d, u, f, p, h, m, v, g = Array();
        for (g = function(e) {
            for (var t, r = e.length, n = r + 8, a = 16 * (1 + (n - n % 64) / 64), o = Array(a - 1), c = 0, i = 0; i < r;) c = i % 4 * 8, o[t = (i - i % 4) / 4] = o[t] | e.charCodeAt(i) << c, i++;
            return c = i % 4 * 8, o[t = (i - i % 4) / 4] = o[t] | 128 << c, o[a - 2] = r << 3, o[a - 1] = r >>> 29, o
        }(e = function(e) {
            e = e.replace(/\r\n/g, "\n");
            for (var t = "", r = 0; r < e.length; r++) {
                var n = e.charCodeAt(r);
                n < 128 ? t += String.fromCharCode(n) : (127 < n && n < 2048 ? t += String.fromCharCode(n >> 6 | 192) : (t += String.fromCharCode(n >> 12 | 224), t += String.fromCharCode(n >> 6 & 63 | 128)), t += String.fromCharCode(63 & n | 128))
            }
            return t
        }(e)), p = 1732584193, h = 4023233417, m = 2562383102, v = 271733878, c = 0; c < g.length; c += 16) h = a(h = a(h = a(h = a(h = n(h = n(h = n(h = n(h = r(h = r(h = r(h = r(h = t(h = t(h = t(h = t(d = h, m = t(u = m, v = t(f = v, p = t(l = p, h, m, v, g[c + 0], 7, 3614090360), h, m, g[c + 1], 12, 3905402710), p, h, g[c + 2], 17, 606105819), v, p, g[c + 3], 22, 3250441966), m = t(m, v = t(v, p = t(p, h, m, v, g[c + 4], 7, 4118548399), h, m, g[c + 5], 12, 1200080426), p, h, g[c + 6], 17, 2821735955), v, p, g[c + 7], 22, 4249261313), m = t(m, v = t(v, p = t(p, h, m, v, g[c + 8], 7, 1770035416), h, m, g[c + 9], 12, 2336552879), p, h, g[c + 10], 17, 4294925233), v, p, g[c + 11], 22, 2304563134), m = t(m, v = t(v, p = t(p, h, m, v, g[c + 12], 7, 1804603682), h, m, g[c + 13], 12, 4254626195), p, h, g[c + 14], 17, 2792965006), v, p, g[c + 15], 22, 1236535329), m = r(m, v = r(v, p = r(p, h, m, v, g[c + 1], 5, 4129170786), h, m, g[c + 6], 9, 3225465664), p, h, g[c + 11], 14, 643717713), v, p, g[c + 0], 20, 3921069994), m = r(m, v = r(v, p = r(p, h, m, v, g[c + 5], 5, 3593408605), h, m, g[c + 10], 9, 38016083), p, h, g[c + 15], 14, 3634488961), v, p, g[c + 4], 20, 3889429448), m = r(m, v = r(v, p = r(p, h, m, v, g[c + 9], 5, 568446438), h, m, g[c + 14], 9, 3275163606), p, h, g[c + 3], 14, 4107603335), v, p, g[c + 8], 20, 1163531501), m = r(m, v = r(v, p = r(p, h, m, v, g[c + 13], 5, 2850285829), h, m, g[c + 2], 9, 4243563512), p, h, g[c + 7], 14, 1735328473), v, p, g[c + 12], 20, 2368359562), m = n(m, v = n(v, p = n(p, h, m, v, g[c + 5], 4, 4294588738), h, m, g[c + 8], 11, 2272392833), p, h, g[c + 11], 16, 1839030562), v, p, g[c + 14], 23, 4259657740), m = n(m, v = n(v, p = n(p, h, m, v, g[c + 1], 4, 2763975236), h, m, g[c + 4], 11, 1272893353), p, h, g[c + 7], 16, 4139469664), v, p, g[c + 10], 23, 3200236656), m = n(m, v = n(v, p = n(p, h, m, v, g[c + 13], 4, 681279174), h, m, g[c + 0], 11, 3936430074), p, h, g[c + 3], 16, 3572445317), v, p, g[c + 6], 23, 76029189), m = n(m, v = n(v, p = n(p, h, m, v, g[c + 9], 4, 3654602809), h, m, g[c + 12], 11, 3873151461), p, h, g[c + 15], 16, 530742520), v, p, g[c + 2], 23, 3299628645), m = a(m, v = a(v, p = a(p, h, m, v, g[c + 0], 6, 4096336452), h, m, g[c + 7], 10, 1126891415), p, h, g[c + 14], 15, 2878612391), v, p, g[c + 5], 21, 4237533241), m = a(m, v = a(v, p = a(p, h, m, v, g[c + 12], 6, 1700485571), h, m, g[c + 3], 10, 2399980690), p, h, g[c + 10], 15, 4293915773), v, p, g[c + 1], 21, 2240044497), m = a(m, v = a(v, p = a(p, h, m, v, g[c + 8], 6, 1873313359), h, m, g[c + 15], 10, 4264355552), p, h, g[c + 6], 15, 2734768916), v, p, g[c + 13], 21, 1309151649), m = a(m, v = a(v, p = a(p, h, m, v, g[c + 4], 6, 4149444226), h, m, g[c + 11], 10, 3174756917), p, h, g[c + 2], 15, 718787259), v, p, g[c + 9], 21, 3951481745), p = s(p, l), h = s(h, d), m = s(m, u), v = s(v, f);
        return (o(p) + o(h) + o(m) + o(v)).toLowerCase()
    }
}, jQuery.fn.extend({
    insertAtCaret: function(a) {
        return this.each(function(e) {
            if (document.selection) this.focus(), document.selection.createRange().text = a, this.focus();
            else if (this.selectionStart || "0" == this.selectionStart) {
                var t = this.selectionStart,
                    r = this.selectionEnd,
                    n = this.scrollTop;
                this.value = this.value.substring(0, t) + a + this.value.substring(r, this.value.length), this.focus(), this.selectionStart = t + a.length, this.selectionEnd = t + a.length, this.scrollTop = n
            } else this.value += a, this.focus()
        })
    }
}), "undefined" == typeof core && (core = {}), void 0 === ajaxIdentMass) var ajaxIdentMass = {};
if (core.ajax = function(e) {
    var t = {
        async: !0,
        before: !1,
        complete: !1,
        contentType: !1,
        dataType: "json",
        error: !1,
        form: !1,
        ident: !1,
        type: "POST",
        preloader: !1,
        processData: !1,
        success: !1,
        url: "/"
    };
    if ("options" == e) return t;
    if ((t = $.extend({}, t, e)).ident && 0 == ajaxIdentMass[t.ident]) return !1;
    var r = new FormData;
    if (t.form) {
        var n = t.form.split(",");
        for (var a in n) {
            var o = $.trim(n[a]);
            $(o + " input," + o + " textarea, " + o + " select").each(function() {
                if ("file" == $(this).attr("type"))
                    if (1 < $(this).prop("files").length)
                        for (var e = 0; e < $(this).prop("files").length; e++) r.append($(this).attr("name") + "[" + e + "]", $(this).prop("files")[e]);
                    else r.append($(this).attr("name"), $(this).prop("files")[0]);
                else "radio" == $(this).attr("type") || "checkbox" == $(this).attr("type") ? $(this).prop("checked") && r.append($(this).attr("name"), $(this).val()) : r.append($(this).attr("name"), $(this).val())
            })
        }
    }
    jQuery.ajax({
        async: t.async,
        contentType: t.contentType,
        data: r,
        dataType: t.dataType,
        processData: t.processData,
        type: t.type,
        url: t.url,
        beforeSend: function() {
            t.ident && (ajaxIdentMass[t.ident] = !1), t.before && t.before(), t.preloader && $(t.preloader).addClass("js-load")
        },
        success: function(e) {
            return "404" == e ? location.href = "/error-404" : "access" == e ? location.href = "/error-denied" : "blocked" == e ? location.href = "/error-banned" : "data" == e ? location.href = "/error-data" : "maintenance" == e ? location.href = "/error-works" : "string" == typeof e && "href=" == e.substr(0, 5) ? (href = e.replace("href=", ""), location.href = href) : void(t.success && t.success(e))
        },
        error: function(e) {
            if (e && e.responseJSON) {
                if ("404" == e.responseJSON) return location.href = "/error-404";
                if ("access" == e.responseJSON) return location.href = "/error-denied";
                if ("blocked" == e.responseJSON) return location.href = "/error-banned";
                if ("data" == e.responseJSON) return location.href = "/error-data";
                if ("maintenance" == e.responseJSON) return location.href = "/error-works"
            }
            if (!t.error) return location.reload();
            t.error(e)
        },
        complete: function() {
            t.complete && t.complete(), t.preloader && $(t.preloader).removeClass("js-load"), t.ident && (ajaxIdentMass[t.ident] = !0)
        }
    })
}, "undefined" == typeof core && (core = {}), core.captcha = {
    init: function() {
        core.captcha.renderId || (core.captcha.renderId = {}), core.captcha.id || (core.captcha.id = 0), $("[data-recaptcha]").length && ($('body script[src="https://www.google.com/recaptcha/api.js?render=explicit"]').length || $("body").append('<script src="https://www.google.com/recaptcha/api.js?render=explicit"><\/script>'), core.captcha.load())
    },
    load: function() {
        "undefined" != typeof grecaptcha ? void 0 === grecaptcha.render ? setTimeout(function() {
            core.captcha.load()
        }, 300) : $("[data-recaptcha]").each(function() {
            if (!$(this).attr("id")) {
                var id = "g-recaptcha-" + ++core.captcha.id;
                $(this).attr("id", id);
                var callback = $(this).data("recaptcha");
                core.captcha.renderId[id] = grecaptcha.render($(this).attr("id"), {
                    sitekey: $(this).data("recaptcha-sitekey"),
                    theme: "light",
                    size: "invisible",
                    badge: "inline",
                    callback: function() {
                        eval(callback)
                    }
                })
            }
        }) : setTimeout(function() {
            core.captcha.load()
        }, 300)
    }
}, $(document).ready(function() {
    core.captcha.init()
}), "undefined" == typeof core && (core = {}), core.content = {
    init: function() {
        $('a[href="' + window.location.pathname + '"]').addClass("active").closest("li.dt-side-nav__item").addClass("open").closest("ul.dt-side-nav__sub-menu").closest("li.dt-side-nav__item").addClass("open"), $('a[href="' + window.location.pathname + '"]').closest("li").addClass("active"), $("header .dt-nav-wrapper a.dropdown-item[data-lang]").length && $("header .dt-nav-wrapper a.dropdown-item[data-lang]").on("click", function() {
            core.content.lang($(this).attr("data-lang"))
        }), $("#lang-modal").length && $("#lang-modal [data-lang]").on("click", function() {
            core.content.lang($(this).attr("data-lang"))
        }), $("header .dt-nav-wrapper a.dropdown-item.logout").length && $("header .dt-nav-wrapper a.dropdown-item.logout").on("click", function() {
            core.content.exit()
        })
    },
    lang: function(e) {
        core.ajax({
            url: "/users/change-lang/lang/" + e,
            ident: "change-lang",
            success: function(e) {
                return location.reload()
            }
        })
    },
    exit: function() {
        core.ajax({
            url: "/users/logout",
            ident: "logout",
            success: function() {
                return location.href = "/"
            }
        })
    }
}, $(document).ready(function() {
    core.content.init()
}), "undefined" == typeof core && (core = {}), core.form = function() {
    $("form").each(function() {
        $(this).attr("onsubmit", "return false")
    })
}, $(document).ready(function() {
    core.form()
}), "undefined" == typeof core && (core = {}), core.input = function(e) {
    $("input").each(function() {
        var e = $(this).attr("data-check");
        if (e) switch ((e = e.split("-"))[0]) {
            case "num":
                $(this).on("input", function() {
                    var e = $(this).val();
                    e = e.replace(/[^\d]/g, ""), $(this).val(e)
                });
                break;
            case "numDec":
                var t = new RegExp("^[^\\d]*(\\d+([.]\\d{0," + (e[1] || option.numDec) + "})?).*$", "g");
                $(this).on("input", function() {
                    var e = $(this).val();
                    e = e.replace(/,/gim, ".").replace(/[^\d.]*/g, "").replace(/([.])[.]+/g, "$1").replace(t, "$1"), $(this).val(e)
                })
        }
    })
}, $(document).ready(function() {
    core.input()
}), "undefined" == typeof core && (core = {}), void 0 === coreIntervalIdentMass) var coreIntervalIdentMass = [];
if (core.interval = {
    set: function(e, t, r) {
        if (!e) return !1;
        r = r || coreIntervalIdentMass.length, t = t || 1e3, null != coreIntervalIdentMass[r] && clearInterval(coreIntervalIdentMass[r]), coreIntervalIdentMass[r] = setInterval(e, t)
    },
    clear: function(e) {
        if (e) clearInterval(coreIntervalIdentMass[e]), delete coreIntervalIdentMass[e];
        else {
            for (var t in coreIntervalIdentMass) clearInterval(coreIntervalIdentMass[t]);
            coreIntervalIdentMass = []
        }
    }
}, "undefined" == typeof core && (core = {}), void 0 === coreTimeoutIdentMass) var coreTimeoutIdentMass = [];
core.timeout = {
    set: function(e, t, r) {
        if (!e) return !1;
        r = r || coreTimeoutIdentMass.length, t = t || 1e3, null != coreTimeoutIdentMass[r] && clearTimeout(coreTimeoutIdentMass[r]), coreTimeoutIdentMass[r] = setTimeout(e, t)
    },
    clear: function(e) {
        if (e) clearTimeout(coreTimeoutIdentMass[e]), delete coreTimeoutIdentMass[e];
        else {
            for (var t in coreTimeoutIdentMass) clearTimeout(coreTimeoutIdentMass[t]);
            coreTimeoutIdentMass = []
        }
    }
};