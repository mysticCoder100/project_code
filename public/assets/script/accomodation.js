import {
    Alert,
    Feedback,
    handleButtonToggling,
} from "./Components/FormModule.js";

$("#addAccomodations").on("submit", async function (e) {
    e.preventDefault();

    let form = $(this);
    let fields = new FormData(form[0]);
    let button = form.find("button[type='submit']");
    let buttonText = button.html();

    form.find(".feedback").remove();
    handleButtonToggling(button);

    try {
        let addAttraction = await $.ajax({
            method: "POST",
            url: "add-accomodations",
            data: fields,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
        });

        handleButtonToggling(button, "enabled", buttonText);
        let message = addAttraction.message;
        console.log(message);
        form.prepend(
            Alert({
                message,
                className: "success",
            })
        );
        form.find("input").val("");
        setTimeout(() => location.reload(true), 500);
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
