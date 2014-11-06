! function(a, b) {
    "use strict";
    var c = b.module("ngDialog", []),
        d = b.element,
        e = b.isDefined,
        f = (document.body || document.documentElement).style,
        g = e(f.animation) || e(f.WebkitAnimation) || e(f.MozAnimation) || e(f.MsAnimation) || e(f.OAnimation),
        h = "animationend webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend",
        i = !1;
    c.provider("ngDialog", function() {
        var c = this.defaults = {
            className: "ngdialog-theme-default",
            plain: !1,
            showClose: !0,
            closeByDocument: !0,
            closeByEscape: !0,
            closeByNavigation: !1,
            appendTo: !1,
            preCloseCallback: !1,
            overlay: !0,
            cache: !0
        };
        this.setForceBodyReload = function(a) {
            i = a || !1
        }, this.setDefaults = function(a) {
            b.extend(c, a)
        };
        var e, f = 0,
            j = 0,
            k = {};
        this.$get = ["$document", "$templateCache", "$compile", "$q", "$http", "$rootScope", "$timeout", "$window", "$controller", function(l, m, n, o, p, q, r, s, t) {
            var u = l.find("body");
            i && q.$on("$locationChangeSuccess", function() {
                u = l.find("body")
            });
            var v = {
                    onDocumentKeydown: function(a) {
                        27 === a.keyCode && w.close("$escape")
                    },
                    setBodyPadding: function(a) {
                        var b = parseInt(u.css("padding-right") || 0, 10);
                        u.css("padding-right", b + a + "px"), u.data("ng-dialog-original-padding", b)
                    },
                    resetBodyPadding: function() {
                        var a = u.data("ng-dialog-original-padding");
                        a ? u.css("padding-right", a + "px") : u.css("padding-right", "")
                    },
                    performCloseDialog: function(c, d) {
                        var f = c.attr("id");
                        if ("undefined" != typeof a.Hammer) {
                            var i = b.element(c).scope().hammerTime;
                            i.off("tap", e), i.destroy(), delete c.scope().hammerTime
                        } else c.unbind("click");
                        1 === j && u.unbind("keydown"), c.hasClass("ngdialog-closing") || (j -= 1), q.$broadcast("ngDialog.closing", c), g ? c.unbind(h).bind(h, function() {
                            c.scope().$destroy(), c.remove(), 0 === j && (u.removeClass("ngdialog-open"), v.resetBodyPadding()), q.$broadcast("ngDialog.closed", c)
                        }).addClass("ngdialog-closing") : (c.scope().$destroy(), c.remove(), 0 === j && (u.removeClass("ngdialog-open"), v.resetBodyPadding()), q.$broadcast("ngDialog.closed", c)), k[f] && (k[f].resolve({
                            id: f,
                            value: d,
                            $dialog: c,
                            remainingDialogs: j
                        }), delete k[f])
                    },
                    closeDialog: function(a, c) {
                        var d = a.data("$ngDialogPreCloseCallback");
                        if (d && b.isFunction(d)) {
                            var e = d.call(a, c);
                            b.isObject(e) ? e.closePromise ? e.closePromise.then(function() {
                                v.performCloseDialog(a, c)
                            }) : e.then(function() {
                                v.performCloseDialog(a, c)
                            }, function() {}) : e !== !1 && v.performCloseDialog(a, c)
                        } else v.performCloseDialog(a, c)
                    }
                },
                w = {
                    open: function(g) {
                        function h(a, b) {
                            return p.get(a, b || {}).then(function(a) {
                                return a.data || ""
                            })
                        }

                        function i(a) {
                            return a ? b.isString(a) && x.plain ? a : "boolean" != typeof x.cache || x.cache ? m.get(a) || h(a, {
                                cache: !0
                            }) : h(a, {
                                cache: !1
                            }) : "Empty template"
                        }
                        var l = this,
                            x = b.copy(c);
                        g = g || {}, b.extend(x, g), f += 1, l.latestID = "ngdialog" + f;
                        var y;
                        k[l.latestID] = y = o.defer();
                        var z, A, B = b.isObject(x.scope) ? x.scope.$new() : q.$new();
                        return o.when(i(x.template || x.templateUrl)).then(function(c) {
                            if (m.put(x.template || x.templateUrl, c), x.showClose && (c += '<div class="ngdialog-close"></div>'), l.$result = z = d('<div id="ngdialog' + f + '" class="ngdialog"></div>'), z.html(x.overlay ? '<div class="ngdialog-overlay"></div><div class="ngdialog-content">' + c + "</div>" : '<div class="ngdialog-content">' + c + "</div>"), x.data && b.isString(x.data)) {
                                var g = x.data.replace(/^\s*/, "")[0];
                                B.ngDialogData = "{" === g || "[" === g ? b.fromJson(x.data) : x.data
                            } else x.data && b.isObject(x.data) && (B.ngDialogData = b.fromJson(b.toJson(x.data)));
                            if (x.controller && (b.isString(x.controller) || b.isArray(x.controller) || b.isFunction(x.controller))) {
                                var h = t(x.controller, {
                                    $scope: B,
                                    $element: z
                                });
                                z.data("$ngDialogControllerController", h)
                            }
                            if (x.className && z.addClass(x.className), A = x.appendTo && b.isString(x.appendTo) ? b.element(document.querySelector(x.appendTo)) : u, x.preCloseCallback) {
                                var i;
                                b.isFunction(x.preCloseCallback) ? i = x.preCloseCallback : b.isString(x.preCloseCallback) && B && (b.isFunction(B[x.preCloseCallback]) ? i = B[x.preCloseCallback] : B.$parent && b.isFunction(B.$parent[x.preCloseCallback]) ? i = B.$parent[x.preCloseCallback] : q && b.isFunction(q[x.preCloseCallback]) && (i = q[x.preCloseCallback])), i && z.data("$ngDialogPreCloseCallback", i)
                            }
                            if (B.closeThisDialog = function(a) {
                                    v.closeDialog(z, a)
                                }, r(function() {
                                    n(z)(B);
                                    var a = s.innerWidth - u.prop("clientWidth");
                                    u.addClass("ngdialog-open");
                                    var b = a - (s.innerWidth - u.prop("clientWidth"));
                                    b > 0 && v.setBodyPadding(b), A.append(z), x.name ? q.$broadcast("ngDialog.opened", {
                                        dialog: z,
                                        name: x.name
                                    }) : q.$broadcast("ngDialog.opened", z)
                                }), x.closeByEscape && u.bind("keydown", v.onDocumentKeydown), x.closeByNavigation && q.$on("$locationChangeSuccess", function() {
                                    v.closeDialog(z)
                                }), e = function(a) {
                                    var b = x.closeByDocument ? d(a.target).hasClass("ngdialog-overlay") : !1,
                                        c = d(a.target).hasClass("ngdialog-close");
                                    (b || c) && w.close(z.attr("id"), c ? "$closeButton" : "$document")
                                }, "undefined" != typeof a.Hammer) {
                                var k = B.hammerTime = a.Hammer(z[0]);
                                k.on("tap", e)
                            } else z.bind("click", e);
                            return j += 1, w
                        }), {
                            id: "ngdialog" + f,
                            closePromise: y.promise,
                            close: function(a) {
                                v.closeDialog(z, a)
                            }
                        }
                    },
                    openConfirm: function(a) {
                        var c = o.defer(),
                            e = {
                                closeByEscape: !1,
                                closeByDocument: !1
                            };
                        b.extend(e, a), e.scope = b.isObject(e.scope) ? e.scope.$new() : q.$new(), e.scope.confirm = function(a) {
                            c.resolve(a);
                            var b = d(document.getElementById(f.id));
                            v.performCloseDialog(b, a)
                        };
                        var f = w.open(e);
                        return f.closePromise.then(function(a) {
                            return a ? c.reject(a.value) : c.reject()
                        }), c.promise
                    },
                    close: function(a, b) {
                        var c = d(document.getElementById(a));
                        return c.length ? v.closeDialog(c, b) : w.closeAll(b), w
                    },
                    closeAll: function(a) {
                        var c = document.querySelectorAll(".ngdialog");
                        b.forEach(c, function(b) {
                            v.closeDialog(d(b), a)
                        })
                    },
                    getDefaults: function() {
                        return c
                    }
                };
            return w
        }]
    }), c.directive("ngDialog", ["ngDialog", function(a) {
        return {
            restrict: "A",
            scope: {
                ngDialogScope: "="
            },
            link: function(c, d, e) {
                d.on("click", function(d) {
                    d.preventDefault();
                    var f = b.isDefined(c.ngDialogScope) ? c.ngDialogScope : "noScope";
                    b.isDefined(e.ngDialogClosePrevious) && a.close(e.ngDialogClosePrevious);
                    var g = a.getDefaults();
                    a.open({
                        template: e.ngDialog,
                        className: e.ngDialogClass || g.className,
                        controller: e.ngDialogController,
                        scope: f,
                        data: e.ngDialogData,
                        showClose: "false" === e.ngDialogShowClose ? !1 : "true" === e.ngDialogShowClose ? !0 : g.showClose,
                        closeByDocument: "false" === e.ngDialogCloseByDocument ? !1 : "true" === e.ngDialogCloseByDocument ? !0 : g.closeByDocument,
                        closeByEscape: "false" === e.ngDialogCloseByEscape ? !1 : "true" === e.ngDialogCloseByEscape ? !0 : g.closeByEscape,
                        preCloseCallback: e.ngDialogPreCloseCallback || g.preCloseCallback
                    })
                })
            }
        }
    }])
}(window, window.angular);