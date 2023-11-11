let handleViewPassword = function () {
    let input = $(this).prev();
    let inputType = input.prop("type");

    if (inputType == "text") {
        $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
        input.prop({ type: "password" });
    } else {
        $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
        input.prop({ type: "text" });
    }
};

$("input:password").next(".btn").on("click", handleViewPassword);