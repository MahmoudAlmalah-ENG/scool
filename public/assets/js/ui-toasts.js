"use strict";
!function () {
    const t = document.querySelector(".toast-ex"), e = document.querySelector(".toast-placement-ex"),
        o = document.querySelector("#showToastAnimation"), s = document.querySelector("#showToastPlacement");
    let a, n, i, r, l;

    function c(o) {
        o && null !== o._element && (e && (e.classList.remove(a), e.querySelector(".ti").classList.remove(a), DOMTokenList.prototype.remove.apply(e.classList, i)), t && (t.classList.remove(a, n), t.querySelector(".ti").classList.remove(a)), o.dispose())
    }

    o && (o.onclick = function () {
        r && c(r), a = document.querySelector("#selectType").value, n = document.querySelector("#selectAnimation").value, t.classList.add(n), t.querySelector(".ti").classList.add(a), r = new bootstrap.Toast(t), r.show()
    }), s && (s.onclick = function () {
        l && c(l), a = document.querySelector("#selectTypeOpt").value, i = document.querySelector("#selectPlacement").value.split(" "), e.querySelector(".ti").classList.add(a), DOMTokenList.prototype.add.apply(e.classList, i), l = new bootstrap.Toast(e), l.show()
    })
}(), $((function () {
    var t, e = -1, o = 0;
    $("#closeButton").on("click", (function () {
        $(this).is(":checked") ? $("#addBehaviorOnToastCloseClick").prop("disabled", !1) : ($("#addBehaviorOnToastCloseClick").prop("disabled", !0), $("#addBehaviorOnToastCloseClick").prop("checked", !1))
    })), $("#showtoast").on("click", (function () {
        var s, a, n = $("#toastTypeGroup input:radio:checked").val(), i = "rtl" === $("html").attr("dir"),
            r = $("#message").val(), l = $("#title").val() || "", c = $("#showDuration"), p = $("#hideDuration"),
            u = $("#timeOut"), d = $("#extendedTimeOut"), h = $("#showEasing"), m = $("#hideEasing"),
            v = $("#showMethod"), k = $("#hideMethod"), f = o++, y = $("#addClear").prop("checked");
        s = void 0 === toastr.options.positionClass ? "toast-top-right" : toastr.options.positionClass, toastr.options = {
            maxOpened: 1,
            autoDismiss: !0,
            closeButton: $("#closeButton").prop("checked"),
            debug: $("#debugInfo").prop("checked"),
            newestOnTop: $("#newestOnTop").prop("checked"),
            progressBar: $("#progressBar").prop("checked"),
            positionClass: $("#positionGroup input:radio:checked").val() || "toast-top-right",
            preventDuplicates: $("#preventDuplicates").prop("checked"),
            onclick: null,
            rtl: i
        }, s != toastr.options.positionClass && (toastr.options.hideDuration = 0, toastr.clear()), $("#addBehaviorOnToastClick").prop("checked") && (toastr.options.onclick = function () {
            alert("You can perform some custom action after a toast goes away")
        }), $("#addBehaviorOnToastCloseClick").prop("checked") && (toastr.options.onCloseClick = function () {
            alert("You can perform some custom action when the close button is clicked")
        }), c.val().length && (toastr.options.showDuration = parseInt(c.val())), p.val().length && (toastr.options.hideDuration = parseInt(p.val())), u.val().length && (toastr.options.timeOut = y ? 0 : parseInt(u.val())), d.val().length && (toastr.options.extendedTimeOut = y ? 0 : parseInt(d.val())), h.val().length && (toastr.options.showEasing = h.val()), m.val().length && (toastr.options.hideEasing = m.val()), v.val().length && (toastr.options.showMethod = v.val()), k.val().length && (toastr.options.hideMethod = k.val()), y && (r = function (t) {
            return t = t || "Clear itself?", t + '<br /><br /><button type="button" class="btn btn-secondary clear">Yes</button>'
        }(r), toastr.options.tapToDismiss = !1), r || (++e === (a = ["Don't be pushed around by the fears in your mind. Be led by the dreams in your heart.", '<div class="mb-3"><input class="input-small form-control" value="Textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div class="d-flex"><button type="button" id="okBtn" class="btn btn-primary btn-sm me-2">Close me</button><button type="button" id="surpriseBtn" class="btn btn-sm btn-secondary">Surprise me</button></div>', "Live the Life of Your Dreams", "Believe in Your Self!", "Be mindful. Be grateful. Be positive.", "Accept yourself, love yourself!"]).length && (e = 0), r = a[e]);
        var b = toastr[n](r, l);
        t = b, void 0 !== b && (b.find("#okBtn").length && b.delegate("#okBtn", "click", (function () {
            alert("you clicked me. i was toast #" + f + ". goodbye!"), b.remove()
        })), b.find("#surpriseBtn").length && b.delegate("#surpriseBtn", "click", (function () {
            alert("Surprise! you clicked me. i was toast #" + f + ". You could perform an action here.")
        })), b.find(".clear").length && b.delegate(".clear", "click", (function () {
            toastr.clear(b, {force: !0})
        })))
    })), $("#clearlasttoast").on("click", (function () {
        toastr.clear(t)
    })), $("#cleartoasts").on("click", (function () {
        toastr.clear()
    }))
}));
