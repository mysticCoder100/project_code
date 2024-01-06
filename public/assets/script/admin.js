let toggleSidebarDropdown = function () {
    let parent = $(this).parent();
    let parentSiblings = parent.siblings(".sidebar-dropdown");

    parentSiblings.removeClass("open");
    parent.toggleClass("open", !parent.hasClass("open"));
};

const visitationMonitor = document.getElementById("visitationMonitor");
const visitationRange = document.getElementById("visitationRange");

if (visitationMonitor !== null && visitationRange !== null) {
    new Chart(visitationMonitor, {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [
                {
                    label: "# of Visitations",
                    data: [12, 19, 3, 15, 16, 18, 19, 3, 5, 2, 3],
                    borderWidth: 1,
                    backgroundColor: ["#76385c"],
                    borderColor: ["#76385c"],
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });

    new Chart(visitationRange, {
        type: "bar",
        data: {
            labels: ["with guesthouse", "without guesthouse"],
            datasets: [
                {
                    label: "# of Visitations",
                    data: [33, 48],
                    borderWidth: 1,
                    backgroundColor: ["#76385c", "#008000"],
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}

$(".sidebar-dropdown_toggle").on("click", toggleSidebarDropdown);

$("#myListTable").DataTable({
    responsive: true,
});

function openEditAttractionModal(element) {
    let { target, id, table } = $(element).data();
    let data = { target, id, table };
    $.ajax({
        type: "get",
        url: "edit-attractions-content",
        data: data,
        dataType: "JSON",
        success: function (response) {
            let input = $(target).find(".form-control[type!='file']");
            let elementId = [...input].map((el) => el.id);
            $.each(elementId, function (i, e) {
                let value = response[e];
                $(target).find(`.form-control#${e}`).val(value);
            });
            $(target).modal("show");
        },
        error: function (response) {
            // console.log(response);
        },
    });
}

function openEditAccomodationModal(element) {
    let { target, id, table } = $(element).data();
    let data = { target, id, table };
    $.ajax({
        type: "get",
        url: "edit-accomodations-content",
        data: data,
        dataType: "JSON",
        success: function (response) {
            let input = $(target).find(".form-control[type!='file']");
            let elementId = [...input].map((el) => el.id);
            $.each(elementId, function (i, e) {
                let value = response[e];
                $(target).find(`.form-control#${e}`).val(value);
            });
            $(target).modal("show");
        },
        error: function (response) {
            // console.log(response);
        },
    });
}

function openEditAddministratorModal(element) {
    let { target, id, table } = $(element).data();
    let data = { target, id, table };
    $.ajax({
        type: "get",
        url: "edit-administrators-content",
        data: data,
        dataType: "JSON",
        success: function (response) {
            let input = $(target).find(".form-control[type!='file']");
            let elementId = [...input].map((el) => el.id);
            $.each(elementId, function (i, e) {
                let value = response[e];
                $(target).find(`.form-control#${e}`).val(value);
            });
            $(target).modal("show");
        },
        error: function (response) {
            // console.log(response);
        },
    });
}
