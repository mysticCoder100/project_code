import {
    Alert,
    Feedback,
    handleButtonToggling,
} from "./Components/FormModule.js";

import { handleOpenPaymentFields, paymentControls } from "./landing.js";

$("#bookVisitation").on("submit", async function (e) {
    e.preventDefault();
    let form = $(this);
    let fields = new FormData(form[0]);
    let button = form.find("button[type='submit']");
    let buttonText = button.html();

    form.find(".feedback").remove();
    handleButtonToggling(button);

    let wantAcocmodation = form.find("#want_accomodation").val();

    try {
        let bookVisitation = await $.ajax({
            method: "POST",
            url: "book-visitation",
            data: fields,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
        });
        handleButtonToggling(button, "enabled", buttonText);
        let message = bookVisitation.message;
        Alert({
            message,
            className: "success",
        }).insertAfter(form.find(".landing-section-title"));
        form.find("input").val("");
        setTimeout(() => {
            let controlIndex =
                wantAcocmodation === "true" ? 1 : paymentControls.length - 1;
            paymentControls.forEach((control) => {
                $(control).removeClass("my-active");
            });
            $(paymentControls[controlIndex]).addClass("my-active");
            handleOpenPaymentFields(controlIndex);
        }, 1000);
    } catch (error) {
        handleButtonToggling(button, "enabled", buttonText);
        let errorMessages = error.responseJSON.errors;
        for (const itemKey in errorMessages) {
            let inputField = form.find(`[data-content=${itemKey}]`).parent();

            inputField.append(
                Feedback({
                    className: "danger",
                    message: errorMessages[itemKey],
                })
            );
        }
    }
});

$("#bookAccomodation").on("submit", async function (e) {
    e.preventDefault();
    let form = $(this);
    let fields = new FormData(form[0]);
    let button = form.find("button[type='submit']");
    let buttonText = button.html();

    form.find(".feedback").remove();
    handleButtonToggling(button);

    try {
        let bookAccomodation = await $.ajax({
            method: "POST",
            url: "book-accomodation",
            data: fields,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
        });
        handleButtonToggling(button, "enabled", buttonText);
        let message = bookAccomodation.message;
        Alert({
            message,
            className: "success",
        }).insertAfter(form.find(".landing-section-title"));
        form.find("input").val("");
        setTimeout(() => {
            let currentIndex = paymentControls.findIndex((control) =>
                $(control).hasClass("my-active")
            );
            let nextIndex = currentIndex + 1;
            console.log(nextIndex);
            paymentControls.forEach((control) => {
                $(control).removeClass("my-active");
            });
            $(paymentControls[nextIndex]).addClass("my-active");
            handleOpenPaymentFields(nextIndex);
        }, 1000);
    } catch (error) {
        handleButtonToggling(button, "enabled", buttonText);
        let errorMessages = error.responseJSON.errors;
        let message = error.responseJSON.message;
        let responseStatus = error.status;

        if (responseStatus != 422) {
            Alert({
                message,
                className: "danger",
            }).insertAfter(form.find(".landing-section-title"));

            return;
        }

        for (const itemKey in errorMessages) {
            let inputField = form.find(`[data-content=${itemKey}]`).parent();

            inputField.append(
                Feedback({
                    className: "danger",
                    message: errorMessages[itemKey],
                })
            );
        }
    }
});

$("#makePayment").on("submit", async function (e) {
    e.preventDefault();
    let form = $(this);
    let fields = new FormData(form[0]);
    let button = form.find("button[type='submit']");
    let buttonText = button.html();

    form.find(".feedback").remove();
    handleButtonToggling(button);

    try {
        let makePayment = await $.ajax({
            method: "POST",
            url: "make-payment",
            data: fields,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
        });
        handleButtonToggling(button, "enabled", buttonText);
        let message = makePayment.message;
        Alert({
            message,
            className: "success",
        }).insertAfter(form.find(".landing-section-title"));
        form.find("input").val("");
        if (makePayment.data) {
            location.href = makePayment.data.authorization_url;
        }
    } catch (error) {
        handleButtonToggling(button, "enabled", buttonText);
        let errorMessages = error.responseJSON.errors;
        let message = error.responseJSON.message;
        let responseStatus = error.status;

        if (responseStatus != 422) {
            Alert({
                message,
                className: "danger",
            }).insertAfter(form.find(".landing-section-title"));

            return;
        }

        for (const itemKey in errorMessages) {
            let inputField = form.find(`[data-content=${itemKey}]`).parent();
            console.log(itemKey);
            inputField.append(
                Feedback({
                    className: "danger",
                    message: errorMessages[itemKey],
                })
            );
        }
    }
});
