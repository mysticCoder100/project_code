function openViewModal(element) {
    let { target, id, table } = $(element).data();
    let data = { target, id, table };

    let pushRecord = ({ title, value }) => {
        let record = `
            <div class="record">
                <p>${title}:</p>
                <p>${value}</p>
            </div>`;

        $(".records").append(record);
    };

    $.ajax({
        type: "get",
        url: "get-payment-info",
        data: data,
        dataType: "JSON",
        success: function (response) {
            let wantedFields = {
                name: "Name",
                email: "Email",
                amount: "Amount",
                visitor_number: "Number of Visitor(s)",
                want_accomodation: "Opt for Accomodation",
                accomodation_count: "Number of room booked",
                payment_status: "Payment Status",
                visitation_date: "Visit on",
                created_at: "Booked on",
            };
            let fieldKey = [];
            for (const key in wantedFields) {
                fieldKey.push(key);
            }
            $(".records").empty();
            $.each(fieldKey, function (i, e) {
                let value = response[e];
                if (value == null || value == "false") {
                    return;
                }

                if (e == "payment_status") {
                    value = value == 1 ? "paid" : "unpaid";
                } else if (value == "true") {
                    value = "Yes";
                }
                pushRecord({
                    title: wantedFields[e],
                    value: value,
                });
            });
            $(target).modal("show");
        },
        error: function (response) {
            // console.log(response);
        },
    });
}
