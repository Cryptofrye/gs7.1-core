function platform() {
    var U = '',
        V = 0,
        W = 'platform',
        X = 'startup',
        Y = 'bootstrap',
        Z = 'begin',
        $ = 'gwt.codesvr=',
        _ = 'gwt.hosted=',
        ab = 'gwt.hybrid',
        bb = 'moduleStartup',
        cb = 'end',
        db = '#',
        eb = '?',
        fb = '/',
        gb = 1,
        hb = 'img',
        ib = 'clear.cache.gif',
        jb = 'baseUrl',
        kb = 'script',
        lb = 'platform.nocache.js',
        mb = 'undefined',
        nb = '__gwt_marker_platform',
        ob = '<script id="',
        pb = '"><\/script>',
        qb = 'SCRIPT',
        rb = 'base',
        sb = '//',
        tb = 'meta',
        ub = 'name',
        vb = 'platform::',
        wb = '::',
        xb = 'gwt:property',
        yb = 'content',
        zb = '=',
        Ab = 'gwt:onPropertyErrorFn',
        Bb = 'Bad handler "',
        Cb = '" for "gwt:onPropertyErrorFn"',
        Db = 'gwt:onLoadErrorFn',
        Eb = '" for "gwt:onLoadErrorFn"',
        Fb = 'iframe',
        Gb = "javascript:''",
        Hb = 'position:absolute;width:0;height:0;border:none',
        Ib = 'moduleRequested',
        Jb = 'user.agent',
        Kb = 'webkit',
        Lb = 'safari',
        Mb = 'msie',
        Nb = 10,
        Ob = 11,
        Pb = 'ie10',
        Qb = 9,
        Rb = 'ie9',
        Sb = 8,
        Tb = 'ie8',
        Ub = 'gecko',
        Vb = 'gecko1_8',
        Wb = 2,
        Xb = 3,
        Yb = 4,
        Zb = 'loadExternalRefs',
        $b = 'hosted.html?platform',
        _b = 'selectingPermutation',
                ac = '03DC7C3960D0EC56CB6AD8CF63C38AE4',
        bc = '03DC7C3960D0EC56CB6AD8CF63C38AE4',
        cc = '03DC7C3960D0EC56CB6AD8CF63C38AE4',
        dc = '03DC7C3960D0EC56CB6AD8CF63C38AE4',
        ec = ':',
        fc = '.cache.html',
        gc = 'DOMContentLoaded',
        hc = 50,
        ic = '<script defer="defer">platform.onInjectionDone(\'platform\')<\/script>';
    var m = window,
        n = document,
        o = m.__gwtStatsEvent ? function (a) {
            return m.__gwtStatsEvent(a)
        } : null,
        p = m.__gwtStatsSessionId ? m.__gwtStatsSessionId : null,
        q, r, s, t = U,
        u = {},
        v = [],
        w = [],
        A = [],
        B = V,
        C, D;
    o && o({
        moduleName: W,
        sessionId: p,
        subSystem: X,
        evtGroup: Y,
        millis: (new Date).getTime(),
        type: Z
    });
    if (!m.__gwt_stylesLoaded) {
        m.__gwt_stylesLoaded = {}
    }
    if (!m.__gwt_scriptsLoaded) {
        m.__gwt_scriptsLoaded = {}
    }

    function F() {
        var b = false;
        try {
            var c = m.location.search;
            return (c.indexOf($) != -1 || (c.indexOf(_) != -1 || m.external && m.external.gwtOnLoad)) && c.indexOf(ab) == -1
        } catch (a) {}
        F = function () {
            return b
        };
        return b
    }

    function G() {
		
		console.log(q , r);
		
        if (q && r) {
            var b = n.getElementById(W);
            var c = b.contentWindow;
            c.__gwt_isKnownPropertyValue = J;
            c.__gwt_getMetaProperty = K;
            if (F()) {
                c.__gwt_getProperty = function (a) {
                    return M(a)
                }
            }
            platform = null;
            c.gwtOnLoad(C, W, t, B);
            o && o({
                moduleName: W,
                sessionId: p,
                subSystem: X,
                evtGroup: bb,
                millis: (new Date).getTime(),
                type: cb
            })
        }
    }

    function H() {
        function e(a) {
            var b = a.lastIndexOf(db);
            if (b == -1) {
                b = a.length
            }
            var c = a.indexOf(eb);
            if (c == -1) {
                c = a.length
            }
            var d = a.lastIndexOf(fb, Math.min(c, b));
            return d >= V ? a.substring(V, d + gb) : U
        }

        function f(a) {
            if (a.match(/^\w+:\/\//)) {} else {
                var b = n.createElement(hb);
                b.src = a + ib;
                a = e(b.src)
            }
            return a
        }

        function g() {
            var a = K(jb);
            if (a != null) {
                return a
            }
            return U
        }

        function h() {
            var a = n.getElementsByTagName(kb);
            for (var b = V; b < a.length; ++b) {
                if (a[b].src.indexOf(lb) != -1) {
                    return e(a[b].src)
                }
            }
            return U
        }

        function i() {
            var a;
            if (typeof isBodyLoaded == mb || !isBodyLoaded()) {
                var b = nb;
                var c;
                n.write(ob + b + pb);
                c = n.getElementById(b);
                a = c && c.previousSibling;
                while (a && a.tagName != qb) {
                    a = a.previousSibling
                }
                if (c) {
                    c.parentNode.removeChild(c)
                }
                if (a && a.src) {
                    return e(a.src)
                }
            }
            return U
        }

        function j() {
            var a = n.getElementsByTagName(rb);
            if (a.length > V) {
                return a[a.length - gb].href
            }
            return U
        }

        function k() {
            var a = n.location;
            console.log(n.location);
            return a.href == a.protocol + sb + a.host + a.pathname + a.search + a.hash
        }
        var l = g();
        if (l == U) {
            l = h()
        }
        if (l == U) {
            l = i()
        }
        if (l == U) {
            l = j()
        }
        if (l == U && k()) {
            l = e(n.location.href)
        }
        l = f(l);
        t = l;
        return l
    }

    function I() {
        var b = document.getElementsByTagName(tb);
        for (var c = V, d = b.length; c < d; ++c) {
            var e = b[c],
                f = e.getAttribute(ub),
                g;
            if (f) {
                f = f.replace(vb, U);
                if (f.indexOf(wb) >= V) {
                    continue
                }
                if (f == xb) {
                    g = e.getAttribute(yb);
                    if (g) {
                        var h, i = g.indexOf(zb);
                        if (i >= V) {
                            f = g.substring(V, i);
                            h = g.substring(i + gb)
                        } else {
                            f = g;
                            h = U
                        }
                        u[f] = h
                    }
                } else if (f == Ab) {
                    g = e.getAttribute(yb);
                    if (g) {
                        try {
                            D = eval(g)
                        } catch (a) {
                            alert(Bb + g + Cb)
                        }
                    }
                } else if (f == Db) {
                    g = e.getAttribute(yb);
                    if (g) {
                        try {
                            C = eval(g)
                        } catch (a) {
                            alert(Bb + g + Eb)
                        }
                    }
                }
            }
        }
    }

    function J(a, b) {
        return b in v[a]
    }

    function K(a) {
        var b = u[a];
        return b == null ? null : b
    }

    function L(a, b) {
        var c = A;
        for (var d = V, e = a.length - gb; d < e; ++d) {
            c = c[a[d]] || (c[a[d]] = [])
        }
        c[a[e]] = b
    }

    function M(a) {
        var b = w[a](),
            c = v[a];
        if (b in c) {
            return b
        }
        var d = [];
        for (var e in c) {
            d[c[e]] = e
        }
        if (D) {
            D(a, d, b)
        }
        throw null
    }
    var N;

    function O() {
        if (!N) {
            N = true;
            var a = n.createElement(Fb);
            a.src = Gb;
            a.id = W;
            a.style.cssText = Hb;
            a.tabIndex = -1;
            n.body.appendChild(a);
            o && o({
                moduleName: W,
                sessionId: p,
                subSystem: X,
                evtGroup: bb,
                millis: (new Date).getTime(),
                type: Ib
            });
            a.contentWindow.location.replace(t + Q)
        }
    }
    w[Jb] = function () {
        var a = navigator.userAgent.toLowerCase();
        var b = n.documentMode;
        if (function () {
                return a.indexOf(Kb) != -1
            }()) return Lb;
        if (function () {
                return a.indexOf(Mb) != -1 && (b >= Nb && b < Ob)
            }()) return Pb;
        if (function () {
                return a.indexOf(Mb) != -1 && (b >= Qb && b < Ob)
            }()) return Rb;
        if (function () {
                return a.indexOf(Mb) != -1 && (b >= Sb && b < Ob)
            }()) return Tb;
        if (function () {
                return a.indexOf(Ub) != -1 || b >= Ob
            }()) return Vb;
        return U
    };
    v[Jb] = {
        gecko1_8: V,
        ie10: gb,
        ie8: Wb,
        ie9: Xb,
        safari: Yb
    };
    platform.onScriptLoad = function () {
        if (N) {
            r = true;
            G()
        }
    };
    platform.onInjectionDone = function () {
        q = true;
        o && o({
            moduleName: W,
            sessionId: p,
            subSystem: X,
            evtGroup: Zb,
            millis: (new Date).getTime(),
            type: cb
        });
        G()
    };
    I();
    H();
    var P;
    var Q;
    if (F()) {
        if (m.external && (m.external.initModule && m.external.initModule(W))) {
            m.location.reload();
            return
        }
        Q = $b;
        P = U
    }
    o && o({
        moduleName: W,
        sessionId: p,
        subSystem: X,
        evtGroup: Y,
        millis: (new Date).getTime(),
        type: _b
    });
    if (!F()) {
        try {
            L([Lb], ac);
            L([Vb], bc);
            L([Rb], cc);
            L([Pb], dc);
            P = A[M(Jb)];
            var R = P.indexOf(ec);
            if (R != -1) {
                B = Number(P.substring(R + gb));
                P = P.substring(V, R)
            }
            Q = P + fc
        } catch (a) {
            return
        }
    }
    var S;

    function T() {
        if (!s) {
            s = true;
            G();
            if (n.removeEventListener) {
                n.removeEventListener(gc, T, false)
            }
            if (S) {
                clearInterval(S)
            }
        }
    }
    if (n.addEventListener) {
        n.addEventListener(gc, function () {
            O();
            T()
        }, false)
    }
    var S = setInterval(function () {
        if (/loaded|complete/.test(n.readyState)) {
            O();
            T()
        }
    }, hc);
    o && o({
        moduleName: W,
        sessionId: p,
        subSystem: X,
        evtGroup: Y,
        millis: (new Date).getTime(),
        type: cb
    });
    o && o({
        moduleName: W,
        sessionId: p,
        subSystem: X,
        evtGroup: Zb,
        millis: (new Date).getTime(),
        type: Z
    });
    n.write(ic)
}
platform();
