/**
 * Materialize Stepper - A little plugin that implements a stepper to Materializecss framework.
 * @version v3.0.0-beta.1
 * @author Igor Marcossi (Kinark) <igormarcossi@gmail.com>.
 * @link https://github.com/Kinark/Materialize-stepper
 * 
 * Licensed under the MIT License (https://github.com/Kinark/Materialize-stepper/blob/master/LICENSE).
 */

"use strict";

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _defineProperties(e, t) {
    for (var n = 0; n < t.length; n++) {
        var i = t[n];
        i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
    }
}

function _createClass(e, t, n) {
    return t && _defineProperties(e.prototype, t), n && _defineProperties(e, n), e
}

function _defineProperty(e, t, n) {
    return t in e ? Object.defineProperty(e, t, {
        value: n,
        enumerable: !0,
        configurable: !0,
        writable: !0
    }) : e[t] = n, e
}
var MStepper = function () {
    function f(e) {
        var P = this,
            t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {};
        _classCallCheck(this, f), _defineProperty(this, "_init", function () {
            var e = P._formWrapperManager,
                t = P.getSteps,
                n = P.options,
                i = P.stepper,
                s = P.classes,
                r = P._nextStepProxy,
                o = P._prevStepProxy,
                a = P._stepTitleClickHandler,
                l = P._openAction,
                p = f.addMultipleEventListeners;
            P.form = e(), l(t().steps[n.firstActive]);
            var c = i.getElementsByClassName(s.NEXTSTEPBTN),
                d = i.getElementsByClassName(s.PREVSTEPBTN),
                v = i.getElementsByClassName(s.STEPTITLE);
            p(c, "click", r, !1), p(d, "click", o, !1), p(v, "click", a)
        }), _defineProperty(this, "_openAction", function (e, t) {
            var n = !(2 < arguments.length && void 0 !== arguments[2]) || arguments[2],
                i = P._slideDown,
                s = P.classes,
                r = P.getSteps,
                o = P._closeAction,
                a = P.stepper,
                l = (P.options, r().active.step);
            if (l && l.isSameNode(e)) return e;
            var p = e.getElementsByClassName(s.STEPCONTENT)[0];
            return e.classList.remove(s.DONESTEP), window.innerWidth < 993 || !a.classList.contains(s.HORIZONTALSTEPPER) ? i(p, s.ACTIVESTEP, e, t) : e.classList.add("active"), l && n && o(l), e
        }), _defineProperty(this, "_closeAction", function (e, n) {
            var t = P._slideUp,
                i = P.classes,
                s = P.stepper,
                r = P._smartListenerUnbind,
                o = P._smartListenerBind,
                a = e.getElementsByClassName(i.STEPCONTENT)[0];
            if (window.innerWidth < 993 || !s.classList.contains(i.HORIZONTALSTEPPER)) t(a, i.ACTIVESTEP, e, n);
            else {
                if (n) {
                    o(a, "transitionend", function e(t) {
                        "left" === t.propertyName && (r(a, "transitionend", e), n())
                    })
                }
                e.classList.remove("active")
            }
            return e
        }), _defineProperty(this, "_nextStepProxy", function (e) {
            return P.nextStep(void 0, void 0, e)
        }), _defineProperty(this, "_prevStepProxy", function (e) {
            return P.prevStep(void 0, e)
        }), _defineProperty(this, "_stepTitleClickHandler", function (e) {
            var t = P.getSteps,
                n = P.classes,
                i = P.nextStep,
                s = P.prevStep,
                r = P.stepper,
                o = P._openAction,
                a = t(),
                l = a.steps,
                p = a.active,
                c = e.target.closest(".".concat(n.STEP));
            if (r.classList.contains(n.LINEAR)) {
                var d = Array.prototype.indexOf.call(l, c);
                d == p.index + 1 ? i() : d == p.index - 1 && s()
            } else o(c)
        }), _defineProperty(this, "nextStep", function (e, t, n) {
            n && n.preventDefault && n.preventDefault();
            var i = P.options,
                s = P.getSteps,
                r = P.activateFeedback,
                o = P.form,
                a = P.wrongStep,
                l = P.classes,
                p = P._openAction,
                c = P.stepper,
                d = P.events,
                v = P.destroyFeedback,
                f = i.showFeedbackPreloader,
                E = i.validationFunction,
                u = s().active,
                h = s().steps[u.index + 1],
                y = n && n.target ? n.target.dataset.feedback : null;
            return y && !t ? (f && !u.step.dataset.nopreloader && r(), void window[y](v, o, u.step.querySelector(".step-content"))) : E && !E(o, u.step.querySelector(".step-content")) ? a() : (u.step.classList.add(l.DONESTEP), p(h, e), c.dispatchEvent(d.STEPCHANGE), void c.dispatchEvent(d.NEXTSTEP))
        }), _defineProperty(this, "prevStep", function (e, t) {
            t && t.preventDefault && t.preventDefault();
            var n = P.getSteps,
                i = P._openAction,
                s = P.stepper,
                r = P.events,
                o = P.destroyFeedback,
                a = n().active,
                l = n().steps[a.index + -1];
            o(), i(l, e), s.dispatchEvent(r.STEPCHANGE), s.dispatchEvent(r.PREVSTEP)
        }), _defineProperty(this, "openStep", function (e, t) {
            var n = P.getSteps,
                i = P._openAction,
                s = P.stepper,
                r = P.events,
                o = P.destroyFeedback,
                a = n().steps[e];
            o(), i(a, t), s.dispatchEvent(r.STEPCHANGE)
        }), _defineProperty(this, "wrongStep", function () {
            var t = P.getSteps,
                n = P.classes,
                e = P.stepper,
                i = P.events;
            t().active.step.classList.add(n.WRONGSTEP);
            var s = t().active.step.querySelectorAll("input, select");
            f.addMultipleEventListeners(s, "input", function e() {
                t().active.step.classList.remove(n.WRONGSTEP), f.removeMultipleEventListeners(s, "input", e)
            }), e.dispatchEvent(i.STEPERROR)
        }), _defineProperty(this, "activateFeedback", function () {
            var e = P.getSteps,
                t = P.classes,
                n = P.options,
                i = P.stepper,
                s = P.events,
                r = e().active.step;
            r.classList.add(t.FEEDBACKINGSTEP), r.getElementsByClassName(t.STEPCONTENT)[0].insertAdjacentHTML("afterBegin", '<div class="'.concat(t.PRELOADERWRAPPER, '">').concat(n.feedbackPreloader, "</div>")), i.dispatchEvent(s.FEEDBACKING)
        }), _defineProperty(this, "destroyFeedback", function (e) {
            var t = P.getSteps,
                n = P.classes,
                i = P.nextStep,
                s = P.stepper,
                r = P.events,
                o = t().active.step;
            if (o && o.classList.contains(n.FEEDBACKINGSTEP)) {
                o.classList.remove(n.FEEDBACKINGSTEP);
                var a = o.getElementsByClassName(n.PRELOADERWRAPPER)[0];
                a.parentNode.removeChild(a), e && i(void 0, !0), s.dispatchEvent(r.FEEDBACKDESTROYED)
            }
        }), _defineProperty(this, "getSteps", function () {
            var e = P.stepper,
                t = P.classes,
                n = e.querySelectorAll("li.".concat(t.STEP)),
                i = e.querySelector("li.".concat(t.ACTIVESTEP));
            return {
                steps: n,
                active: {
                    step: i,
                    index: Array.prototype.indexOf.call(n, i)
                }
            }
        }), _defineProperty(this, "activateStep", function (e, t) {
            var n = P.getSteps,
                i = P._slideDown,
                s = P.stepper,
                r = n().steps[t],
                o = null;
            return "string" == typeof e ? (r.insertAdjacentHTML("beforeBegin", e), o = r.previousSibling, i(o)) : Array.isArray(e) ? (o = [], e.forEach(function (e) {
                r.insertAdjacentHTML("beforeBegin", e), o.push(r.previousSibling), i(r.previousSibling)
            })) : (e instanceof Element || e instanceof HTMLCollection) && (o = s.insertBefore(e, r), e instanceof Element ? i(o) : o.forEach(function (e) {
                return i(e)
            })), o
        }), _defineProperty(this, "deactivateStep", function (t) {
            var n = P._slideUp,
                i = P.stepper,
                s = function (e) {
                    i.contains(t) && n(e, void 0, void 0, function () {
                        return i.removeChild(e)
                    })
                };
            return t instanceof Element ? s(t) : t instanceof HTMLCollection && t.forEach(function (e) {
                return s(e)
            }), t
        }), _defineProperty(this, "_slideDown", function (n, e) {
            var t = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : n,
                i = 3 < arguments.length ? arguments[3] : void 0,
                s = "".concat(f.getUnknownHeight(n), "px"),
                r = function e(t) {
                    "height" === t.propertyName && (P._smartListenerUnbind(n, "transitionend", e), f.removeMultipleProperties(n, "visibility overflow height display"), i && i())
                };
            return requestAnimationFrame(function () {
                n.style.overflow = "hidden", n.style.paddingBottom = "0", n.style.height = "0", n.style.visibility = "unset", n.style.display = "block", requestAnimationFrame(function () {
                    P._smartListenerBind(n, "transitionend", r), n.style.height = s, n.style.removeProperty("padding-bottom"), e && t.classList.add(e)
                })
            }), n
        }), _defineProperty(this, "_slideUp", function (n, e) {
            var t = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : n,
                i = 3 < arguments.length ? arguments[3] : void 0,
                s = "".concat(n.offsetHeight, "px"),
                r = function e(t) {
                    "height" === t.propertyName && (P._smartListenerUnbind(n, "transitionend", e), n.style.display = "none", f.removeMultipleProperties(n, "visibility overflow height padding-bottom"), i && i())
                };
            return requestAnimationFrame(function () {
                n.style.overflow = "hidden", n.style.visibility = "unset", n.style.display = "block", n.style.height = s, requestAnimationFrame(function () {
                    P._smartListenerBind(n, "transitionend", r), n.style.height = "0", n.style.paddingBottom = "0", e && t.classList.remove(e)
                })
            }), n
        }), _defineProperty(this, "_formWrapperManager", function () {
            var e = P.stepper,
                t = P.options,
                n = e.closest("form");
            if (n || !t.autoFormCreation) return n.length ? n : null;
            var i = e.dataset || {},
                s = i.method || "GET",
                r = i.action || "?",
                o = document.createElement("form");
            return o.method = s, o.action = r, e.parentNode.insertBefore(o, e), o.appendChild(e), o
        }), _defineProperty(this, "_smartListenerBind", function (e, t, n) {
            var i = !(3 < arguments.length && void 0 !== arguments[3]) || arguments[3],
                s = 4 < arguments.length && void 0 !== arguments[4] && arguments[4],
                r = P.listenerStore,
                o = {
                    el: e,
                    event: t,
                    fn: n
                };
            if (i)
                for (var a = 0; a < r.length; a++) {
                    var l = r[a];
                    l.event === t && l.el.isSameNode(e) && l.el.removeEventListener(l.event, l.fn), s && l.fn()
                } else {
                    var p = r.indexOf(o);
                    if (-1 !== c) {
                        var c = r[p];
                        c.el.removeEventListener(c.event, c.fn), s && c[p].fn()
                    }
                }
            e.addEventListener(t, n), r.push(o)
        }), _defineProperty(this, "_smartListenerUnbind", function (e, t, n) {
            var i = P.listenerStore,
                s = i.indexOf({
                    el: e,
                    event: t,
                    fn: n
                });
            e.removeEventListener(t, n), i.splice(s, 1)
        }), this.stepper = e, this.options = {
            firstActive: t.firstActive || 0,
            linearStepsNavigation: t.linearStepsNavigation || !0,
            showFeedbackPreloader: t.showFeedbackPreloader || !0,
            autoFormCreation: t.autoFormCreation || !0,
            validationFunction: t.validationFunction || null,
            feedbackPreloader: t.feedbackPreloader || '<div class="preloader-wrapper active"> <div class="spinner-layer spinner-blue-only"> <div class="circle-clipper left"> <div class="circle"></div></div><div class="gap-patch"> <div class="circle"></div></div><div class="circle-clipper right"> <div class="circle"></div></div></div></div>'
        }, this.classes = {
            HORIZONTALSTEPPER: "horizontal",
            LINEAR: "linear",
            NEXTSTEPBTN: "next-step",
            PREVSTEPBTN: "previous-step",
            STEPTITLE: "step-title",
            STEP: "step",
            STEPCONTENT: "step-content",
            PRELOADERWRAPPER: "wait-feedback",
            FEEDBACKINGSTEP: "feedbacking",
            ACTIVESTEP: "active",
            WRONGSTEP: "wrong",
            DONESTEP: "done"
        }, this.events = {
            STEPCHANGE: new Event("stepchange"),
            NEXTSTEP: new Event("nextstep"),
            PREVSTEP: new Event("prevstep"),
            STEPERROR: new Event("steperror"),
            FEEDBACKING: new Event("feedbacking"),
            FEEDBACKDESTROYED: new Event("feedbackdestroyed")
        }, this.listenerStore = [], this.form = null, this._init()
    }
    return _createClass(f, null, [{
        key: "addMultipleEventListeners",
        value: function (e, t, n) {
            for (var i = 3 < arguments.length && void 0 !== arguments[3] && arguments[3], s = 0, r = e.length; s < r; s++) e[s].addEventListener(t, n, i)
        }
    }, {
        key: "removeMultipleEventListeners",
        value: function (e, t, n) {
            for (var i = 3 < arguments.length && void 0 !== arguments[3] && arguments[3], s = 0, r = e.length; s < r; s++) e[s].removeEventListener(t, n, i)
        }
    }, {
        key: "removeMultipleProperties",
        value: function (e, t) {
            for (var n = t.split(" "), i = 0; i < n.length; i++) e.style.removeProperty(n[i])
        }
    }, {
        key: "getUnknownHeight",
        value: function (e) {
            var t = e.cloneNode(!0);
            t.style.position = "fixed", t.style.display = "block", t.style.top = "-999999px", t.style.left = "-999999px", t.style.height = "auto", t.style.opacity = "0", t.style.zIndex = "-999999", t.style.pointerEvents = "none";
            var n = e.parentNode.insertBefore(t, e),
                i = n.offsetHeight;
            return e.parentNode.removeChild(n), i
        }
    }]), f
}();
window.Element && !Element.prototype.closest && (Element.prototype.closest = function (e) {
    var t, n = (this.document || this.ownerDocument).querySelectorAll(e),
        i = this;
    do {
        for (t = n.length; 0 <= --t && n.item(t) !== i;);
    } while (t < 0 && (i = i.parentElement));
    return i
});