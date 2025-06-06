! function(e, t) {
    for (var n in t) e[n] = t[n]
}(window, function(e) {
    var t = {};

    function n(a) {
        if (t[a]) return t[a].exports;
        var i = t[a] = {
            i: a,
            l: !1,
            exports: {}
        };
        return e[a].call(i.exports, i, i.exports, n), i.l = !0, i.exports
    }
    return n.m = e, n.c = t, n.d = function(e, t, a) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: a
        })
    }, n.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, n.t = function(e, t) {
        if (1 & t && (e = n(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var a = Object.create(null);
        if (n.r(a), Object.defineProperty(a, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var i in e) n.d(a, i, function(t) {
                return e[t]
            }.bind(null, i));
        return a
    }, n.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "", n(n.s = 253)
}({
    253: function(e, t, n) {
        "use strict";
        n.r(t);
        var a = n(36);
        n.d(t, "flatpickr", (function() {
            return a
        }))
    },
    36: function(e, t, n) {
        /* flatpickr v4.6.9, @license MIT */
        e.exports = function() {
            "use strict";
            /*! *****************************************************************************
                Copyright (c) Microsoft Corporation.

                Permission to use, copy, modify, and/or distribute this software for any
                purpose with or without fee is hereby granted.

                THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
                REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
                AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
                INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
                LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
                OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
                PERFORMANCE OF THIS SOFTWARE.
                ***************************************************************************** */
            var e = function() {
                return (e = Object.assign || function(e) {
                    for (var t, n = 1, a = arguments.length; n < a; n++)
                        for (var i in t = arguments[n]) Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
                    return e
                }).apply(this, arguments)
            };

            function t() {
                for (var e = 0, t = 0, n = arguments.length; t < n; t++) e += arguments[t].length;
                var a = Array(e),
                    i = 0;
                for (t = 0; t < n; t++)
                    for (var o = arguments[t], r = 0, l = o.length; r < l; r++, i++) a[i] = o[r];
                return a
            }
            var n = ["onChange", "onClose", "onDayCreate", "onDestroy", "onKeyDown", "onMonthChange", "onOpen", "onParseConfig", "onReady", "onValueUpdate", "onYearChange", "onPreCalendarPosition"],
                a = {
                    _disable: [],
                    allowInput: !1,
                    allowInvalidPreload: !1,
                    altFormat: "F j, Y",
                    altInput: !1,
                    altInputClass: "form-control input",
                    animate: "object" == typeof window && -1 === window.navigator.userAgent.indexOf("MSIE"),
                    ariaDateFormat: "F j, Y",
                    autoFillDefaultTime: !0,
                    clickOpens: !0,
                    closeOnSelect: !0,
                    conjunction: ", ",
                    dateFormat: "Y-m-d",
                    defaultHour: 12,
                    defaultMinute: 0,
                    defaultSeconds: 0,
                    disable: [],
                    disableMobile: !1,
                    enableSeconds: !1,
                    enableTime: !1,
                    errorHandler: function(e) {
                        return "undefined" != typeof console && console.warn(e)
                    },
                    getWeek: function(e) {
                        var t = new Date(e.getTime());
                        t.setHours(0, 0, 0, 0), t.setDate(t.getDate() + 3 - (t.getDay() + 6) % 7);
                        var n = new Date(t.getFullYear(), 0, 4);
                        return 1 + Math.round(((t.getTime() - n.getTime()) / 864e5 - 3 + (n.getDay() + 6) % 7) / 7)
                    },
                    hourIncrement: 1,
                    ignoredFocusElements: [],
                    inline: !1,
                    locale: "default",
                    minuteIncrement: 5,
                    mode: "single",
                    monthSelectorType: "dropdown",
                    nextArrow: "<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z' /></svg>",
                    noCalendar: !1,
                    now: new Date,
                    onChange: [],
                    onClose: [],
                    onDayCreate: [],
                    onDestroy: [],
                    onKeyDown: [],
                    onMonthChange: [],
                    onOpen: [],
                    onParseConfig: [],
                    onReady: [],
                    onValueUpdate: [],
                    onYearChange: [],
                    onPreCalendarPosition: [],
                    plugins: [],
                    position: "auto",
                    positionElement: void 0,
                    prevArrow: "<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z' /></svg>",
                    shorthandCurrentMonth: !1,
                    showMonths: 1,
                    static: !1,
                    time_24hr: !1,
                    weekNumbers: !1,
                    wrap: !1
                },
                i = {
                    weekdays: {
                        shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                        longhand: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
                    },
                    months: {
                        shorthand: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        longhand: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
                    },
                    daysInMonth: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
                    firstDayOfWeek: 0,
                    ordinal: function(e) {
                        var t = e % 100;
                        if (t > 3 && t < 21) return "th";
                        switch (t % 10) {
                            case 1:
                                return "st";
                            case 2:
                                return "nd";
                            case 3:
                                return "rd";
                            default:
                                return "th"
                        }
                    },
                    rangeSeparator: " to ",
                    weekAbbreviation: "Wk",
                    scrollTitle: "Scroll to increment",
                    toggleTitle: "Click to toggle",
                    amPM: ["AM", "PM"],
                    yearAriaLabel: "Year",
                    monthAriaLabel: "Month",
                    hourAriaLabel: "Hour",
                    minuteAriaLabel: "Minute",
                    time_24hr: !1
                },
                o = function(e, t) {
                    return void 0 === t && (t = 2), ("000" + e).slice(-1 * t)
                },
                r = function(e) {
                    return !0 === e ? 1 : 0
                };

            function l(e, t) {
                var n;
                return function() {
                    var a = this;
                    clearTimeout(n), n = setTimeout((function() {
                        return e.apply(a, arguments)
                    }), t)
                }
            }
            var c = function(e) {
                return e instanceof Array ? e : [e]
            };

            function s(e, t, n) {
                if (!0 === n) return e.classList.add(t);
                e.classList.remove(t)
            }

            function d(e, t, n) {
                var a = window.document.createElement(e);
                return t = t || "", n = n || "", a.className = t, void 0 !== n && (a.textContent = n), a
            }

            function u(e) {
                for (; e.firstChild;) e.removeChild(e.firstChild)
            }

            function f(e, t) {
                var n = d("div", "numInputWrapper"),
                    a = d("input", "numInput " + e),
                    i = d("span", "arrowUp"),
                    o = d("span", "arrowDown");
                if (-1 === navigator.userAgent.indexOf("MSIE 9.0") ? a.type = "number" : (a.type = "text", a.pattern = "\\d*"), void 0 !== t)
                    for (var r in t) a.setAttribute(r, t[r]);
                return n.appendChild(a), n.appendChild(i), n.appendChild(o), n
            }

            function m(e) {
                try {
                    return "function" == typeof e.composedPath ? e.composedPath()[0] : e.target
                } catch (t) {
                    return e.target
                }
            }
            var g = function() {},
                p = function(e, t, n) {
                    return n.months[t ? "shorthand" : "longhand"][e]
                },
                h = {
                    D: g,
                    F: function(e, t, n) {
                        e.setMonth(n.months.longhand.indexOf(t))
                    },
                    G: function(e, t) {
                        e.setHours(parseFloat(t))
                    },
                    H: function(e, t) {
                        e.setHours(parseFloat(t))
                    },
                    J: function(e, t) {
                        e.setDate(parseFloat(t))
                    },
                    K: function(e, t, n) {
                        e.setHours(e.getHours() % 12 + 12 * r(new RegExp(n.amPM[1], "i").test(t)))
                    },
                    M: function(e, t, n) {
                        e.setMonth(n.months.shorthand.indexOf(t))
                    },
                    S: function(e, t) {
                        e.setSeconds(parseFloat(t))
                    },
                    U: function(e, t) {
                        return new Date(1e3 * parseFloat(t))
                    },
                    W: function(e, t, n) {
                        var a = parseInt(t),
                            i = new Date(e.getFullYear(), 0, 2 + 7 * (a - 1), 0, 0, 0, 0);
                        return i.setDate(i.getDate() - i.getDay() + n.firstDayOfWeek), i
                    },
                    Y: function(e, t) {
                        e.setFullYear(parseFloat(t))
                    },
                    Z: function(e, t) {
                        return new Date(t)
                    },
                    d: function(e, t) {
                        e.setDate(parseFloat(t))
                    },
                    h: function(e, t) {
                        e.setHours(parseFloat(t))
                    },
                    i: function(e, t) {
                        e.setMinutes(parseFloat(t))
                    },
                    j: function(e, t) {
                        e.setDate(parseFloat(t))
                    },
                    l: g,
                    m: function(e, t) {
                        e.setMonth(parseFloat(t) - 1)
                    },
                    n: function(e, t) {
                        e.setMonth(parseFloat(t) - 1)
                    },
                    s: function(e, t) {
                        e.setSeconds(parseFloat(t))
                    },
                    u: function(e, t) {
                        return new Date(parseFloat(t))
                    },
                    w: g,
                    y: function(e, t) {
                        e.setFullYear(2e3 + parseFloat(t))
                    }
                },
                v = {
                    D: "(\\w+)",
                    F: "(\\w+)",
                    G: "(\\d\\d|\\d)",
                    H: "(\\d\\d|\\d)",
                    J: "(\\d\\d|\\d)\\w+",
                    K: "",
                    M: "(\\w+)",
                    S: "(\\d\\d|\\d)",
                    U: "(.+)",
                    W: "(\\d\\d|\\d)",
                    Y: "(\\d{4})",
                    Z: "(.+)",
                    d: "(\\d\\d|\\d)",
                    h: "(\\d\\d|\\d)",
                    i: "(\\d\\d|\\d)",
                    j: "(\\d\\d|\\d)",
                    l: "(\\w+)",
                    m: "(\\d\\d|\\d)",
                    n: "(\\d\\d|\\d)",
                    s: "(\\d\\d|\\d)",
                    u: "(.+)",
                    w: "(\\d\\d|\\d)",
                    y: "(\\d{2})"
                },
                D = {
                    Z: function(e) {
                        return e.toISOString()
                    },
                    D: function(e, t, n) {
                        return t.weekdays.shorthand[D.w(e, t, n)]
                    },
                    F: function(e, t, n) {
                        return p(D.n(e, t, n) - 1, !1, t)
                    },
                    G: function(e, t, n) {
                        return o(D.h(e, t, n))
                    },
                    H: function(e) {
                        return o(e.getHours())
                    },
                    J: function(e, t) {
                        return void 0 !== t.ordinal ? e.getDate() + t.ordinal(e.getDate()) : e.getDate()
                    },
                    K: function(e, t) {
                        return t.amPM[r(e.getHours() > 11)]
                    },
                    M: function(e, t) {
                        return p(e.getMonth(), !0, t)
                    },
                    S: function(e) {
                        return o(e.getSeconds())
                    },
                    U: function(e) {
                        return e.getTime() / 1e3
                    },
                    W: function(e, t, n) {
                        return n.getWeek(e)
                    },
                    Y: function(e) {
                        return o(e.getFullYear(), 4)
                    },
                    d: function(e) {
                        return o(e.getDate())
                    },
                    h: function(e) {
                        return e.getHours() % 12 ? e.getHours() % 12 : 12
                    },
                    i: function(e) {
                        return o(e.getMinutes())
                    },
                    j: function(e) {
                        return e.getDate()
                    },
                    l: function(e, t) {
                        return t.weekdays.longhand[e.getDay()]
                    },
                    m: function(e) {
                        return o(e.getMonth() + 1)
                    },
                    n: function(e) {
                        return e.getMonth() + 1
                    },
                    s: function(e) {
                        return e.getSeconds()
                    },
                    u: function(e) {
                        return e.getTime()
                    },
                    w: function(e) {
                        return e.getDay()
                    },
                    y: function(e) {
                        return String(e.getFullYear()).substring(2)
                    }
                },
                b = function(e) {
                    var t = e.config,
                        n = void 0 === t ? a : t,
                        o = e.l10n,
                        r = void 0 === o ? i : o,
                        l = e.isMobile,
                        c = void 0 !== l && l;
                    return function(e, t, a) {
                        var i = a || r;
                        return void 0 === n.formatDate || c ? t.split("").map((function(t, a, o) {
                            return D[t] && "\\" !== o[a - 1] ? D[t](e, i, n) : "\\" !== t ? t : ""
                        })).join("") : n.formatDate(e, t, i)
                    }
                },
                w = function(e) {
                    var t = e.config,
                        n = void 0 === t ? a : t,
                        o = e.l10n,
                        r = void 0 === o ? i : o;
                    return function(e, t, i, o) {
                        if (0 === e || e) {
                            var l, c = o || r,
                                s = e;
                            if (e instanceof Date) l = new Date(e.getTime());
                            else if ("string" != typeof e && void 0 !== e.toFixed) l = new Date(e);
                            else if ("string" == typeof e) {
                                var d = t || (n || a).dateFormat,
                                    u = String(e).trim();
                                if ("today" === u) l = new Date, i = !0;
                                else if (/Z$/.test(u) || /GMT$/.test(u)) l = new Date(e);
                                else if (n && n.parseDate) l = n.parseDate(e, d);
                                else {
                                    l = n && n.noCalendar ? new Date((new Date).setHours(0, 0, 0, 0)) : new Date((new Date).getFullYear(), 0, 1, 0, 0, 0, 0);
                                    for (var f = void 0, m = [], g = 0, p = 0, D = ""; g < d.length; g++) {
                                        var b = d[g],
                                            w = "\\" === b,
                                            y = "\\" === d[g - 1] || w;
                                        if (v[b] && !y) {
                                            D += v[b];
                                            var C = new RegExp(D).exec(e);
                                            C && (f = !0) && m["Y" !== b ? "push" : "unshift"]({
                                                fn: h[b],
                                                val: C[++p]
                                            })
                                        } else w || (D += ".");
                                        m.forEach((function(e) {
                                            var t = e.fn,
                                                n = e.val;
                                            return l = t(l, n, c) || l
                                        }))
                                    }
                                    l = f ? l : void 0
                                }
                            }
                            if (l instanceof Date && !isNaN(l.getTime())) return !0 === i && l.setHours(0, 0, 0, 0), l;
                            n.errorHandler(new Error("Invalid date provided: " + s))
                        }
                    }
                };

            function y(e, t, n) {
                return void 0 === n && (n = !0), !1 !== n ? new Date(e.getTime()).setHours(0, 0, 0, 0) - new Date(t.getTime()).setHours(0, 0, 0, 0) : e.getTime() - t.getTime()
            }
            var C = 864e5;

            function M(e) {
                var t = e.defaultHour,
                    n = e.defaultMinute,
                    a = e.defaultSeconds;
                if (void 0 !== e.minDate) {
                    var i = e.minDate.getHours(),
                        o = e.minDate.getMinutes(),
                        r = e.minDate.getSeconds();
                    t < i && (t = i), t === i && n < o && (n = o), t === i && n === o && a < r && (a = e.minDate.getSeconds())
                }
                if (void 0 !== e.maxDate) {
                    var l = e.maxDate.getHours(),
                        c = e.maxDate.getMinutes();
                    (t = Math.min(t, l)) === l && (n = Math.min(c, n)), t === l && n === c && (a = e.maxDate.getSeconds())
                }
                return {
                    hours: t,
                    minutes: n,
                    seconds: a
                }
            }

            function x(g, h) {
                var D = {
                    config: e(e({}, a), k.defaultConfig),
                    l10n: i
                };

                function x(e) {
                    return e.bind(D)
                }

                function E() {
                    var e = D.config;
                    !1 === e.weekNumbers && 1 === e.showMonths || !0 !== e.noCalendar && window.requestAnimationFrame((function() {
                        if (void 0 !== D.calendarContainer && (D.calendarContainer.style.visibility = "hidden", D.calendarContainer.style.display = "block"), void 0 !== D.daysContainer) {
                            var t = (D.days.offsetWidth + 1) * e.showMonths;
                            D.daysContainer.style.width = t + "px", D.calendarContainer.style.width = t + (void 0 !== D.weekWrapper ? D.weekWrapper.offsetWidth : 0) + "px", D.calendarContainer.style.removeProperty("visibility"), D.calendarContainer.style.removeProperty("display")
                        }
                    }))
                }

                function T(e) {
                    if (0 === D.selectedDates.length) {
                        var t = void 0 === D.config.minDate || y(new Date, D.config.minDate) >= 0 ? new Date : new Date(D.config.minDate.getTime()),
                            n = M(D.config);
                        t.setHours(n.hours, n.minutes, n.seconds, t.getMilliseconds()), D.selectedDates = [t], D.latestSelectedDateObj = t
                    }
                    void 0 !== e && "blur" !== e.type && function(e) {
                        e.preventDefault();
                        var t = "keydown" === e.type,
                            n = m(e),
                            a = n;
                        void 0 !== D.amPM && n === D.amPM && (D.amPM.textContent = D.l10n.amPM[r(D.amPM.textContent === D.l10n.amPM[0])]);
                        var i = parseFloat(a.getAttribute("min")),
                            l = parseFloat(a.getAttribute("max")),
                            c = parseFloat(a.getAttribute("step")),
                            s = parseInt(a.value, 10),
                            d = e.delta || (t ? 38 === e.which ? 1 : -1 : 0),
                            u = s + c * d;
                        if (void 0 !== a.value && 2 === a.value.length) {
                            var f = a === D.hourElement,
                                g = a === D.minuteElement;
                            u < i ? (u = l + u + r(!f) + (r(f) && r(!D.amPM)), g && Y(void 0, -1, D.hourElement)) : u > l && (u = a === D.hourElement ? u - l - r(!D.amPM) : i, g && Y(void 0, 1, D.hourElement)), D.amPM && f && (1 === c ? u + s === 23 : Math.abs(u - s) > c) && (D.amPM.textContent = D.l10n.amPM[r(D.amPM.textContent === D.l10n.amPM[0])]), a.value = o(u)
                        }
                    }(e);
                    var a = D._input.value;
                    S(), be(), D._input.value !== a && D._debouncedChange()
                }

                function S() {
                    if (void 0 !== D.hourElement && void 0 !== D.minuteElement) {
                        var e, t, n = (parseInt(D.hourElement.value.slice(-2), 10) || 0) % 24,
                            a = (parseInt(D.minuteElement.value, 10) || 0) % 60,
                            i = void 0 !== D.secondElement ? (parseInt(D.secondElement.value, 10) || 0) % 60 : 0;
                        void 0 !== D.amPM && (e = n, t = D.amPM.textContent, n = e % 12 + 12 * r(t === D.l10n.amPM[1]));
                        var o = void 0 !== D.config.minTime || D.config.minDate && D.minDateHasTime && D.latestSelectedDateObj && 0 === y(D.latestSelectedDateObj, D.config.minDate, !0);
                        if (void 0 !== D.config.maxTime || D.config.maxDate && D.maxDateHasTime && D.latestSelectedDateObj && 0 === y(D.latestSelectedDateObj, D.config.maxDate, !0)) {
                            var l = void 0 !== D.config.maxTime ? D.config.maxTime : D.config.maxDate;
                            (n = Math.min(n, l.getHours())) === l.getHours() && (a = Math.min(a, l.getMinutes())), a === l.getMinutes() && (i = Math.min(i, l.getSeconds()))
                        }
                        if (o) {
                            var c = void 0 !== D.config.minTime ? D.config.minTime : D.config.minDate;
                            (n = Math.max(n, c.getHours())) === c.getHours() && a < c.getMinutes() && (a = c.getMinutes()), a === c.getMinutes() && (i = Math.max(i, c.getSeconds()))
                        }
                        I(n, a, i)
                    }
                }

                function _(e) {
                    var t = e || D.latestSelectedDateObj;
                    t && I(t.getHours(), t.getMinutes(), t.getSeconds())
                }

                function I(e, t, n) {
                    void 0 !== D.latestSelectedDateObj && D.latestSelectedDateObj.setHours(e % 24, t, n || 0, 0), D.hourElement && D.minuteElement && !D.isMobile && (D.hourElement.value = o(D.config.time_24hr ? e : (12 + e) % 12 + 12 * r(e % 12 == 0)), D.minuteElement.value = o(t), void 0 !== D.amPM && (D.amPM.textContent = D.l10n.amPM[r(e >= 12)]), void 0 !== D.secondElement && (D.secondElement.value = o(n)))
                }

                function O(e) {
                    var t = m(e),
                        n = parseInt(t.value) + (e.delta || 0);
                    (n / 1e3 > 1 || "Enter" === e.key && !/[^\d]/.test(n.toString())) && Z(n)
                }

                function F(e, t, n, a) {
                    return t instanceof Array ? t.forEach((function(t) {
                        return F(e, t, n, a)
                    })) : e instanceof Array ? e.forEach((function(e) {
                        return F(e, t, n, a)
                    })) : (e.addEventListener(t, n, a), void D._handlers.push({
                        remove: function() {
                            return e.removeEventListener(t, n)
                        }
                    }))
                }

                function P() {
                    ge("onChange")
                }

                function A(e, t) {
                    var n = void 0 !== e ? D.parseDate(e) : D.latestSelectedDateObj || (D.config.minDate && D.config.minDate > D.now ? D.config.minDate : D.config.maxDate && D.config.maxDate < D.now ? D.config.maxDate : D.now),
                        a = D.currentYear,
                        i = D.currentMonth;
                    try {
                        void 0 !== n && (D.currentYear = n.getFullYear(), D.currentMonth = n.getMonth())
                    } catch (e) {
                        e.message = "Invalid date supplied: " + n, D.config.errorHandler(e)
                    }
                    t && D.currentYear !== a && (ge("onYearChange"), J()), !t || D.currentYear === a && D.currentMonth === i || ge("onMonthChange"), D.redraw()
                }

                function N(e) {
                    var t = m(e);
                    ~t.className.indexOf("arrow") && Y(e, t.classList.contains("arrowUp") ? 1 : -1)
                }

                function Y(e, t, n) {
                    var a = e && m(e),
                        i = n || a && a.parentNode && a.parentNode.firstChild,
                        o = pe("increment");
                    o.delta = t, i && i.dispatchEvent(o)
                }

                function j(e, t, n, a) {
                    var i = Q(t, !0),
                        o = d("span", "flatpickr-day " + e, t.getDate().toString());
                    return o.dateObj = t, o.$i = a, o.setAttribute("aria-label", D.formatDate(t, D.config.ariaDateFormat)), -1 === e.indexOf("hidden") && 0 === y(t, D.now) && (D.todayDateElem = o, o.classList.add("today"), o.setAttribute("aria-current", "date")), i ? (o.tabIndex = -1, he(t) && (o.classList.add("selected"), D.selectedDateElem = o, "range" === D.config.mode && (s(o, "startRange", D.selectedDates[0] && 0 === y(t, D.selectedDates[0], !0)), s(o, "endRange", D.selectedDates[1] && 0 === y(t, D.selectedDates[1], !0)), "nextMonthDay" === e && o.classList.add("inRange")))) : o.classList.add("flatpickr-disabled"), "range" === D.config.mode && function(e) {
                        return !("range" !== D.config.mode || D.selectedDates.length < 2) && y(e, D.selectedDates[0]) >= 0 && y(e, D.selectedDates[1]) <= 0
                    }(t) && !he(t) && o.classList.add("inRange"), D.weekNumbers && 1 === D.config.showMonths && "prevMonthDay" !== e && n % 7 == 1 && D.weekNumbers.insertAdjacentHTML("beforeend", "<span class='flatpickr-day'>" + D.config.getWeek(t) + "</span>"), ge("onDayCreate", o), o
                }

                function H(e) {
                    e.focus(), "range" === D.config.mode && ne(e)
                }

                function L(e) {
                    for (var t = e > 0 ? 0 : D.config.showMonths - 1, n = e > 0 ? D.config.showMonths : -1, a = t; a != n; a += e)
                        for (var i = D.daysContainer.children[a], o = e > 0 ? 0 : i.children.length - 1, r = e > 0 ? i.children.length : -1, l = o; l != r; l += e) {
                            var c = i.children[l];
                            if (-1 === c.className.indexOf("hidden") && Q(c.dateObj)) return c
                        }
                }

                function W(e, t) {
                    var n = X(document.activeElement || document.body),
                        a = void 0 !== e ? e : n ? document.activeElement : void 0 !== D.selectedDateElem && X(D.selectedDateElem) ? D.selectedDateElem : void 0 !== D.todayDateElem && X(D.todayDateElem) ? D.todayDateElem : L(t > 0 ? 1 : -1);
                    void 0 === a ? D._input.focus() : n ? function(e, t) {
                        for (var n = -1 === e.className.indexOf("Month") ? e.dateObj.getMonth() : D.currentMonth, a = t > 0 ? D.config.showMonths : -1, i = t > 0 ? 1 : -1, o = n - D.currentMonth; o != a; o += i)
                            for (var r = D.daysContainer.children[o], l = n - D.currentMonth === o ? e.$i + t : t < 0 ? r.children.length - 1 : 0, c = r.children.length, s = l; s >= 0 && s < c && s != (t > 0 ? c : -1); s += i) {
                                var d = r.children[s];
                                if (-1 === d.className.indexOf("hidden") && Q(d.dateObj) && Math.abs(e.$i - s) >= Math.abs(t)) return H(d)
                            }
                        D.changeMonth(i), W(L(i), 0)
                    }(a, t) : H(a)
                }

                function R(e, t) {
                    for (var n = (new Date(e, t, 1).getDay() - D.l10n.firstDayOfWeek + 7) % 7, a = D.utils.getDaysInMonth((t - 1 + 12) % 12, e), i = D.utils.getDaysInMonth(t, e), o = window.document.createDocumentFragment(), r = D.config.showMonths > 1, l = r ? "prevMonthDay hidden" : "prevMonthDay", c = r ? "nextMonthDay hidden" : "nextMonthDay", s = a + 1 - n, u = 0; s <= a; s++, u++) o.appendChild(j(l, new Date(e, t - 1, s), s, u));
                    for (s = 1; s <= i; s++, u++) o.appendChild(j("", new Date(e, t, s), s, u));
                    for (var f = i + 1; f <= 42 - n && (1 === D.config.showMonths || u % 7 != 0); f++, u++) o.appendChild(j(c, new Date(e, t + 1, f % i), f, u));
                    var m = d("div", "dayContainer");
                    return m.appendChild(o), m
                }

                function B() {
                    if (void 0 !== D.daysContainer) {
                        u(D.daysContainer), D.weekNumbers && u(D.weekNumbers);
                        for (var e = document.createDocumentFragment(), t = 0; t < D.config.showMonths; t++) {
                            var n = new Date(D.currentYear, D.currentMonth, 1);
                            n.setMonth(D.currentMonth + t), e.appendChild(R(n.getFullYear(), n.getMonth()))
                        }
                        D.daysContainer.appendChild(e), D.days = D.daysContainer.firstChild, "range" === D.config.mode && 1 === D.selectedDates.length && ne()
                    }
                }

                function J() {
                    if (!(D.config.showMonths > 1 || "dropdown" !== D.config.monthSelectorType)) {
                        var e = function(e) {
                            return !(void 0 !== D.config.minDate && D.currentYear === D.config.minDate.getFullYear() && e < D.config.minDate.getMonth() || void 0 !== D.config.maxDate && D.currentYear === D.config.maxDate.getFullYear() && e > D.config.maxDate.getMonth())
                        };
                        D.monthsDropdownContainer.tabIndex = -1, D.monthsDropdownContainer.innerHTML = "";
                        for (var t = 0; t < 12; t++)
                            if (e(t)) {
                                var n = d("option", "flatpickr-monthDropdown-month");
                                n.value = new Date(D.currentYear, t).getMonth().toString(), n.textContent = p(t, D.config.shorthandCurrentMonth, D.l10n), n.tabIndex = -1, D.currentMonth === t && (n.selected = !0), D.monthsDropdownContainer.appendChild(n)
                            }
                    }
                }

                function K() {
                    var e, t = d("div", "flatpickr-month"),
                        n = window.document.createDocumentFragment();
                    D.config.showMonths > 1 || "static" === D.config.monthSelectorType ? e = d("span", "cur-month") : (D.monthsDropdownContainer = d("select", "flatpickr-monthDropdown-months"), D.monthsDropdownContainer.setAttribute("aria-label", D.l10n.monthAriaLabel), F(D.monthsDropdownContainer, "change", (function(e) {
                        var t = m(e),
                            n = parseInt(t.value, 10);
                        D.changeMonth(n - D.currentMonth), ge("onMonthChange")
                    })), J(), e = D.monthsDropdownContainer);
                    var a = f("cur-year", {
                            tabindex: "-1"
                        }),
                        i = a.getElementsByTagName("input")[0];
                    i.setAttribute("aria-label", D.l10n.yearAriaLabel), D.config.minDate && i.setAttribute("min", D.config.minDate.getFullYear().toString()), D.config.maxDate && (i.setAttribute("max", D.config.maxDate.getFullYear().toString()), i.disabled = !!D.config.minDate && D.config.minDate.getFullYear() === D.config.maxDate.getFullYear());
                    var o = d("div", "flatpickr-current-month");
                    return o.appendChild(e), o.appendChild(a), n.appendChild(o), t.appendChild(n), {
                        container: t,
                        yearElement: i,
                        monthElement: e
                    }
                }

                function U() {
                    u(D.monthNav), D.monthNav.appendChild(D.prevMonthNav), D.config.showMonths && (D.yearElements = [], D.monthElements = []);
                    for (var e = D.config.showMonths; e--;) {
                        var t = K();
                        D.yearElements.push(t.yearElement), D.monthElements.push(t.monthElement), D.monthNav.appendChild(t.container)
                    }
                    D.monthNav.appendChild(D.nextMonthNav)
                }

                function q() {
                    D.weekdayContainer ? u(D.weekdayContainer) : D.weekdayContainer = d("div", "flatpickr-weekdays");
                    for (var e = D.config.showMonths; e--;) {
                        var t = d("div", "flatpickr-weekdaycontainer");
                        D.weekdayContainer.appendChild(t)
                    }
                    return $(), D.weekdayContainer
                }

                function $() {
                    if (D.weekdayContainer) {
                        var e = D.l10n.firstDayOfWeek,
                            n = t(D.l10n.weekdays.shorthand);
                        e > 0 && e < n.length && (n = t(n.splice(e, n.length), n.splice(0, e)));
                        for (var a = D.config.showMonths; a--;) D.weekdayContainer.children[a].innerHTML = "\n      <span class='flatpickr-weekday'>\n        " + n.join("</span><span class='flatpickr-weekday'>") + "\n      </span>\n      "
                    }
                }

                function z(e, t) {
                    void 0 === t && (t = !0);
                    var n = t ? e : e - D.currentMonth;
                    n < 0 && !0 === D._hidePrevMonthArrow || n > 0 && !0 === D._hideNextMonthArrow || (D.currentMonth += n, (D.currentMonth < 0 || D.currentMonth > 11) && (D.currentYear += D.currentMonth > 11 ? 1 : -1, D.currentMonth = (D.currentMonth + 12) % 12, ge("onYearChange"), J()), B(), ge("onMonthChange"), ve())
                }

                function G(e) {
                    return !(!D.config.appendTo || !D.config.appendTo.contains(e)) || D.calendarContainer.contains(e)
                }

                function V(e) {
                    if (D.isOpen && !D.config.inline) {
                        var t = m(e),
                            n = G(t),
                            a = t === D.input || t === D.altInput || D.element.contains(t) || e.path && e.path.indexOf && (~e.path.indexOf(D.input) || ~e.path.indexOf(D.altInput)),
                            i = "blur" === e.type ? a && e.relatedTarget && !G(e.relatedTarget) : !a && !n && !G(e.relatedTarget),
                            o = !D.config.ignoredFocusElements.some((function(e) {
                                return e.contains(t)
                            }));
                        i && o && (void 0 !== D.timeContainer && void 0 !== D.minuteElement && void 0 !== D.hourElement && "" !== D.input.value && void 0 !== D.input.value && T(), D.close(), D.config && "range" === D.config.mode && 1 === D.selectedDates.length && (D.clear(!1), D.redraw()))
                    }
                }

                function Z(e) {
                    if (!(!e || D.config.minDate && e < D.config.minDate.getFullYear() || D.config.maxDate && e > D.config.maxDate.getFullYear())) {
                        var t = e,
                            n = D.currentYear !== t;
                        D.currentYear = t || D.currentYear, D.config.maxDate && D.currentYear === D.config.maxDate.getFullYear() ? D.currentMonth = Math.min(D.config.maxDate.getMonth(), D.currentMonth) : D.config.minDate && D.currentYear === D.config.minDate.getFullYear() && (D.currentMonth = Math.max(D.config.minDate.getMonth(), D.currentMonth)), n && (D.redraw(), ge("onYearChange"), J())
                    }
                }

                function Q(e, t) {
                    var n;
                    void 0 === t && (t = !0);
                    var a = D.parseDate(e, void 0, t);
                    if (D.config.minDate && a && y(a, D.config.minDate, void 0 !== t ? t : !D.minDateHasTime) < 0 || D.config.maxDate && a && y(a, D.config.maxDate, void 0 !== t ? t : !D.maxDateHasTime) > 0) return !1;
                    if (!D.config.enable && 0 === D.config.disable.length) return !0;
                    if (void 0 === a) return !1;
                    for (var i = !!D.config.enable, o = null !== (n = D.config.enable) && void 0 !== n ? n : D.config.disable, r = 0, l = void 0; r < o.length; r++) {
                        if ("function" == typeof(l = o[r]) && l(a)) return i;
                        if (l instanceof Date && void 0 !== a && l.getTime() === a.getTime()) return i;
                        if ("string" == typeof l) {
                            var c = D.parseDate(l, void 0, !0);
                            return c && c.getTime() === a.getTime() ? i : !i
                        }
                        if ("object" == typeof l && void 0 !== a && l.from && l.to && a.getTime() >= l.from.getTime() && a.getTime() <= l.to.getTime()) return i
                    }
                    return !i
                }

                function X(e) {
                    return void 0 !== D.daysContainer && -1 === e.className.indexOf("hidden") && -1 === e.className.indexOf("flatpickr-disabled") && D.daysContainer.contains(e)
                }

                function ee(e) {
                    e.target !== D._input || !(D.selectedDates.length > 0 || D._input.value.length > 0) || e.relatedTarget && G(e.relatedTarget) || D.setDate(D._input.value, !0, e.target === D.altInput ? D.config.altFormat : D.config.dateFormat)
                }

                function te(e) {
                    var t = m(e),
                        n = D.config.wrap ? g.contains(t) : t === D._input,
                        a = D.config.allowInput,
                        i = D.isOpen && (!a || !n),
                        o = D.config.inline && n && !a;
                    if (13 === e.keyCode && n) {
                        if (a) return D.setDate(D._input.value, !0, t === D.altInput ? D.config.altFormat : D.config.dateFormat), t.blur();
                        D.open()
                    } else if (G(t) || i || o) {
                        var r = !!D.timeContainer && D.timeContainer.contains(t);
                        switch (e.keyCode) {
                            case 13:
                                r ? (e.preventDefault(), T(), se()) : de(e);
                                break;
                            case 27:
                                e.preventDefault(), se();
                                break;
                            case 8:
                            case 46:
                                n && !D.config.allowInput && (e.preventDefault(), D.clear());
                                break;
                            case 37:
                            case 39:
                                if (r || n) D.hourElement && D.hourElement.focus();
                                else if (e.preventDefault(), void 0 !== D.daysContainer && (!1 === a || document.activeElement && X(document.activeElement))) {
                                    var l = 39 === e.keyCode ? 1 : -1;
                                    e.ctrlKey ? (e.stopPropagation(), z(l), W(L(1), 0)) : W(void 0, l)
                                }
                                break;
                            case 38:
                            case 40:
                                e.preventDefault();
                                var c = 40 === e.keyCode ? 1 : -1;
                                D.daysContainer && void 0 !== t.$i || t === D.input || t === D.altInput ? e.ctrlKey ? (e.stopPropagation(), Z(D.currentYear - c), W(L(1), 0)) : r || W(void 0, 7 * c) : t === D.currentYearElement ? Z(D.currentYear - c) : D.config.enableTime && (!r && D.hourElement && D.hourElement.focus(), T(e), D._debouncedChange());
                                break;
                            case 9:
                                if (r) {
                                    var s = [D.hourElement, D.minuteElement, D.secondElement, D.amPM].concat(D.pluginElements).filter((function(e) {
                                            return e
                                        })),
                                        d = s.indexOf(t);
                                    if (-1 !== d) {
                                        var u = s[d + (e.shiftKey ? -1 : 1)];
                                        e.preventDefault(), (u || D._input).focus()
                                    }
                                } else !D.config.noCalendar && D.daysContainer && D.daysContainer.contains(t) && e.shiftKey && (e.preventDefault(), D._input.focus())
                        }
                    }
                    if (void 0 !== D.amPM && t === D.amPM) switch (e.key) {
                        case D.l10n.amPM[0].charAt(0):
                        case D.l10n.amPM[0].charAt(0).toLowerCase():
                            D.amPM.textContent = D.l10n.amPM[0], S(), be();
                            break;
                        case D.l10n.amPM[1].charAt(0):
                        case D.l10n.amPM[1].charAt(0).toLowerCase():
                            D.amPM.textContent = D.l10n.amPM[1], S(), be()
                    }(n || G(t)) && ge("onKeyDown", e)
                }

                function ne(e) {
                    if (1 === D.selectedDates.length && (!e || e.classList.contains("flatpickr-day") && !e.classList.contains("flatpickr-disabled"))) {
                        for (var t = e ? e.dateObj.getTime() : D.days.firstElementChild.dateObj.getTime(), n = D.parseDate(D.selectedDates[0], void 0, !0).getTime(), a = Math.min(t, D.selectedDates[0].getTime()), i = Math.max(t, D.selectedDates[0].getTime()), o = !1, r = 0, l = 0, c = a; c < i; c += C) Q(new Date(c), !0) || (o = o || c > a && c < i, c < n && (!r || c > r) ? r = c : c > n && (!l || c < l) && (l = c));
                        for (var s = 0; s < D.config.showMonths; s++)
                            for (var d = D.daysContainer.children[s], u = function(a, i) {
                                    var c, s, u, f = d.children[a],
                                        m = f.dateObj.getTime(),
                                        g = r > 0 && m < r || l > 0 && m > l;
                                    return g ? (f.classList.add("notAllowed"), ["inRange", "startRange", "endRange"].forEach((function(e) {
                                        f.classList.remove(e)
                                    })), "continue") : o && !g ? "continue" : (["startRange", "inRange", "endRange", "notAllowed"].forEach((function(e) {
                                        f.classList.remove(e)
                                    })), void(void 0 !== e && (e.classList.add(t <= D.selectedDates[0].getTime() ? "startRange" : "endRange"), n < t && m === n ? f.classList.add("startRange") : n > t && m === n && f.classList.add("endRange"), m >= r && (0 === l || m <= l) && (s = n, u = t, (c = m) > Math.min(s, u) && c < Math.max(s, u)) && f.classList.add("inRange"))))
                                }, f = 0, m = d.children.length; f < m; f++) u(f)
                    }
                }

                function ae() {
                    !D.isOpen || D.config.static || D.config.inline || le()
                }

                function ie(e) {
                    return function(t) {
                        var n = D.config["_" + e + "Date"] = D.parseDate(t, D.config.dateFormat),
                            a = D.config["_" + ("min" === e ? "max" : "min") + "Date"];
                        void 0 !== n && (D["min" === e ? "minDateHasTime" : "maxDateHasTime"] = n.getHours() > 0 || n.getMinutes() > 0 || n.getSeconds() > 0), D.selectedDates && (D.selectedDates = D.selectedDates.filter((function(e) {
                            return Q(e)
                        })), D.selectedDates.length || "min" !== e || _(n), be()), D.daysContainer && (ce(), void 0 !== n ? D.currentYearElement[e] = n.getFullYear().toString() : D.currentYearElement.removeAttribute(e), D.currentYearElement.disabled = !!a && void 0 !== n && a.getFullYear() === n.getFullYear())
                    }
                }

                function oe() {
                    return D.config.wrap ? g.querySelector("[data-input]") : g
                }

                function re() {
                    "object" != typeof D.config.locale && void 0 === k.l10ns[D.config.locale] && D.config.errorHandler(new Error("flatpickr: invalid locale " + D.config.locale)), D.l10n = e(e({}, k.l10ns.default), "object" == typeof D.config.locale ? D.config.locale : "default" !== D.config.locale ? k.l10ns[D.config.locale] : void 0), v.K = "(" + D.l10n.amPM[0] + "|" + D.l10n.amPM[1] + "|" + D.l10n.amPM[0].toLowerCase() + "|" + D.l10n.amPM[1].toLowerCase() + ")", void 0 === e(e({}, h), JSON.parse(JSON.stringify(g.dataset || {}))).time_24hr && void 0 === k.defaultConfig.time_24hr && (D.config.time_24hr = D.l10n.time_24hr), D.formatDate = b(D), D.parseDate = w({
                        config: D.config,
                        l10n: D.l10n
                    })
                }

                function le(e) {
                    if ("function" != typeof D.config.position) {
                        if (void 0 !== D.calendarContainer) {
                            ge("onPreCalendarPosition");
                            var t = e || D._positionElement,
                                n = Array.prototype.reduce.call(D.calendarContainer.children, (function(e, t) {
                                    return e + t.offsetHeight
                                }), 0),
                                a = D.calendarContainer.offsetWidth,
                                i = D.config.position.split(" "),
                                o = i[0],
                                r = i.length > 1 ? i[1] : null,
                                l = t.getBoundingClientRect(),
                                c = window.innerHeight - l.bottom,
                                d = "above" === o || "below" !== o && c < n && l.top > n,
                                u = window.pageYOffset + l.top + (d ? -n - 2 : t.offsetHeight + 2);
                            if (s(D.calendarContainer, "arrowTop", !d), s(D.calendarContainer, "arrowBottom", d), !D.config.inline) {
                                var f = window.pageXOffset + l.left,
                                    m = !1,
                                    g = !1;
                                "center" === r ? (f -= (a - l.width) / 2, m = !0) : "right" === r && (f -= a - l.width, g = !0), s(D.calendarContainer, "arrowLeft", !m && !g), s(D.calendarContainer, "arrowCenter", m), s(D.calendarContainer, "arrowRight", g);
                                var p = window.document.body.offsetWidth - (window.pageXOffset + l.right),
                                    h = f + a > window.document.body.offsetWidth,
                                    v = p + a > window.document.body.offsetWidth;
                                if (s(D.calendarContainer, "rightMost", h), !D.config.static)
                                    if (D.calendarContainer.style.top = u + "px", h)
                                        if (v) {
                                            var b = function() {
                                                for (var e = null, t = 0; t < document.styleSheets.length; t++) {
                                                    var n = document.styleSheets[t];
                                                    try {
                                                        n.cssRules
                                                    } catch (e) {
                                                        continue
                                                    }
                                                    e = n;
                                                    break
                                                }
                                                return null != e ? e : (a = document.createElement("style"), document.head.appendChild(a), a.sheet);
                                                var a
                                            }();
                                            if (void 0 === b) return;
                                            var w = window.document.body.offsetWidth,
                                                y = Math.max(0, w / 2 - a / 2),
                                                C = b.cssRules.length,
                                                M = "{left:" + l.left + "px;right:auto;}";
                                            s(D.calendarContainer, "rightMost", !1), s(D.calendarContainer, "centerMost", !0), b.insertRule(".flatpickr-calendar.centerMost:before,.flatpickr-calendar.centerMost:after" + M, C), D.calendarContainer.style.left = y + "px", D.calendarContainer.style.right = "auto"
                                        } else D.calendarContainer.style.left = "auto", D.calendarContainer.style.right = p + "px";
                                else D.calendarContainer.style.left = f + "px", D.calendarContainer.style.right = "auto"
                            }
                        }
                    } else D.config.position(D, e)
                }

                function ce() {
                    D.config.noCalendar || D.isMobile || (J(), ve(), B())
                }

                function se() {
                    D._input.focus(), -1 !== window.navigator.userAgent.indexOf("MSIE") || void 0 !== navigator.msMaxTouchPoints ? setTimeout(D.close, 0) : D.close()
                }

                function de(e) {
                    e.preventDefault(), e.stopPropagation();
                    var t = function e(t, n) {
                        return n(t) ? t : t.parentNode ? e(t.parentNode, n) : void 0
                    }(m(e), (function(e) {
                        return e.classList && e.classList.contains("flatpickr-day") && !e.classList.contains("flatpickr-disabled") && !e.classList.contains("notAllowed")
                    }));
                    if (void 0 !== t) {
                        var n = t,
                            a = D.latestSelectedDateObj = new Date(n.dateObj.getTime()),
                            i = (a.getMonth() < D.currentMonth || a.getMonth() > D.currentMonth + D.config.showMonths - 1) && "range" !== D.config.mode;
                        if (D.selectedDateElem = n, "single" === D.config.mode) D.selectedDates = [a];
                        else if ("multiple" === D.config.mode) {
                            var o = he(a);
                            o ? D.selectedDates.splice(parseInt(o), 1) : D.selectedDates.push(a)
                        } else "range" === D.config.mode && (2 === D.selectedDates.length && D.clear(!1, !1), D.latestSelectedDateObj = a, D.selectedDates.push(a), 0 !== y(a, D.selectedDates[0], !0) && D.selectedDates.sort((function(e, t) {
                            return e.getTime() - t.getTime()
                        })));
                        if (S(), i) {
                            var r = D.currentYear !== a.getFullYear();
                            D.currentYear = a.getFullYear(), D.currentMonth = a.getMonth(), r && (ge("onYearChange"), J()), ge("onMonthChange")
                        }
                        if (ve(), B(), be(), i || "range" === D.config.mode || 1 !== D.config.showMonths ? void 0 !== D.selectedDateElem && void 0 === D.hourElement && D.selectedDateElem && D.selectedDateElem.focus() : H(n), void 0 !== D.hourElement && void 0 !== D.hourElement && D.hourElement.focus(), D.config.closeOnSelect) {
                            var l = "single" === D.config.mode && !D.config.enableTime,
                                c = "range" === D.config.mode && 2 === D.selectedDates.length && !D.config.enableTime;
                            (l || c) && se()
                        }
                        P()
                    }
                }
                D.parseDate = w({
                    config: D.config,
                    l10n: D.l10n
                }), D._handlers = [], D.pluginElements = [], D.loadedPlugins = [], D._bind = F, D._setHoursFromDate = _, D._positionCalendar = le, D.changeMonth = z, D.changeYear = Z, D.clear = function(e, t) {
                    if (void 0 === e && (e = !0), void 0 === t && (t = !0), D.input.value = "", void 0 !== D.altInput && (D.altInput.value = ""), void 0 !== D.mobileInput && (D.mobileInput.value = ""), D.selectedDates = [], D.latestSelectedDateObj = void 0, !0 === t && (D.currentYear = D._initialDate.getFullYear(), D.currentMonth = D._initialDate.getMonth()), !0 === D.config.enableTime) {
                        var n = M(D.config),
                            a = n.hours,
                            i = n.minutes,
                            o = n.seconds;
                        I(a, i, o)
                    }
                    D.redraw(), e && ge("onChange")
                }, D.close = function() {
                    D.isOpen = !1, D.isMobile || (void 0 !== D.calendarContainer && D.calendarContainer.classList.remove("open"), void 0 !== D._input && D._input.classList.remove("active")), ge("onClose")
                }, D._createElement = d, D.destroy = function() {
                    void 0 !== D.config && ge("onDestroy");
                    for (var e = D._handlers.length; e--;) D._handlers[e].remove();
                    if (D._handlers = [], D.mobileInput) D.mobileInput.parentNode && D.mobileInput.parentNode.removeChild(D.mobileInput), D.mobileInput = void 0;
                    else if (D.calendarContainer && D.calendarContainer.parentNode)
                        if (D.config.static && D.calendarContainer.parentNode) {
                            var t = D.calendarContainer.parentNode;
                            if (t.lastChild && t.removeChild(t.lastChild), t.parentNode) {
                                for (; t.firstChild;) t.parentNode.insertBefore(t.firstChild, t);
                                t.parentNode.removeChild(t)
                            }
                        } else D.calendarContainer.parentNode.removeChild(D.calendarContainer);
                    D.altInput && (D.input.type = "text", D.altInput.parentNode && D.altInput.parentNode.removeChild(D.altInput), delete D.altInput), D.input && (D.input.type = D.input._type, D.input.classList.remove("flatpickr-input"), D.input.removeAttribute("readonly")), ["_showTimeInput", "latestSelectedDateObj", "_hideNextMonthArrow", "_hidePrevMonthArrow", "__hideNextMonthArrow", "__hidePrevMonthArrow", "isMobile", "isOpen", "selectedDateElem", "minDateHasTime", "maxDateHasTime", "days", "daysContainer", "_input", "_positionElement", "innerContainer", "rContainer", "monthNav", "todayDateElem", "calendarContainer", "weekdayContainer", "prevMonthNav", "nextMonthNav", "monthsDropdownContainer", "currentMonthElement", "currentYearElement", "navigationCurrentMonth", "selectedDateElem", "config"].forEach((function(e) {
                        try {
                            delete D[e]
                        } catch (e) {}
                    }))
                }, D.isEnabled = Q, D.jumpToDate = A, D.open = function(e, t) {
                    if (void 0 === t && (t = D._positionElement), !0 === D.isMobile) {
                        if (e) {
                            e.preventDefault();
                            var n = m(e);
                            n && n.blur()
                        }
                        return void 0 !== D.mobileInput && (D.mobileInput.focus(), D.mobileInput.click()), void ge("onOpen")
                    }
                    if (!D._input.disabled && !D.config.inline) {
                        var a = D.isOpen;
                        D.isOpen = !0, a || (D.calendarContainer.classList.add("open"), D._input.classList.add("active"), ge("onOpen"), le(t)), !0 === D.config.enableTime && !0 === D.config.noCalendar && (!1 !== D.config.allowInput || void 0 !== e && D.timeContainer.contains(e.relatedTarget) || setTimeout((function() {
                            return D.hourElement.select()
                        }), 50))
                    }
                }, D.redraw = ce, D.set = function(e, t) {
                    if (null !== e && "object" == typeof e)
                        for (var a in Object.assign(D.config, e), e) void 0 !== ue[a] && ue[a].forEach((function(e) {
                            return e()
                        }));
                    else D.config[e] = t, void 0 !== ue[e] ? ue[e].forEach((function(e) {
                        return e()
                    })) : n.indexOf(e) > -1 && (D.config[e] = c(t));
                    D.redraw(), be(!0)
                }, D.setDate = function(e, t, n) {
                    if (void 0 === t && (t = !1), void 0 === n && (n = D.config.dateFormat), 0 !== e && !e || e instanceof Array && 0 === e.length) return D.clear(t);
                    fe(e, n), D.latestSelectedDateObj = D.selectedDates[D.selectedDates.length - 1], D.redraw(), A(void 0, t), _(), 0 === D.selectedDates.length && D.clear(!1), be(t), t && ge("onChange")
                }, D.toggle = function(e) {
                    if (!0 === D.isOpen) return D.close();
                    D.open(e)
                };
                var ue = {
                    locale: [re, $],
                    showMonths: [U, E, q],
                    minDate: [A],
                    maxDate: [A],
                    clickOpens: [function() {
                        !0 === D.config.clickOpens ? (F(D._input, "focus", D.open), F(D._input, "click", D.open)) : (D._input.removeEventListener("focus", D.open), D._input.removeEventListener("click", D.open))
                    }]
                };

                function fe(e, t) {
                    var n = [];
                    if (e instanceof Array) n = e.map((function(e) {
                        return D.parseDate(e, t)
                    }));
                    else if (e instanceof Date || "number" == typeof e) n = [D.parseDate(e, t)];
                    else if ("string" == typeof e) switch (D.config.mode) {
                        case "single":
                        case "time":
                            n = [D.parseDate(e, t)];
                            break;
                        case "multiple":
                            n = e.split(D.config.conjunction).map((function(e) {
                                return D.parseDate(e, t)
                            }));
                            break;
                        case "range":
                            n = e.split(D.l10n.rangeSeparator).map((function(e) {
                                return D.parseDate(e, t)
                            }))
                    } else D.config.errorHandler(new Error("Invalid date supplied: " + JSON.stringify(e)));
                    D.selectedDates = D.config.allowInvalidPreload ? n : n.filter((function(e) {
                        return e instanceof Date && Q(e, !1)
                    })), "range" === D.config.mode && D.selectedDates.sort((function(e, t) {
                        return e.getTime() - t.getTime()
                    }))
                }

                function me(e) {
                    return e.slice().map((function(e) {
                        return "string" == typeof e || "number" == typeof e || e instanceof Date ? D.parseDate(e, void 0, !0) : e && "object" == typeof e && e.from && e.to ? {
                            from: D.parseDate(e.from, void 0),
                            to: D.parseDate(e.to, void 0)
                        } : e
                    })).filter((function(e) {
                        return e
                    }))
                }

                function ge(e, t) {
                    if (void 0 !== D.config) {
                        var n = D.config[e];
                        if (void 0 !== n && n.length > 0)
                            for (var a = 0; n[a] && a < n.length; a++) n[a](D.selectedDates, D.input.value, D, t);
                        "onChange" === e && (D.input.dispatchEvent(pe("change")), D.input.dispatchEvent(pe("input")))
                    }
                }

                function pe(e) {
                    var t = document.createEvent("Event");
                    return t.initEvent(e, !0, !0), t
                }

                function he(e) {
                    for (var t = 0; t < D.selectedDates.length; t++)
                        if (0 === y(D.selectedDates[t], e)) return "" + t;
                    return !1
                }

                function ve() {
                    D.config.noCalendar || D.isMobile || !D.monthNav || (D.yearElements.forEach((function(e, t) {
                        var n = new Date(D.currentYear, D.currentMonth, 1);
                        n.setMonth(D.currentMonth + t), D.config.showMonths > 1 || "static" === D.config.monthSelectorType ? D.monthElements[t].textContent = p(n.getMonth(), D.config.shorthandCurrentMonth, D.l10n) + " " : D.monthsDropdownContainer.value = n.getMonth().toString(), e.value = n.getFullYear().toString()
                    })), D._hidePrevMonthArrow = void 0 !== D.config.minDate && (D.currentYear === D.config.minDate.getFullYear() ? D.currentMonth <= D.config.minDate.getMonth() : D.currentYear < D.config.minDate.getFullYear()), D._hideNextMonthArrow = void 0 !== D.config.maxDate && (D.currentYear === D.config.maxDate.getFullYear() ? D.currentMonth + 1 > D.config.maxDate.getMonth() : D.currentYear > D.config.maxDate.getFullYear()))
                }

                function De(e) {
                    return D.selectedDates.map((function(t) {
                        return D.formatDate(t, e)
                    })).filter((function(e, t, n) {
                        return "range" !== D.config.mode || D.config.enableTime || n.indexOf(e) === t
                    })).join("range" !== D.config.mode ? D.config.conjunction : D.l10n.rangeSeparator)
                }

                function be(e) {
                    void 0 === e && (e = !0), void 0 !== D.mobileInput && D.mobileFormatStr && (D.mobileInput.value = void 0 !== D.latestSelectedDateObj ? D.formatDate(D.latestSelectedDateObj, D.mobileFormatStr) : ""), D.input.value = De(D.config.dateFormat), void 0 !== D.altInput && (D.altInput.value = De(D.config.altFormat)), !1 !== e && ge("onValueUpdate")
                }

                function we(e) {
                    var t = m(e),
                        n = D.prevMonthNav.contains(t),
                        a = D.nextMonthNav.contains(t);
                    n || a ? z(n ? -1 : 1) : D.yearElements.indexOf(t) >= 0 ? t.select() : t.classList.contains("arrowUp") ? D.changeYear(D.currentYear + 1) : t.classList.contains("arrowDown") && D.changeYear(D.currentYear - 1)
                }
                return function() {
                    D.element = D.input = g, D.isOpen = !1,
                        function() {
                            var t = ["wrap", "weekNumbers", "allowInput", "allowInvalidPreload", "clickOpens", "time_24hr", "enableTime", "noCalendar", "altInput", "shorthandCurrentMonth", "inline", "static", "enableSeconds", "disableMobile"],
                                i = e(e({}, JSON.parse(JSON.stringify(g.dataset || {}))), h),
                                o = {};
                            D.config.parseDate = i.parseDate, D.config.formatDate = i.formatDate, Object.defineProperty(D.config, "enable", {
                                get: function() {
                                    return D.config._enable
                                },
                                set: function(e) {
                                    D.config._enable = me(e)
                                }
                            }), Object.defineProperty(D.config, "disable", {
                                get: function() {
                                    return D.config._disable
                                },
                                set: function(e) {
                                    D.config._disable = me(e)
                                }
                            });
                            var r = "time" === i.mode;
                            if (!i.dateFormat && (i.enableTime || r)) {
                                var l = k.defaultConfig.dateFormat || a.dateFormat;
                                o.dateFormat = i.noCalendar || r ? "H:i" + (i.enableSeconds ? ":S" : "") : l + " H:i" + (i.enableSeconds ? ":S" : "")
                            }
                            if (i.altInput && (i.enableTime || r) && !i.altFormat) {
                                var s = k.defaultConfig.altFormat || a.altFormat;
                                o.altFormat = i.noCalendar || r ? "h:i" + (i.enableSeconds ? ":S K" : " K") : s + " h:i" + (i.enableSeconds ? ":S" : "") + " K"
                            }
                            Object.defineProperty(D.config, "minDate", {
                                get: function() {
                                    return D.config._minDate
                                },
                                set: ie("min")
                            }), Object.defineProperty(D.config, "maxDate", {
                                get: function() {
                                    return D.config._maxDate
                                },
                                set: ie("max")
                            });
                            var d = function(e) {
                                return function(t) {
                                    D.config["min" === e ? "_minTime" : "_maxTime"] = D.parseDate(t, "H:i:S")
                                }
                            };
                            Object.defineProperty(D.config, "minTime", {
                                get: function() {
                                    return D.config._minTime
                                },
                                set: d("min")
                            }), Object.defineProperty(D.config, "maxTime", {
                                get: function() {
                                    return D.config._maxTime
                                },
                                set: d("max")
                            }), "time" === i.mode && (D.config.noCalendar = !0, D.config.enableTime = !0), Object.assign(D.config, o, i);
                            for (var u = 0; u < t.length; u++) D.config[t[u]] = !0 === D.config[t[u]] || "true" === D.config[t[u]];
                            for (n.filter((function(e) {
                                    return void 0 !== D.config[e]
                                })).forEach((function(e) {
                                    D.config[e] = c(D.config[e] || []).map(x)
                                })), D.isMobile = !D.config.disableMobile && !D.config.inline && "single" === D.config.mode && !D.config.disable.length && !D.config.enable && !D.config.weekNumbers && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent), u = 0; u < D.config.plugins.length; u++) {
                                var f = D.config.plugins[u](D) || {};
                                for (var m in f) n.indexOf(m) > -1 ? D.config[m] = c(f[m]).map(x).concat(D.config[m]) : void 0 === i[m] && (D.config[m] = f[m])
                            }
                            i.altInputClass || (D.config.altInputClass = oe().className + " " + D.config.altInputClass), ge("onParseConfig")
                        }(), re(), D.input = oe(), D.input ? (D.input._type = D.input.type, D.input.type = "text", D.input.classList.add("flatpickr-input"), D._input = D.input, D.config.altInput && (D.altInput = d(D.input.nodeName, D.config.altInputClass), D._input = D.altInput, D.altInput.placeholder = D.input.placeholder, D.altInput.disabled = D.input.disabled, D.altInput.required = D.input.required, D.altInput.tabIndex = D.input.tabIndex, D.altInput.type = "text", D.input.setAttribute("type", "hidden"), !D.config.static && D.input.parentNode && D.input.parentNode.insertBefore(D.altInput, D.input.nextSibling)), D.config.allowInput || D._input.setAttribute("readonly", "readonly"), D._positionElement = D.config.positionElement || D._input) : D.config.errorHandler(new Error("Invalid input element specified")),
                        function() {
                            D.selectedDates = [], D.now = D.parseDate(D.config.now) || new Date;
                            var e = D.config.defaultDate || ("INPUT" !== D.input.nodeName && "TEXTAREA" !== D.input.nodeName || !D.input.placeholder || D.input.value !== D.input.placeholder ? D.input.value : null);
                            e && fe(e, D.config.dateFormat), D._initialDate = D.selectedDates.length > 0 ? D.selectedDates[0] : D.config.minDate && D.config.minDate.getTime() > D.now.getTime() ? D.config.minDate : D.config.maxDate && D.config.maxDate.getTime() < D.now.getTime() ? D.config.maxDate : D.now, D.currentYear = D._initialDate.getFullYear(), D.currentMonth = D._initialDate.getMonth(), D.selectedDates.length > 0 && (D.latestSelectedDateObj = D.selectedDates[0]), void 0 !== D.config.minTime && (D.config.minTime = D.parseDate(D.config.minTime, "H:i")), void 0 !== D.config.maxTime && (D.config.maxTime = D.parseDate(D.config.maxTime, "H:i")), D.minDateHasTime = !!D.config.minDate && (D.config.minDate.getHours() > 0 || D.config.minDate.getMinutes() > 0 || D.config.minDate.getSeconds() > 0), D.maxDateHasTime = !!D.config.maxDate && (D.config.maxDate.getHours() > 0 || D.config.maxDate.getMinutes() > 0 || D.config.maxDate.getSeconds() > 0)
                        }(), D.utils = {
                            getDaysInMonth: function(e, t) {
                                return void 0 === e && (e = D.currentMonth), void 0 === t && (t = D.currentYear), 1 === e && (t % 4 == 0 && t % 100 != 0 || t % 400 == 0) ? 29 : D.l10n.daysInMonth[e]
                            }
                        }, D.isMobile || function() {
                            var e = window.document.createDocumentFragment();
                            if (D.calendarContainer = d("div", "flatpickr-calendar"), D.calendarContainer.tabIndex = -1, !D.config.noCalendar) {
                                if (e.appendChild((D.monthNav = d("div", "flatpickr-months"), D.yearElements = [], D.monthElements = [], D.prevMonthNav = d("span", "flatpickr-prev-month"), D.prevMonthNav.innerHTML = D.config.prevArrow, D.nextMonthNav = d("span", "flatpickr-next-month"), D.nextMonthNav.innerHTML = D.config.nextArrow, U(), Object.defineProperty(D, "_hidePrevMonthArrow", {
                                        get: function() {
                                            return D.__hidePrevMonthArrow
                                        },
                                        set: function(e) {
                                            D.__hidePrevMonthArrow !== e && (s(D.prevMonthNav, "flatpickr-disabled", e), D.__hidePrevMonthArrow = e)
                                        }
                                    }), Object.defineProperty(D, "_hideNextMonthArrow", {
                                        get: function() {
                                            return D.__hideNextMonthArrow
                                        },
                                        set: function(e) {
                                            D.__hideNextMonthArrow !== e && (s(D.nextMonthNav, "flatpickr-disabled", e), D.__hideNextMonthArrow = e)
                                        }
                                    }), D.currentYearElement = D.yearElements[0], ve(), D.monthNav)), D.innerContainer = d("div", "flatpickr-innerContainer"), D.config.weekNumbers) {
                                    var t = function() {
                                            D.calendarContainer.classList.add("hasWeeks");
                                            var e = d("div", "flatpickr-weekwrapper");
                                            e.appendChild(d("span", "flatpickr-weekday", D.l10n.weekAbbreviation));
                                            var t = d("div", "flatpickr-weeks");
                                            return e.appendChild(t), {
                                                weekWrapper: e,
                                                weekNumbers: t
                                            }
                                        }(),
                                        n = t.weekWrapper,
                                        a = t.weekNumbers;
                                    D.innerContainer.appendChild(n), D.weekNumbers = a, D.weekWrapper = n
                                }
                                D.rContainer = d("div", "flatpickr-rContainer"), D.rContainer.appendChild(q()), D.daysContainer || (D.daysContainer = d("div", "flatpickr-days"), D.daysContainer.tabIndex = -1), B(), D.rContainer.appendChild(D.daysContainer), D.innerContainer.appendChild(D.rContainer), e.appendChild(D.innerContainer)
                            }
                            D.config.enableTime && e.appendChild(function() {
                                D.calendarContainer.classList.add("hasTime"), D.config.noCalendar && D.calendarContainer.classList.add("noCalendar");
                                var e = M(D.config);
                                D.timeContainer = d("div", "flatpickr-time"), D.timeContainer.tabIndex = -1;
                                var t = d("span", "flatpickr-time-separator", ":"),
                                    n = f("flatpickr-hour", {
                                        "aria-label": D.l10n.hourAriaLabel
                                    });
                                D.hourElement = n.getElementsByTagName("input")[0];
                                var a = f("flatpickr-minute", {
                                    "aria-label": D.l10n.minuteAriaLabel
                                });
                                if (D.minuteElement = a.getElementsByTagName("input")[0], D.hourElement.tabIndex = D.minuteElement.tabIndex = -1, D.hourElement.value = o(D.latestSelectedDateObj ? D.latestSelectedDateObj.getHours() : D.config.time_24hr ? e.hours : function(e) {
                                        switch (e % 24) {
                                            case 0:
                                            case 12:
                                                return 12;
                                            default:
                                                return e % 12
                                        }
                                    }(e.hours)), D.minuteElement.value = o(D.latestSelectedDateObj ? D.latestSelectedDateObj.getMinutes() : e.minutes), D.hourElement.setAttribute("step", D.config.hourIncrement.toString()), D.minuteElement.setAttribute("step", D.config.minuteIncrement.toString()), D.hourElement.setAttribute("min", D.config.time_24hr ? "0" : "1"), D.hourElement.setAttribute("max", D.config.time_24hr ? "23" : "12"), D.hourElement.setAttribute("maxlength", "2"), D.minuteElement.setAttribute("min", "0"), D.minuteElement.setAttribute("max", "59"), D.minuteElement.setAttribute("maxlength", "2"), D.timeContainer.appendChild(n), D.timeContainer.appendChild(t), D.timeContainer.appendChild(a), D.config.time_24hr && D.timeContainer.classList.add("time24hr"), D.config.enableSeconds) {
                                    D.timeContainer.classList.add("hasSeconds");
                                    var i = f("flatpickr-second");
                                    D.secondElement = i.getElementsByTagName("input")[0], D.secondElement.value = o(D.latestSelectedDateObj ? D.latestSelectedDateObj.getSeconds() : e.seconds), D.secondElement.setAttribute("step", D.minuteElement.getAttribute("step")), D.secondElement.setAttribute("min", "0"), D.secondElement.setAttribute("max", "59"), D.secondElement.setAttribute("maxlength", "2"), D.timeContainer.appendChild(d("span", "flatpickr-time-separator", ":")), D.timeContainer.appendChild(i)
                                }
                                return D.config.time_24hr || (D.amPM = d("span", "flatpickr-am-pm", D.l10n.amPM[r((D.latestSelectedDateObj ? D.hourElement.value : D.config.defaultHour) > 11)]), D.amPM.title = D.l10n.toggleTitle, D.amPM.tabIndex = -1, D.timeContainer.appendChild(D.amPM)), D.timeContainer
                            }()), s(D.calendarContainer, "rangeMode", "range" === D.config.mode), s(D.calendarContainer, "animate", !0 === D.config.animate), s(D.calendarContainer, "multiMonth", D.config.showMonths > 1), D.calendarContainer.appendChild(e);
                            var i = void 0 !== D.config.appendTo && void 0 !== D.config.appendTo.nodeType;
                            if ((D.config.inline || D.config.static) && (D.calendarContainer.classList.add(D.config.inline ? "inline" : "static"), D.config.inline && (!i && D.element.parentNode ? D.element.parentNode.insertBefore(D.calendarContainer, D._input.nextSibling) : void 0 !== D.config.appendTo && D.config.appendTo.appendChild(D.calendarContainer)), D.config.static)) {
                                var l = d("div", "flatpickr-wrapper");
                                D.element.parentNode && D.element.parentNode.insertBefore(l, D.element), l.appendChild(D.element), D.altInput && l.appendChild(D.altInput), l.appendChild(D.calendarContainer)
                            }
                            D.config.static || D.config.inline || (void 0 !== D.config.appendTo ? D.config.appendTo : window.document.body).appendChild(D.calendarContainer)
                        }(),
                        function() {
                            if (D.config.wrap && ["open", "close", "toggle", "clear"].forEach((function(e) {
                                    Array.prototype.forEach.call(D.element.querySelectorAll("[data-" + e + "]"), (function(t) {
                                        return F(t, "click", D[e])
                                    }))
                                })), D.isMobile) ! function() {
                                var e = D.config.enableTime ? D.config.noCalendar ? "time" : "datetime-local" : "date";
                                D.mobileInput = d("input", D.input.className + " flatpickr-mobile"), D.mobileInput.tabIndex = 1, D.mobileInput.type = e, D.mobileInput.disabled = D.input.disabled, D.mobileInput.required = D.input.required, D.mobileInput.placeholder = D.input.placeholder, D.mobileFormatStr = "datetime-local" === e ? "Y-m-d\\TH:i:S" : "date" === e ? "Y-m-d" : "H:i:S", D.selectedDates.length > 0 && (D.mobileInput.defaultValue = D.mobileInput.value = D.formatDate(D.selectedDates[0], D.mobileFormatStr)), D.config.minDate && (D.mobileInput.min = D.formatDate(D.config.minDate, "Y-m-d")), D.config.maxDate && (D.mobileInput.max = D.formatDate(D.config.maxDate, "Y-m-d")), D.input.getAttribute("step") && (D.mobileInput.step = String(D.input.getAttribute("step"))), D.input.type = "hidden", void 0 !== D.altInput && (D.altInput.type = "hidden");
                                try {
                                    D.input.parentNode && D.input.parentNode.insertBefore(D.mobileInput, D.input.nextSibling)
                                } catch (e) {}
                                F(D.mobileInput, "change", (function(e) {
                                    D.setDate(m(e).value, !1, D.mobileFormatStr), ge("onChange"), ge("onClose")
                                }))
                            }();
                            else {
                                var e = l(ae, 50);
                                D._debouncedChange = l(P, 300), D.daysContainer && !/iPhone|iPad|iPod/i.test(navigator.userAgent) && F(D.daysContainer, "mouseover", (function(e) {
                                    "range" === D.config.mode && ne(m(e))
                                })), F(window.document.body, "keydown", te), D.config.inline || D.config.static || F(window, "resize", e), void 0 !== window.ontouchstart ? F(window.document, "touchstart", V) : F(window.document, "mousedown", V), F(window.document, "focus", V, {
                                    capture: !0
                                }), !0 === D.config.clickOpens && (F(D._input, "focus", D.open), F(D._input, "click", D.open)), void 0 !== D.daysContainer && (F(D.monthNav, "click", we), F(D.monthNav, ["keyup", "increment"], O), F(D.daysContainer, "click", de)), void 0 !== D.timeContainer && void 0 !== D.minuteElement && void 0 !== D.hourElement && (F(D.timeContainer, ["increment"], T), F(D.timeContainer, "blur", T, {
                                    capture: !0
                                }), F(D.timeContainer, "click", N), F([D.hourElement, D.minuteElement], ["focus", "click"], (function(e) {
                                    return m(e).select()
                                })), void 0 !== D.secondElement && F(D.secondElement, "focus", (function() {
                                    return D.secondElement && D.secondElement.select()
                                })), void 0 !== D.amPM && F(D.amPM, "click", (function(e) {
                                    T(e), P()
                                }))), D.config.allowInput && F(D._input, "blur", ee)
                            }
                        }(), (D.selectedDates.length || D.config.noCalendar) && (D.config.enableTime && _(D.config.noCalendar ? D.latestSelectedDateObj : void 0), be(!1)), E();
                    var t = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
                    !D.isMobile && t && le(), ge("onReady")
                }(), D
            }

            function E(e, t) {
                for (var n = Array.prototype.slice.call(e).filter((function(e) {
                        return e instanceof HTMLElement
                    })), a = [], i = 0; i < n.length; i++) {
                    var o = n[i];
                    try {
                        if (null !== o.getAttribute("data-fp-omit")) continue;
                        void 0 !== o._flatpickr && (o._flatpickr.destroy(), o._flatpickr = void 0), o._flatpickr = x(o, t || {}), a.push(o._flatpickr)
                    } catch (e) {
                        console.error(e)
                    }
                }
                return 1 === a.length ? a[0] : a
            }
            "function" != typeof Object.assign && (Object.assign = function(e) {
                for (var t = [], n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
                if (!e) throw TypeError("Cannot convert undefined or null to object");
                for (var a = function(t) {
                        t && Object.keys(t).forEach((function(n) {
                            return e[n] = t[n]
                        }))
                    }, i = 0, o = t; i < o.length; i++) {
                    var r = o[i];
                    a(r)
                }
                return e
            }), "undefined" != typeof HTMLElement && "undefined" != typeof HTMLCollection && "undefined" != typeof NodeList && (HTMLCollection.prototype.flatpickr = NodeList.prototype.flatpickr = function(e) {
                return E(this, e)
            }, HTMLElement.prototype.flatpickr = function(e) {
                return E([this], e)
            });
            var k = function(e, t) {
                return "string" == typeof e ? E(window.document.querySelectorAll(e), t) : e instanceof Node ? E([e], t) : E(e, t)
            };
            return k.defaultConfig = {}, k.l10ns = {
                en: e({}, i),
                default: e({}, i)
            }, k.localize = function(t) {
                k.l10ns.default = e(e({}, k.l10ns.default), t)
            }, k.setDefaults = function(t) {
                k.defaultConfig = e(e({}, k.defaultConfig), t)
            }, k.parseDate = w({}), k.formatDate = b({}), k.compareDates = y, "undefined" != typeof jQuery && void 0 !== jQuery.fn && (jQuery.fn.flatpickr = function(e) {
                return E(this, e)
            }), Date.prototype.fp_incr = function(e) {
                return new Date(this.getFullYear(), this.getMonth(), this.getDate() + ("string" == typeof e ? parseInt(e, 10) : e))
            }, "undefined" != typeof window && (window.flatpickr = k), k
        }()
    }
}));