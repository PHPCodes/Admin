var REDIPS = REDIPS || {};

REDIPS.drag = function() {
    var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S = null, T = 0, U = 0, V = null, W = null, X = [], Y = null, Z = 0, $ = 0, _ = 0, ab = 0, bb = 0, cb = 0, db, eb = [], fb, gb, hb, ib = [], jb = [], kb = null, lb = null, mb = 0, nb = 0, ob = 0, pb = 0, qb = !1, rb = !1, sb = !1, tb = [], ub, vb = null, wb = null, xb = null, yb = null, zb = null, Ab = null, Bb = null, Cb = null, Db = null, Eb = !1, Fb = !1, Gb = "cell", Hb = {
        div: [],
        cname: "redips-only",
        other: "deny"
    }, Ib = {
        action: "deny",
        cname: "redips-mark",
        exception: []
    }, Jb = {}, Kb = {
        keyDiv: !1,
        keyRow: !1,
        sendBack: !1,
        drop: !1
    };
    c = function() {
        return !1;
    };
    a = function(a) {
        var b, c, d, e, f;
        eb.length = 0;
        e = void 0 === a ? kb.getElementsByTagName("table") : document.querySelectorAll(a);
        for (b = a = 0; a < e.length; a++) if (!("redips_clone" === e[a].parentNode.id || -1 < e[a].className.indexOf("redips-nolayout"))) {
            c = e[a].parentNode;
            d = 0;
            do "TD" === c.nodeName && d++, c = c.parentNode; while (c && c !== kb);
            eb[b] = e[a];
            eb[b].redips || (eb[b].redips = {});
            eb[b].redips.container = kb;
            eb[b].redips.nestedLevel = d;
            eb[b].redips.idx = b;
            tb[b] = 0;
            d = eb[b].getElementsByTagName("td");
            c = 0;
            for (f = !1; c < d.length; c++) if (1 < d[c].rowSpan) {
                f = !0;
                break;
            }
            eb[b].redips.rowspan = f;
            b++;
        }
        a = 0;
        for (e = fb = 1; a < eb.length; a++) if (0 === eb[a].redips.nestedLevel) {
            eb[a].redips.nestedGroup = e;
            eb[a].redips.sort = 100 * fb;
            c = eb[a].getElementsByTagName("table");
            for (b = 0; b < c.length; b++) -1 < c[b].className.indexOf("redips-nolayout") || (c[b].redips.nestedGroup = e, 
            c[b].redips.sort = 100 * fb + c[b].redips.nestedLevel);
            e++;
            fb++;
        }
    };
    d = function(b) {
        var c = b || window.event, d, e;
        if (!0 === this.redips.animated) return !0;
        c.cancelBubble = !0;
        c.stopPropagation && c.stopPropagation();
        rb = c.shiftKey;
        b = c.which ? c.which : c.button;
        if (A(c) || !c.touches && 1 !== b) return !0;
        if (window.getSelection) window.getSelection().removeAllRanges(); else if (document.selection && "Text" === document.selection.type) try {
            document.selection.empty();
        } catch (i) {}
        c.touches ? (b = mb = c.touches[0].clientX, e = nb = c.touches[0].clientY) : (b = mb = c.clientX, 
        e = nb = c.clientY);
        ob = b;
        pb = e;
        qb = !1;
        REDIPS.drag.objOld = Fb = Eb || this;
        REDIPS.drag.obj = Eb = this;
        sb = -1 < Eb.className.indexOf("redips-clone");
        REDIPS.drag.tableSort && f(Eb);
        kb !== Eb.redips.container && (kb = Eb.redips.container, a());
        -1 === Eb.className.indexOf("row") ? REDIPS.drag.mode = Gb = "cell" : (REDIPS.drag.mode = Gb = "row", 
        REDIPS.drag.obj = Eb = N(Eb));
        t();
        sb || "cell" !== Gb || (Eb.style.zIndex = 999);
        vb = yb = Bb = null;
        o();
        xb = wb = vb;
        Ab = zb = yb;
        Db = Cb = Bb;
        REDIPS.drag.td.source = Jb.source = C("TD", Eb);
        REDIPS.drag.td.current = Jb.current = Jb.source;
        REDIPS.drag.td.previous = Jb.previous = Jb.source;
        "cell" === Gb ? REDIPS.drag.event.clicked(Jb.current) : REDIPS.drag.event.rowClicked(Jb.current);
        if (null === vb || null === yb || null === Bb) if (o(), xb = wb = vb, Ab = zb = yb, 
        Db = Cb = Bb, null === vb || null === yb || null === Bb) return !0;
        gb = hb = !1;
        REDIPS.event.add(document, "mousemove", h);
        REDIPS.event.add(document, "touchmove", h);
        REDIPS.event.add(document, "mouseup", g);
        REDIPS.event.add(document, "touchend", g);
        Eb.setCapture && Eb.setCapture();
        null !== vb && null !== yb && null !== Bb && (db = r(vb, yb, Bb));
        d = B(eb[xb], "position");
        "fixed" !== d && (d = B(eb[xb].parentNode, "position"));
        d = s(Eb, d);
        S = [ e - d[0], d[1] - b, d[2] - e, b - d[3] ];
        kb.onselectstart = function(a) {
            c = a || window.event;
            if (!A(c)) return c.shiftKey && document.selection.clear(), !1;
        };
        return !1;
    };
    e = function(a) {
        REDIPS.drag.event.dblClicked();
    };
    f = function(a) {
        var b;
        b = C("TABLE", a).redips.nestedGroup;
        for (a = 0; a < eb.length; a++) eb[a].redips.nestedGroup === b && (eb[a].redips.sort = 100 * fb + eb[a].redips.nestedLevel);
        eb.sort(function(a, b) {
            return b.redips.sort - a.redips.sort;
        });
        fb++;
    };
    N = function(a, b) {
        var c, d, e, f, g, h;
        if ("DIV" === a.nodeName) return f = a, a = C("TR", a), void 0 === a.redips && (a.redips = {}), 
        a.redips.div = f, a;
        d = a;
        void 0 === d.redips && (d.redips = {});
        a = C("TABLE", a);
        sb && hb && (f = d.redips.div, f.className = Q(f.className.replace("redips-clone", "")));
        c = a.cloneNode(!0);
        sb && hb && (f.className += " redips-clone");
        e = c.rows.length - 1;
        f = "animated" === b ? 0 === e : !0;
        for (g = e; 0 <= g; g--) if (g !== d.rowIndex) {
            if (!0 === f && void 0 === b) for (e = c.rows[g], h = 0; h < e.cells.length; h++) if (-1 < e.cells[h].className.indexOf("redips-rowhandler")) {
                f = !1;
                break;
            }
            c.deleteRow(g);
        }
        hb || (d.redips.emptyRow = f);
        c.redips = {};
        c.redips.container = a.redips.container;
        c.redips.sourceRow = d;
        P(d, c.rows[0]);
        y(d, c.rows[0]);
        document.getElementById("redips_clone").appendChild(c);
        d = s(d, "fixed");
        c.style.position = "fixed";
        c.style.top = d[0] + "px";
        c.style.left = d[3] + "px";
        c.style.width = d[1] - d[3] + "px";
        return c;
    };
    O = function(b, c, d) {
        var e = !1, f, g, h, i, j, k, l, m;
        m = function(a) {
            var b;
            void 0 !== a.redips && a.redips.emptyRow ? M(a, "empty", REDIPS.drag.style.rowEmptyColor) : (b = C("TABLE", a), 
            b.deleteRow(a.rowIndex));
        };
        void 0 === d ? d = Eb : e = !0;
        f = d.redips.sourceRow;
        g = f.rowIndex;
        h = C("TABLE", f);
        i = f.parentNode;
        b = eb[b];
        c > b.rows.length - 1 && (c = b.rows.length - 1);
        j = b.rows[c];
        k = c;
        l = j.parentNode;
        c = d.getElementsByTagName("tr")[0];
        d.parentNode.removeChild(d);
        !1 !== REDIPS.drag.event.rowDroppedBefore(h, g) && (!e && -1 < Jb.target.className.indexOf(REDIPS.drag.trash.className) ? hb ? REDIPS.drag.event.rowDeleted() : REDIPS.drag.trash.questionRow ? confirm(REDIPS.drag.trash.questionRow) ? (m(f), 
        REDIPS.drag.event.rowDeleted()) : (delete Fb.redips.emptyRow, REDIPS.drag.event.rowUndeleted()) : (m(f), 
        REDIPS.drag.event.rowDeleted()) : (k < b.rows.length ? vb === xb ? g > k ? l.insertBefore(c, j) : l.insertBefore(c, j.nextSibling) : "after" === REDIPS.drag.rowDropMode ? l.insertBefore(c, j.nextSibling) : l.insertBefore(c, j) : (l.appendChild(c), 
        j = b.rows[0]), j && j.redips && j.redips.emptyRow ? b.deleteRow(j.rowIndex) : "overwrite" === REDIPS.drag.rowDropMode ? m(j) : "switch" !== REDIPS.drag.rowDropMode || hb || (i.insertBefore(j, f), 
        void 0 !== f.redips && delete f.redips.emptyRow), !e && hb || m(f), delete c.redips.emptyRow, 
        e || REDIPS.drag.event.rowDropped(c, h, g)), 0 < c.getElementsByTagName("table").length && a());
    };
    P = function(a, b) {
        var c, d, e, f = [], g = [];
        f[0] = a.getElementsByTagName("input");
        f[1] = a.getElementsByTagName("textarea");
        f[2] = a.getElementsByTagName("select");
        g[0] = b.getElementsByTagName("input");
        g[1] = b.getElementsByTagName("textarea");
        g[2] = b.getElementsByTagName("select");
        for (c = 0; c < f.length; c++) for (d = 0; d < f[c].length; d++) switch (e = f[c][d].type, 
        e) {
          case "text":
          case "textarea":
          case "password":
            g[c][d].value = f[c][d].value;
            break;

          case "radio":
          case "checkbox":
            g[c][d].checked = f[c][d].checked;
            break;

          case "select-one":
            g[c][d].selectedIndex = f[c][d].selectedIndex;
            break;

          case "select-multiple":
            for (e = 0; e < f[c][d].options.length; e++) g[c][d].options[e].selected = f[c][d].options[e].selected;
        }
    };
    g = function(b) {
        var c = b || window.event, d, e, f;
        b = c.clientX;
        f = c.clientY;
        bb = cb = 0;
        Eb.releaseCapture && Eb.releaseCapture();
        REDIPS.event.remove(document, "mousemove", h);
        REDIPS.event.remove(document, "touchmove", h);
        REDIPS.event.remove(document, "mouseup", g);
        REDIPS.event.remove(document, "touchend", g);
        kb.onselectstart = null;
        k(Eb);
        V = document.documentElement.scrollWidth;
        W = document.documentElement.scrollHeight;
        bb = cb = 0;
        if (!hb || "cell" !== Gb || null !== vb && null !== yb && null !== Bb) if (null === vb || null === yb || null === Bb) REDIPS.drag.event.notMoved(); else {
            vb < eb.length ? (c = eb[vb], REDIPS.drag.td.target = Jb.target = c.rows[yb].cells[Bb], 
            q(vb, yb, Bb, db), d = vb, e = yb) : null === wb || null === zb || null === Cb ? (c = eb[xb], 
            REDIPS.drag.td.target = Jb.target = c.rows[Ab].cells[Db], q(xb, Ab, Db, db), d = xb, 
            e = Ab) : (c = eb[wb], REDIPS.drag.td.target = Jb.target = c.rows[zb].cells[Cb], 
            q(wb, zb, Cb, db), d = wb, e = zb);
            if ("row" === Gb) if (gb) if (xb === d && Ab === e) {
                c = Eb.getElementsByTagName("tr")[0];
                Fb.style.backgroundColor = c.style.backgroundColor;
                for (b = 0; b < c.cells.length; b++) Fb.cells[b].style.backgroundColor = c.cells[b].style.backgroundColor;
                Eb.parentNode.removeChild(Eb);
                delete Fb.redips.emptyRow;
                hb ? REDIPS.drag.event.rowNotCloned() : REDIPS.drag.event.rowDroppedSource(Jb.target);
            } else O(d, e); else REDIPS.drag.event.rowNotMoved(); else if (hb || qb) if (hb && xb === vb && Ab === yb && Db === Bb) Eb.parentNode.removeChild(Eb), 
            --ib[Fb.id], REDIPS.drag.event.notCloned(); else if (hb && !1 === REDIPS.drag.clone.drop && (b < c.redips.offset[3] || b > c.redips.offset[1] || f < c.redips.offset[0] || f > c.redips.offset[2])) Eb.parentNode.removeChild(Eb), 
            --ib[Fb.id], REDIPS.drag.event.notCloned(); else if (-1 < Jb.target.className.indexOf(REDIPS.drag.trash.className)) Eb.parentNode.removeChild(Eb), 
            REDIPS.drag.trash.question ? setTimeout(function() {
                confirm(REDIPS.drag.trash.question) ? j() : (hb || (eb[xb].rows[Ab].cells[Db].appendChild(Eb), 
                t()), REDIPS.drag.event.undeleted());
            }, 20) : j(); else if ("switch" === REDIPS.drag.dropMode) if (b = REDIPS.drag.event.droppedBefore(Jb.target), 
            !1 === b) i(!1); else {
                Eb.parentNode.removeChild(Eb);
                c = Jb.target.getElementsByTagName("div");
                d = c.length;
                for (b = 0; b < d; b++) void 0 !== c[0] && (REDIPS.drag.objOld = Fb = c[0], Jb.source.appendChild(Fb), 
                l(Fb));
                i();
                d && REDIPS.drag.event.switched();
            } else "overwrite" === REDIPS.drag.dropMode ? (b = REDIPS.drag.event.droppedBefore(Jb.target), 
            !1 !== b && F(Jb.target)) : b = REDIPS.drag.event.droppedBefore(Jb.target), i(b); else REDIPS.drag.event.notMoved();
            "cell" === Gb && 0 < Eb.getElementsByTagName("table").length && a();
            t();
            REDIPS.drag.event.finish();
        } else Eb.parentNode.removeChild(Eb), --ib[Fb.id], REDIPS.drag.event.notCloned();
        wb = zb = Cb = null;
    };
    i = function(a) {
        var b = null, c;
        if (!1 !== a) {
            if (!0 === Kb.sendBack) {
                a = Jb.target.getElementsByTagName("DIV");
                for (c = 0; c < a.length; c++) if (Eb !== a[c] && 0 === Eb.id.indexOf(a[c].id)) {
                    b = a[c];
                    break;
                }
                if (b) {
                    z(b, 1);
                    Eb.parentNode.removeChild(Eb);
                    return;
                }
            }
            "shift" !== REDIPS.drag.dropMode || !R(Jb.target) && "always" !== REDIPS.drag.shift.after || G(Jb.source, Jb.target);
            "top" === REDIPS.drag.multipleDrop && Jb.target.hasChildNodes() ? Jb.target.insertBefore(Eb, Jb.target.firstChild) : Jb.target.appendChild(Eb);
            l(Eb);
            REDIPS.drag.event.dropped(Jb.target);
            hb && (REDIPS.drag.event.clonedDropped(Jb.target), z(Fb, -1));
        } else hb && Eb.parentNode && Eb.parentNode.removeChild(Eb);
    };
    l = function(a, b) {
        !1 === b ? (a.onmousedown = null, a.ontouchstart = null, a.ondblclick = null) : (a.onmousedown = d, 
        a.ontouchstart = d, a.ondblclick = e);
    };
    k = function(a) {
        a.style.top = "";
        a.style.left = "";
        a.style.position = "";
        a.style.zIndex = "";
    };
    j = function() {
        var a;
        hb && z(Fb, -1);
        if ("shift" === REDIPS.drag.dropMode && ("delete" === REDIPS.drag.shift.after || "always" === REDIPS.drag.shift.after)) {
            switch (REDIPS.drag.shift.mode) {
              case "vertical2":
                a = "lastInColumn";
                break;

              case "horizontal2":
                a = "lastInRow";
                break;

              default:
                a = "last";
            }
            G(Jb.source, D(a, Jb.source)[2]);
        }
        REDIPS.drag.event.deleted(hb);
    };
    h = function(a) {
        a = a || window.event;
        var b = REDIPS.drag.scroll.bound, c, d, e, f;
        a.touches ? (d = mb = a.touches[0].clientX, e = nb = a.touches[0].clientY) : (d = mb = a.clientX, 
        e = nb = a.clientY);
        c = Math.abs(ob - d);
        f = Math.abs(pb - e);
        if (!gb) {
            if ("cell" === Gb && (sb || !0 === REDIPS.drag.clone.keyDiv && rb)) REDIPS.drag.objOld = Fb = Eb, 
            REDIPS.drag.obj = Eb = x(Eb, !0), hb = !0, REDIPS.drag.event.cloned(); else {
                if ("row" === Gb) {
                    if (sb || !0 === REDIPS.drag.clone.keyRow && rb) hb = !0;
                    REDIPS.drag.objOld = Fb = Eb;
                    REDIPS.drag.obj = Eb = N(Eb);
                    Eb.style.zIndex = 999;
                }
                Eb.setCapture && Eb.setCapture();
                Eb.style.position = "fixed";
                t();
                o();
                "row" === Gb && (hb ? REDIPS.drag.event.rowCloned() : REDIPS.drag.event.rowMoved());
            }
            p();
            d > T - S[1] && (Eb.style.left = T - (S[1] + S[3]) + "px");
            e > U - S[2] && (Eb.style.top = U - (S[0] + S[2]) + "px");
        }
        gb = !0;
        "cell" === Gb && (7 < c || 7 < f) && !qb && (qb = !0, p(), REDIPS.drag.event.moved(hb));
        d > S[3] && d < T - S[1] && (Eb.style.left = d - S[3] + "px");
        e > S[0] && e < U - S[2] && (Eb.style.top = e - S[0] + "px");
        d < lb[1] && d > lb[3] && e < lb[2] && e > lb[0] && 0 === bb && 0 === cb && (jb.containTable || d < jb[3] || d > jb[1] || e < jb[0] || e > jb[2]) && (o(), 
        m());
        if (REDIPS.drag.scroll.enable) for (Z = b - (T / 2 > d ? d - S[3] : T - d - S[1]), 
        0 < Z ? (Z > b && (Z = b), c = u()[0], Z *= d < T / 2 ? -1 : 1, 0 > Z && 0 >= c || 0 < Z && c >= V - T || 0 !== bb++ || (REDIPS.event.remove(window, "scroll", t), 
        v(window))) : Z = 0, $ = b - (U / 2 > e ? e - S[0] : U - e - S[2]), 0 < $ ? ($ > b && ($ = b), 
        c = u()[1], $ *= e < U / 2 ? -1 : 1, 0 > $ && 0 >= c || 0 < $ && c >= W - U || 0 !== cb++ || (REDIPS.event.remove(window, "scroll", t), 
        w(window))) : $ = 0, f = 0; f < X.length; f++) if (c = X[f], c.autoscroll && d < c.offset[1] && d > c.offset[3] && e < c.offset[2] && e > c.offset[0]) {
            _ = b - (c.midstX > d ? d - S[3] - c.offset[3] : c.offset[1] - d - S[1]);
            0 < _ ? (_ > b && (_ = b), _ *= d < c.midstX ? -1 : 1, 0 === bb++ && (REDIPS.event.remove(c.div, "scroll", t), 
            v(c.div))) : _ = 0;
            ab = b - (c.midstY > e ? e - S[0] - c.offset[0] : c.offset[2] - e - S[2]);
            0 < ab ? (ab > b && (ab = b), ab *= e < c.midstY ? -1 : 1, 0 === cb++ && (REDIPS.event.remove(c.div, "scroll", t), 
            w(c.div))) : ab = 0;
            break;
        } else _ = ab = 0;
        a.cancelBubble = !0;
        a.stopPropagation && a.stopPropagation();
    };
    m = function() {
        vb < eb.length && (vb !== wb || yb !== zb || Bb !== Cb) && (null !== wb && null !== zb && null !== Cb && (q(wb, zb, Cb, db), 
        REDIPS.drag.td.previous = Jb.previous = eb[wb].rows[zb].cells[Cb], REDIPS.drag.td.current = Jb.current = eb[vb].rows[yb].cells[Bb], 
        "switching" === REDIPS.drag.dropMode && "cell" === Gb && (E(Jb.current, Jb.previous), 
        t(), o()), "cell" === Gb ? REDIPS.drag.event.changed(Jb.current) : "row" !== Gb || vb === wb && yb === zb || REDIPS.drag.event.rowChanged(Jb.current)), 
        p());
    };
    n = function() {
        "number" === typeof window.innerWidth ? (T = window.innerWidth, U = window.innerHeight) : document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight) ? (T = document.documentElement.clientWidth, 
        U = document.documentElement.clientHeight) : document.body && (document.body.clientWidth || document.body.clientHeight) && (T = document.body.clientWidth, 
        U = document.body.clientHeight);
        V = document.documentElement.scrollWidth;
        W = document.documentElement.scrollHeight;
        t();
    };
    o = function() {
        var a, b, c, d, e, f;
        c = [];
        a = function() {
            null !== wb && null !== zb && null !== Cb && (vb = wb, yb = zb, Bb = Cb);
        };
        b = mb;
        f = nb;
        for (vb = 0; vb < eb.length; vb++) if (!1 !== eb[vb].redips.enabled && (c[0] = eb[vb].redips.offset[0], 
        c[1] = eb[vb].redips.offset[1], c[2] = eb[vb].redips.offset[2], c[3] = eb[vb].redips.offset[3], 
        void 0 !== eb[vb].sca && (c[0] = c[0] > eb[vb].sca.offset[0] ? c[0] : eb[vb].sca.offset[0], 
        c[1] = c[1] < eb[vb].sca.offset[1] ? c[1] : eb[vb].sca.offset[1], c[2] = c[2] < eb[vb].sca.offset[2] ? c[2] : eb[vb].sca.offset[2], 
        c[3] = c[3] > eb[vb].sca.offset[3] ? c[3] : eb[vb].sca.offset[3]), c[3] < b && b < c[1] && c[0] < f && f < c[2])) {
            c = eb[vb].redips.row_offset;
            for (yb = 0; yb < c.length - 1; yb++) if (void 0 !== c[yb]) {
                jb[0] = c[yb][0];
                if (void 0 !== c[yb + 1]) jb[2] = c[yb + 1][0]; else for (d = yb + 2; d < c.length; d++) if (void 0 !== c[d]) {
                    jb[2] = c[d][0];
                    break;
                }
                if (f <= jb[2]) break;
            }
            d = yb;
            yb === c.length - 1 && (jb[0] = c[yb][0], jb[2] = eb[vb].redips.offset[2]);
            do for (Bb = e = eb[vb].rows[yb].cells.length - 1; 0 <= Bb && !(jb[3] = c[yb][3] + eb[vb].rows[yb].cells[Bb].offsetLeft, 
            jb[1] = jb[3] + eb[vb].rows[yb].cells[Bb].offsetWidth, jb[3] <= b && b <= jb[1]); Bb--) ; while (eb[vb].redips.rowspan && -1 === Bb && 0 < yb--);
            0 > yb || 0 > Bb ? a() : yb !== d && (jb[0] = c[yb][0], jb[2] = jb[0] + eb[vb].rows[yb].cells[Bb].offsetHeight, 
            (f < jb[0] || f > jb[2]) && a());
            b = eb[vb].rows[yb].cells[Bb];
            jb.containTable = 0 < b.childNodes.length && 0 < b.getElementsByTagName("table").length;
            if (-1 === b.className.indexOf(REDIPS.drag.trash.className)) if (f = -1 < b.className.indexOf(REDIPS.drag.only.cname), 
            !0 === f) {
                if (-1 === b.className.indexOf(Hb.div[Eb.id])) {
                    a();
                    break;
                }
            } else if (void 0 !== Hb.div[Eb.id] && "deny" === Hb.other) {
                a();
                break;
            } else if (f = -1 < b.className.indexOf(REDIPS.drag.mark.cname), (!0 === f && "deny" === REDIPS.drag.mark.action || !1 === f && "allow" === REDIPS.drag.mark.action) && -1 === b.className.indexOf(Ib.exception[Eb.id])) {
                a();
                break;
            }
            f = -1 < b.className.indexOf("redips-single");
            if ("cell" === Gb) {
                if (("single" === REDIPS.drag.dropMode || f) && 0 < b.childNodes.length) {
                    if (1 === b.childNodes.length && 3 === b.firstChild.nodeType) break;
                    f = !0;
                    for (d = b.childNodes.length - 1; 0 <= d; d--) if (b.childNodes[d].className && -1 < b.childNodes[d].className.indexOf("redips-drag")) {
                        f = !1;
                        break;
                    }
                    if (!f && null !== wb && null !== zb && null !== Cb && (xb !== vb || Ab !== yb || Db !== Bb)) {
                        a();
                        break;
                    }
                }
                if (-1 < b.className.indexOf("redips-rowhandler")) {
                    a();
                    break;
                }
                if (b.parentNode.redips && b.parentNode.redips.emptyRow) {
                    a();
                    break;
                }
            }
            break;
        }
    };
    p = function() {
        vb < eb.length && null !== vb && null !== yb && null !== Bb && (db = r(vb, yb, Bb), 
        q(vb, yb, Bb), wb = vb, zb = yb, Cb = Bb);
    };
    q = function(a, b, c, d) {
        if ("cell" === Gb && qb) c = eb[a].rows[b].cells[c].style, c.backgroundColor = void 0 === d ? REDIPS.drag.hover.colorTd : d.color[0].toString(), 
        void 0 !== REDIPS.drag.hover.borderTd && (void 0 === d ? c.border = REDIPS.drag.hover.borderTd : (c.borderTopWidth = d.top[0][0], 
        c.borderTopStyle = d.top[0][1], c.borderTopColor = d.top[0][2], c.borderRightWidth = d.right[0][0], 
        c.borderRightStyle = d.right[0][1], c.borderRightColor = d.right[0][2], c.borderBottomWidth = d.bottom[0][0], 
        c.borderBottomStyle = d.bottom[0][1], c.borderBottomColor = d.bottom[0][2], c.borderLeftWidth = d.left[0][0], 
        c.borderLeftStyle = d.left[0][1], c.borderLeftColor = d.left[0][2])); else if ("row" === Gb) for (a = eb[a].rows[b], 
        b = 0; b < a.cells.length; b++) c = a.cells[b].style, c.backgroundColor = void 0 === d ? REDIPS.drag.hover.colorTr : d.color[b].toString(), 
        void 0 !== REDIPS.drag.hover.borderTr && (void 0 === d ? vb === xb ? yb < Ab ? c.borderTop = REDIPS.drag.hover.borderTr : c.borderBottom = REDIPS.drag.hover.borderTr : "before" === REDIPS.drag.rowDropMode ? c.borderTop = REDIPS.drag.hover.borderTr : c.borderBottom = REDIPS.drag.hover.borderTr : (c.borderTopWidth = d.top[b][0], 
        c.borderTopStyle = d.top[b][1], c.borderTopColor = d.top[b][2], c.borderBottomWidth = d.bottom[b][0], 
        c.borderBottomStyle = d.bottom[b][1], c.borderBottomColor = d.bottom[b][2]));
    };
    r = function(a, b, c) {
        var d = {
            color: [],
            top: [],
            right: [],
            bottom: [],
            left: []
        }, e = function(a, b) {
            var c = "border" + b + "Style", d = "border" + b + "Color";
            return [ B(a, "border" + b + "Width"), B(a, c), B(a, d) ];
        };
        if ("cell" === Gb) c = eb[a].rows[b].cells[c], d.color[0] = c.style.backgroundColor, 
        void 0 !== REDIPS.drag.hover.borderTd && (d.top[0] = e(c, "Top"), d.right[0] = e(c, "Right"), 
        d.bottom[0] = e(c, "Bottom"), d.left[0] = e(c, "Left")); else for (a = eb[a].rows[b], 
        b = 0; b < a.cells.length; b++) c = a.cells[b], d.color[b] = c.style.backgroundColor, 
        void 0 !== REDIPS.drag.hover.borderTr && (d.top[b] = e(c, "Top"), d.bottom[b] = e(c, "Bottom"));
        return d;
    };
    s = function(a, b, c) {
        var d = 0, e = 0, f = a;
        "fixed" !== b && (d = 0 - ub[0], e = 0 - ub[1]);
        if (void 0 === c || !0 === c) {
            do d += a.offsetLeft - a.scrollLeft, e += a.offsetTop - a.scrollTop, a = a.offsetParent; while (a && "BODY" !== a.nodeName);
        } else do d += a.offsetLeft, e += a.offsetTop, a = a.offsetParent; while (a && "BODY" !== a.nodeName);
        return [ e, d + f.offsetWidth, e + f.offsetHeight, d ];
    };
    t = function() {
        var a, b, c, d;
        ub = u();
        for (a = 0; a < eb.length; a++) {
            c = [];
            d = B(eb[a], "position");
            "fixed" !== d && (d = B(eb[a].parentNode, "position"));
            for (b = eb[a].rows.length - 1; 0 <= b; b--) "none" !== eb[a].rows[b].style.display && (c[b] = s(eb[a].rows[b], d));
            eb[a].redips.offset = s(eb[a], d);
            eb[a].redips.row_offset = c;
        }
        lb = s(kb);
        for (a = 0; a < X.length; a++) d = B(X[a].div, "position"), b = s(X[a].div, d, !1), 
        X[a].offset = b, X[a].midstX = (b[1] + b[3]) / 2, X[a].midstY = (b[0] + b[2]) / 2;
    };
    u = function() {
        var a, b;
        "number" === typeof window.pageYOffset ? (a = window.pageXOffset, b = window.pageYOffset) : document.body && (document.body.scrollLeft || document.body.scrollTop) ? (a = document.body.scrollLeft, 
        b = document.body.scrollTop) : document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop) ? (a = document.documentElement.scrollLeft, 
        b = document.documentElement.scrollTop) : a = b = 0;
        return [ a, b ];
    };
    v = function(a) {
        var b, c;
        b = mb;
        c = nb;
        0 < bb && (t(), o(), b < lb[1] && b > lb[3] && c < lb[2] && c > lb[0] && m());
        "object" === typeof a && (Y = a);
        Y === window ? (a = u()[0], b = V - T, c = Z) : (a = Y.scrollLeft, b = Y.scrollWidth - Y.clientWidth, 
        c = _);
        0 < bb && (0 > c && 0 < a || 0 < c && a < b) ? (Y === window ? (window.scrollBy(c, 0), 
        u(), a = parseInt(Eb.style.left, 10), isNaN(a)) : Y.scrollLeft += c, setTimeout(v, REDIPS.drag.scroll.speed)) : (REDIPS.event.add(Y, "scroll", t), 
        bb = 0, jb = [ 0, 0, 0, 0 ]);
    };
    w = function(a) {
        var b, c;
        b = mb;
        c = nb;
        0 < cb && (t(), o(), b < lb[1] && b > lb[3] && c < lb[2] && c > lb[0] && m());
        "object" === typeof a && (Y = a);
        Y === window ? (a = u()[1], b = W - U, c = $) : (a = Y.scrollTop, b = Y.scrollHeight - Y.clientHeight, 
        c = ab);
        0 < cb && (0 > c && 0 < a || 0 < c && a < b) ? (Y === window ? (window.scrollBy(0, c), 
        u(), a = parseInt(Eb.style.top, 10), isNaN(a)) : Y.scrollTop += c, setTimeout(w, REDIPS.drag.scroll.speed)) : (REDIPS.event.add(Y, "scroll", t), 
        cb = 0, jb = [ 0, 0, 0, 0 ]);
    };
    x = function(a, b) {
        var c = a.cloneNode(!0), d = c.className, e, f;
        !0 === b && (document.getElementById("redips_clone").appendChild(c), c.style.zIndex = 999, 
        c.style.position = "fixed", e = s(a), f = s(c), c.style.top = e[0] - f[0] + "px", 
        c.style.left = e[3] - f[3] + "px");
        c.setCapture && c.setCapture();
        d = d.replace("redips-clone", "");
        d = d.replace(/climit(\d)_(\d+)/, "");
        c.className = Q(d);
        void 0 === ib[a.id] && (ib[a.id] = 0);
        c.id = a.id + "c" + ib[a.id];
        ib[a.id] += 1;
        y(a, c);
        return c;
    };
    y = function(a, b) {
        var c = [], d;
        c[0] = function(a, b) {
            a.redips && (b.redips = {}, b.redips.enabled = a.redips.enabled, b.redips.container = a.redips.container, 
            a.redips.enabled && l(b));
        };
        c[1] = function(a, b) {
            a.redips && (b.redips = {}, b.redips.emptyRow = a.redips.emptyRow);
        };
        d = function(d) {
            var e, f, g;
            f = [ "DIV", "TR" ];
            e = a.getElementsByTagName(f[d]);
            f = b.getElementsByTagName(f[d]);
            for (g = 0; g < f.length; g++) c[d](e[g], f[g]);
        };
        if ("DIV" === a.nodeName) c[0](a, b); else if ("TR" === a.nodeName) c[1](a, b);
        d(0);
        d(1);
    };
    z = function(a, c) {
        var d, e, f;
        f = a.className;
        d = f.match(/climit(\d)_(\d+)/);
        null !== d && (e = parseInt(d[1], 10), d = parseInt(d[2], 10), 0 === d && 1 === c && (f += " redips-clone", 
        2 === e && b(!0, a)), d += c, f = f.replace(/climit\d_\d+/g, "climit" + e + "_" + d), 
        0 >= d && (f = f.replace("redips-clone", ""), 2 === e ? (b(!1, a), REDIPS.drag.event.clonedEnd2()) : REDIPS.drag.event.clonedEnd1()), 
        a.className = Q(f));
    };
    A = function(a) {
        var b = !1;
        a.srcElement ? (b = a.srcElement.nodeName, a = a.srcElement.className) : (b = a.target.nodeName, 
        a = a.target.className);
        switch (b) {
          case "A":
          case "INPUT":
          case "SELECT":
          case "OPTION":
          case "TEXTAREA":
            b = !0;
            break;

          default:
            b = /\bredips-nodrag\b/i.test(a);
        }
        return b;
    };
    b = function(a, b) {
        var c, d, e, f = [], g = [], h, i, j, k, m = /\bredips-drag\b/i, n = /\bredips-noautoscroll\b/i;
        i = REDIPS.drag.style.opacityDisabled;
        !0 === a || "init" === a ? (h = REDIPS.drag.style.borderEnabled, j = "move", k = !0) : (h = REDIPS.drag.style.borderDisabled, 
        j = "auto", k = !1);
        void 0 === b ? f = kb.getElementsByTagName("div") : "string" === typeof b ? f = document.querySelectorAll(b) : "object" !== typeof b || "DIV" === b.nodeName && -1 !== b.className.indexOf("redips-drag") ? f[0] = b : f = b.getElementsByTagName("div");
        for (d = c = 0; c < f.length; c++) if (m.test(f[c].className)) "init" === a || void 0 === f[c].redips ? (f[c].redips = {}, 
        f[c].redips.container = kb) : !0 === a && "number" === typeof i ? (f[c].style.opacity = "", 
        f[c].style.filter = "") : !1 === a && "number" === typeof i && (f[c].style.opacity = i / 100, 
        f[c].style.filter = "alpha(opacity=" + i + ")"), l(f[c], k), f[c].style.borderStyle = h, 
        f[c].style.cursor = j, f[c].redips.enabled = k; else if ("init" === a && (e = B(f[c], "overflow"), 
        "visible" !== e)) {
            REDIPS.event.add(f[c], "scroll", t);
            e = B(f[c], "position");
            g = s(f[c], e, !1);
            e = !n.test(f[c].className);
            X[d] = {
                div: f[c],
                offset: g,
                midstX: (g[1] + g[3]) / 2,
                midstY: (g[0] + g[2]) / 2,
                autoscroll: e
            };
            g = f[c].getElementsByTagName("table");
            for (e = 0; e < g.length; e++) g[e].sca = X[d];
            d++;
        }
    };
    B = function(a, b) {
        var c;
        a && a.currentStyle ? c = a.currentStyle[b] : a && window.getComputedStyle && (c = document.defaultView.getComputedStyle(a, null)[b]);
        return c;
    };
    C = function(a, b, c) {
        b = b.parentNode;
        for (void 0 === c && (c = 0); b; ) {
            if (b.nodeName === a) if (0 < c) c--; else break;
            b = b.parentNode;
        }
        return b;
    };
    D = function(a, b) {
        var c = C("TABLE", b), d, e;
        switch (a) {
          case "firstInColumn":
            d = 0;
            e = b.cellIndex;
            break;

          case "firstInRow":
            d = b.parentNode.rowIndex;
            e = 0;
            break;

          case "lastInColumn":
            d = c.rows.length - 1;
            e = b.cellIndex;
            break;

          case "lastInRow":
            d = b.parentNode.rowIndex;
            e = c.rows[d].cells.length - 1;
            break;

          case "last":
            d = c.rows.length - 1;
            e = c.rows[d].cells.length - 1;
            break;

          default:
            d = e = 0;
        }
        return [ d, e, c.rows[d].cells[e] ];
    };
    E = function(a, b, c) {
        var d, e, f;
        d = function(a, b) {
            REDIPS.drag.event.relocateBefore(a, b);
            var c = REDIPS.drag.getPosition(b);
            REDIPS.drag.moveObject({
                obj: a,
                target: c,
                callback: function(a) {
                    var c = REDIPS.drag.findParent("TABLE", a), d = c.redips.idx;
                    REDIPS.drag.event.relocateAfter(a, b);
                    tb[d]--;
                    0 === tb[d] && (REDIPS.drag.event.relocateEnd(), REDIPS.drag.enableTable(!0, c));
                }
            });
        };
        if (a !== b && "object" === typeof a && "object" === typeof b) if (f = a.childNodes.length, 
        "animation" === c) {
            if (0 < f) for (c = C("TABLE", b), e = c.redips.idx, REDIPS.drag.enableTable(!1, c), 
            c = 0; c < f; c++) 1 === a.childNodes[c].nodeType && "DIV" === a.childNodes[c].nodeName && (tb[e]++, 
            d(a.childNodes[c], b));
        } else for (d = c = 0; c < f; c++) 1 === a.childNodes[d].nodeType && "DIV" === a.childNodes[d].nodeName ? (e = a.childNodes[d], 
        REDIPS.drag.event.relocateBefore(e, b), b.appendChild(e), e.redips && !1 !== e.redips.enabled && l(e), 
        REDIPS.drag.event.relocateAfter(e)) : d++;
    };
    F = function(a, b) {
        var c, d = [], e;
        if ("TD" === a.nodeName) {
            c = a.childNodes.length;
            if ("test" === b) return c = Jb.source === a ? void 0 : 0 === a.childNodes.length || 1 === a.childNodes.length && 3 === a.firstChild.nodeType;
            for (e = 0; e < c; e++) d.push(a.childNodes[0]), a.removeChild(a.childNodes[0]);
            return d;
        }
    };
    G = function(a, b) {
        var c, d, e, f, g, h, i, j, k, l, m, n, o = !1, p, q;
        p = function(a, b) {
            REDIPS.drag.shift.animation ? E(a, b, "animation") : E(a, b);
        };
        q = function(a) {
            "delete" === REDIPS.drag.shift.overflow ? F(a) : "source" === REDIPS.drag.shift.overflow ? p(a, Jb.source) : "object" === typeof REDIPS.drag.shift.overflow && p(a, REDIPS.drag.shift.overflow);
            o = !1;
            REDIPS.drag.event.shiftOverflow(a);
        };
        if (a !== b) {
            g = REDIPS.drag.shift.mode;
            c = C("TABLE", a);
            d = C("TABLE", b);
            h = H(d);
            e = c === d ? [ a.redips.rowIndex, a.redips.cellIndex ] : [ -1, -1 ];
            f = [ b.redips.rowIndex, b.redips.cellIndex ];
            m = d.rows.length;
            n = I(d);
            switch (g) {
              case "vertical2":
                c = c === d && a.redips.cellIndex === b.redips.cellIndex ? e : [ m, b.redips.cellIndex ];
                break;

              case "horizontal2":
                c = c === d && a.parentNode.rowIndex === b.parentNode.rowIndex ? e : [ b.redips.rowIndex, n ];
                break;

              default:
                c = c === d ? e : [ m, n ];
            }
            "vertical1" === g || "vertical2" === g ? (g = 1e3 * c[1] + c[0] < 1e3 * f[1] + f[0] ? 1 : -1, 
            d = m, m = 0, n = 1) : (g = 1e3 * c[0] + c[1] < 1e3 * f[0] + f[1] ? 1 : -1, d = n, 
            m = 1, n = 0);
            for (c[0] !== e[0] && c[1] !== e[1] && (o = !0); c[0] !== f[0] || c[1] !== f[1]; ) i = h[c[0] + "-" + c[1]], 
            c[m] += g, 0 > c[m] ? (c[m] = d, c[n]--) : c[m] > d && (c[m] = 0, c[n]++), e = h[c[0] + "-" + c[1]], 
            void 0 !== e && (j = e), void 0 !== i && (k = i), void 0 !== e && void 0 !== k || void 0 !== j && void 0 !== i ? (e = -1 === j.className.indexOf(REDIPS.drag.mark.cname) ? 0 : 1, 
            i = -1 === k.className.indexOf(REDIPS.drag.mark.cname) ? 0 : 1, o && 0 === e && 1 === i && q(j), 
            1 === e ? 0 === i && (l = k) : (0 === e && 1 === i && (k = l), p(j, k))) : o && void 0 !== j && void 0 === k && (e = -1 === j.className.indexOf(REDIPS.drag.mark.cname) ? 0 : 1, 
            0 === e && q(j));
        }
    };
    H = function(a) {
        var b = [], c, d = {}, e, f, g, h, i, j, k, l;
        h = a.rows;
        for (i = 0; i < h.length; i++) for (j = 0; j < h[i].cells.length; j++) {
            c = h[i].cells[j];
            a = c.parentNode.rowIndex;
            e = c.rowSpan || 1;
            f = c.colSpan || 1;
            b[a] = b[a] || [];
            for (k = 0; k < b[a].length + 1; k++) if ("undefined" === typeof b[a][k]) {
                g = k;
                break;
            }
            d[a + "-" + g] = c;
            void 0 === c.redips && (c.redips = {});
            c.redips.rowIndex = a;
            c.redips.cellIndex = g;
            for (k = a; k < a + e; k++) for (b[k] = b[k] || [], c = b[k], l = g; l < g + f; l++) c[l] = "x";
        }
        return d;
    };
    I = function(a) {
        "string" === typeof a && (a = document.getElementById(a));
        a = a.rows;
        var b, c = 0, d, e;
        for (d = 0; d < a.length; d++) {
            for (e = b = 0; e < a[d].cells.length; e++) b += a[d].cells[e].colSpan || 1;
            b > c && (c = b);
        }
        return c;
    };
    J = function(a, b) {
        var c = (b.k1 - b.k2 * a) * (b.k1 - b.k2 * a), d;
        a += REDIPS.drag.animation.step * (4 - 3 * c) * b.direction;
        d = b.m * a + b.b;
        "horizontal" === b.type ? (b.obj.style.left = a + "px", b.obj.style.top = d + "px") : (b.obj.style.left = d + "px", 
        b.obj.style.top = a + "px");
        a < b.last && 0 < b.direction || a > b.last && 0 > b.direction ? setTimeout(function() {
            J(a, b);
        }, REDIPS.drag.animation.pause * c) : (k(b.obj), b.obj.redips && (b.obj.redips.animated = !1), 
        "cell" === b.mode ? (!0 === b.overwrite && F(b.targetCell), b.targetCell.appendChild(b.obj), 
        b.obj.redips && !1 !== b.obj.redips.enabled && l(b.obj)) : O(K(b.target[0]), b.target[1], b.obj), 
        "function" === typeof b.callback && b.callback(b.obj));
    };
    L = function(a) {
        var b, c, d;
        b = [];
        b = c = d = -1;
        if (void 0 === a) b = vb < eb.length ? eb[vb].redips.idx : null === wb || null === zb || null === Cb ? eb[xb].redips.idx : eb[wb].redips.idx, 
        c = eb[xb].redips.idx, b = [ b, yb, Bb, c, Ab, Db ]; else {
            if (a = "string" === typeof a ? document.getElementById(a) : a) "TD" !== a.nodeName && (a = C("TD", a)), 
            a && "TD" === a.nodeName && (b = a.cellIndex, c = a.parentNode.rowIndex, a = C("TABLE", a), 
            d = a.redips.idx);
            b = [ d, c, b ];
        }
        return b;
    };
    K = function(a) {
        var b;
        for (b = 0; b < eb.length && eb[b].redips.idx !== a; b++) ;
        return b;
    };
    Q = function(a) {
        void 0 !== a && (a = a.replace(/^\s+|\s+$/g, "").replace(/\s{2,}/g, " "));
        return a;
    };
    R = function(a) {
        var b;
        for (b = 0; b < a.childNodes.length; b++) if (1 === a.childNodes[b].nodeType) return !0;
        return !1;
    };
    M = function(a, b, c) {
        var d, e;
        "string" === typeof a && (a = document.getElementById(a), a = C("TABLE", a));
        if ("TR" === a.nodeName) for (a = a.getElementsByTagName("td"), d = 0; d < a.length; d++) if (a[d].style.backgroundColor = c ? c : "", 
        "empty" === b) a[d].innerHTML = ""; else for (e = 0; e < a[d].childNodes.length; e++) 1 === a[d].childNodes[e].nodeType && (a[d].childNodes[e].style.opacity = b / 100, 
        a[d].childNodes[e].style.filter = "alpha(opacity=" + b + ")"); else a.style.opacity = b / 100, 
        a.style.filter = "alpha(opacity=" + b + ")", a.style.backgroundColor = c ? c : "";
    };
    return {
        obj: Eb,
        objOld: Fb,
        mode: Gb,
        td: Jb,
        hover: {
            colorTd: "#E7AB83",
            colorTr: "#E7AB83"
        },
        scroll: {
            enable: !0,
            bound: 25,
            speed: 20
        },
        only: Hb,
        mark: Ib,
        style: {
            borderEnabled: "solid",
            borderDisabled: "dotted",
            opacityDisabled: "",
            rowEmptyColor: "white"
        },
        trash: {
            className: "redips-trash",
            question: null,
            questionRow: null
        },
        saveParamName: "p",
        dropMode: "multiple",
        multipleDrop: "bottom",
        clone: Kb,
        animation: {
            pause: 20,
            step: 2,
            shift: !1
        },
        shift: {
            mode: "horizontal1",
            after: "default",
            overflow: "bunch"
        },
        rowDropMode: "before",
        tableSort: !0,
        init: function(d) {
            var e;
            if (void 0 === d || "string" !== typeof d) d = "redips-drag";
            kb = document.getElementById(d);
            if (null === kb) throw "REDIPS.drag - Drag container is not set!";
            ub = u();
            document.getElementById("redips_clone") || (d = document.createElement("div"), d.id = "redips_clone", 
            d.style.width = d.style.height = "1px", kb.appendChild(d));
            b("init");
            a();
            n();
            REDIPS.event.add(window, "resize", n);
            e = kb.getElementsByTagName("img");
            for (d = 0; d < e.length; d++) REDIPS.event.add(e[d], "mousemove", c), REDIPS.event.add(e[d], "touchmove", c);
            REDIPS.event.add(window, "scroll", t);
        },
        initTables: a,
        enableDrag: b,
        enableTable: function(a, b) {
            var c;
            if ("object" === typeof b && "TABLE" === b.nodeName) b.redips.enabled = a; else for (c = 0; c < eb.length; c++) -1 < eb[c].className.indexOf(b) && (eb[c].redips.enabled = a);
        },
        cloneObject: x,
        saveContent: function(a, b) {
            var c = "", d, e, f, g, h, i, j, k = [], l = REDIPS.drag.saveParamName;
            "string" === typeof a && (a = document.getElementById(a));
            if (void 0 !== a && "object" === typeof a && "TABLE" === a.nodeName) {
                d = a.rows.length;
                for (h = 0; h < d; h++) for (e = a.rows[h].cells.length, i = 0; i < e; i++) if (f = a.rows[h].cells[i], 
                0 < f.childNodes.length) for (j = 0; j < f.childNodes.length; j++) g = f.childNodes[j], 
                "DIV" === g.nodeName && -1 < g.className.indexOf("redips-drag") && (c += l + "[]=" + g.id + "_" + h + "_" + i + "&", 
                k.push([ g.id, h, i ]));
                c = "json" === b && 0 < k.length ? JSON.stringify(k) : c.substring(0, c.length - 1);
            }
            return c;
        },
        relocate: E,
        emptyCell: F,
        moveObject: function(b) {
            var c = {
                direction: 1
            }, d, e, f, g, h, i;
            c.callback = b.callback;
            c.overwrite = b.overwrite;
            "string" === typeof b.id ? c.obj = c.objOld = document.getElementById(b.id) : "object" === typeof b.obj && "DIV" === b.obj.nodeName && (c.obj = c.objOld = b.obj);
            if ("row" === b.mode) {
                c.mode = "row";
                i = K(b.source[0]);
                h = b.source[1];
                Fb = c.objOld = eb[i].rows[h];
                if (Fb.redips && !0 === Fb.redips.emptyRow) return !1;
                c.obj = N(c.objOld, "animated");
            } else if (c.obj && -1 < c.obj.className.indexOf("redips-row")) {
                c.mode = "row";
                c.obj = c.objOld = Fb = C("TR", c.obj);
                if (Fb.redips && !0 === Fb.redips.emptyRow) return !1;
                c.obj = N(c.objOld, "animated");
            } else c.mode = "cell";
            if ("object" === typeof c.obj && null !== c.obj) return c.obj.style.zIndex = 999, 
            c.obj.redips && kb !== c.obj.redips.container && (kb = c.obj.redips.container, a()), 
            i = s(c.obj), f = i[1] - i[3], g = i[2] - i[0], d = i[3], e = i[0], !0 === b.clone && "cell" === c.mode && (c.obj = x(c.obj, !0), 
            REDIPS.drag.event.cloned(c.obj)), void 0 === b.target ? b.target = L() : "object" === typeof b.target && "TD" === b.target.nodeName && (b.target = L(b.target)), 
            c.target = b.target, i = K(b.target[0]), h = b.target[1], b = b.target[2], h > eb[i].rows.length - 1 && (h = eb[i].rows.length - 1), 
            c.targetCell = eb[i].rows[h].cells[b], "cell" === c.mode ? (i = s(c.targetCell), 
            h = i[1] - i[3], b = i[2] - i[0], f = i[3] + (h - f) / 2, g = i[0] + (b - g) / 2) : (i = s(eb[i].rows[h]), 
            f = i[3], g = i[0]), i = f - d, b = g - e, c.obj.style.position = "fixed", Math.abs(i) > Math.abs(b) ? (c.type = "horizontal", 
            c.m = b / i, c.b = e - c.m * d, c.k1 = (d + f) / (d - f), c.k2 = 2 / (d - f), d > f && (c.direction = -1), 
            i = d, c.last = f) : (c.type = "vertical", c.m = i / b, c.b = d - c.m * e, c.k1 = (e + g) / (e - g), 
            c.k2 = 2 / (e - g), e > g && (c.direction = -1), i = e, c.last = g), c.obj.redips && (c.obj.redips.animated = !0), 
            J(i, c), [ c.obj, c.objOld ];
        },
        shiftCells: G,
        deleteObject: function(a) {
            "object" === typeof a && "DIV" === a.nodeName ? a.parentNode.removeChild(a) : "string" === typeof a && (a = document.getElementById(a)) && a.parentNode.removeChild(a);
        },
        getPosition: L,
        rowOpacity: M,
        rowEmpty: function(a, b, c) {
            a = document.getElementById(a).rows[b];
            void 0 === c && (c = REDIPS.drag.style.rowEmptyColor);
            void 0 === a.redips && (a.redips = {});
            a.redips.emptyRow = !0;
            M(a, "empty", c);
        },
        getScrollPosition: u,
        getStyle: B,
        findParent: C,
        findCell: D,
        event: {
            changed: function() {},
            clicked: function() {},
            cloned: function() {},
            clonedDropped: function() {},
            clonedEnd1: function() {},
            clonedEnd2: function() {},
            dblClicked: function() {},
            deleted: function() {},
            dropped: function() {},
            droppedBefore: function() {},
            finish: function() {},
            moved: function() {},
            notCloned: function() {},
            notMoved: function() {},
            shiftOverflow: function() {},
            relocateBefore: function() {},
            relocateAfter: function() {},
            relocateEnd: function() {},
            rowChanged: function() {},
            rowClicked: function() {},
            rowCloned: function() {},
            rowDeleted: function() {},
            rowDropped: function() {},
            rowDroppedBefore: function() {},
            rowDroppedSource: function() {},
            rowMoved: function() {},
            rowNotCloned: function() {},
            rowNotMoved: function() {},
            rowUndeleted: function() {},
            switched: function() {},
            undeleted: function() {}
        }
    };
}();

REDIPS.event || (REDIPS.event = function() {
    return {
        add: function(a, b, c) {
            a.addEventListener ? a.addEventListener(b, c, !1) : a.attachEvent ? a.attachEvent("on" + b, c) : a["on" + b] = c;
        },
        remove: function(a, b, c) {
            a.removeEventListener ? a.removeEventListener(b, c, !1) : a.detachEvent ? a.detachEvent("on" + b, c) : a["on" + b] = null;
        }
    };
}());