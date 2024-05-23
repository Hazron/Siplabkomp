$(document).ready(function () {
    $("#editJadwalModal").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);
        const id = button.data("id");

        $.ajax({
            url: "/jadwal/" + id + "/edit",
            method: "GET",
            success: function (data) {
                $("#editJadwalId").val(data.id_jadwal);
                $("#user_id").val(data.user_id);
                // Isi field lainnya sesuai dengan data yang didapatkan
            },
        });

        $("#editJadwalForm").attr("action", "/jadwal/" + id);
    });

    $("#editJadwalForm").on("submit", function (e) {
        e.preventDefault();

        const form = $(this);
        const actionUrl = form.attr("action");

        $.ajax({
            url: actionUrl,
            method: "POST",
            data: form.serialize(),
            success: function (response) {
                $("#editJadwalModal").modal("hide");
                location.reload();
            },
            error: function (response) {
                alert("Error updating jadwal");
            },
        });
    });
});
