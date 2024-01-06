export let paymentControls = [...$(".payment-section .controls .btn")];

$(window).on("load", () => {
    let index = paymentControls.findIndex((control) =>
        $(control).hasClass("my-active")
    );
    handleOpenPaymentFields(index);
});

paymentControls.forEach((control, index) => {
    $(control).on("click", function () {
        $(this).siblings().removeClass("my-active");
        $(this).addClass("my-active");
        handleOpenPaymentFields(index);
    });
});

let toggleNavLinks = function () {
    let linkGroup = $(this).parent().next();
    let linkGroupHeight = linkGroup[0].scrollHeight;
    linkGroup.toggleClass("open", !linkGroup.hasClass("open"));
    if (linkGroup.hasClass("open")) {
        linkGroup.css({ "--height": `${linkGroupHeight}px` });
        $(this).html(`<i class="fa fa-times"></i>`);
        return;
    }
    linkGroup.css({ "--height": 0 });
    $(this).html(`<i class="fa fa-bars"></i>`);
};

let toggleFormModal = function () {
    handleOpenLoginForm();
    let formModal = $("#userFormModal");
    formModal.modal("show");
};

let handleOpenLoginForm = function () {
    $("#userFormModal").find(".modal-title").text("Login");
    $("#loginForm").addClass("show");
    $("#registerForm").removeClass("show");
};

let handleCloseLoginForm = function () {
    $("#userFormModal").find(".modal-title").text("Register");
    $("#loginForm").removeClass("show");
    $("#registerForm").addClass("show");
};

export let handleOpenPaymentFields = (index) => {
    let fields = [...$(".payment-section form")];
    fields.forEach((field, i) => {
        $(field).toggleClass("my-active", i == index);
    });
};

$("#userFormModal .register").on("click", handleCloseLoginForm);
$("#userFormModal .login").on("click", handleOpenLoginForm);
$(".nav-toggle").on("click", toggleNavLinks);
$("#userFormToggler").on("click", toggleFormModal);
