export function Feedback({ message, className }) {
    let feedbackElement = $(
        `<p class="feedback text-${className} m-0"> ${message} </p>`
    );
    setTimeout(() => {
        feedbackElement.remove();
    }, 1500);
    return feedbackElement;
}

export function Alert({ message, className }) {
    let feedbackElement = $(
        `<div class="alert alert-${className} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
        </div>`
    );
    setTimeout(() => {
        feedbackElement.remove();
    }, 1500);
    return feedbackElement;
}

export function handleButtonToggling(
    button,
    buttonStatus = "disabled",
    text = ""
) {
    if (buttonStatus == "disabled") {
        button.prop({ disabled: true });
        button.html(
            `<span class="spinner"><i class="fas fa-spinner icon"></i></span>`
        );
        return;
    }

    button.html(text);
    button.prop({ disabled: false });
}
