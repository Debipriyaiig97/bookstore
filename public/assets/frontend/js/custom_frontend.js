/* ***************************************************************
  ==========disabling default behave of form submits start==========
  *****************************************************************/

$("#ajaxForm").attr("onsubmit", "return false");
$(document.getElementsByClassName("ajaxForm")).attr("onsubmit", "return false");

/* *************************************************************
==========disabling default behave of form submits end==========
***************************************************************/

/* ***************************************************
  ==========Form Submit with AJAX Request Start==========
  ******************************************************/

$(document).on("click", "#submitBtn", function (e) {
    $(e.target).attr("disabled", true);
    $(".request-loader").addClass("show");

    let ajaxForm = document.getElementById("ajaxForm");
    let fd = new FormData(ajaxForm);
    let url = $("#ajaxForm").attr("action");
    let method = $("#ajaxForm").attr("method");

    $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
            $(e.target).attr("disabled", false);
            $(".request-loader").removeClass("show");

            $(".em").each(function () {
                $(this).html("");
            });

            if (data == "success") {
                location.reload();
            }

            // if error occurs
            else if (typeof data.error != "undefined") {
                for (let x in data) {
                    if (x == "error") {
                        continue;
                    }
                    document.getElementById("err" + x).innerHTML = data[x][0];
                }
            }
        },
        error: function (error) {
            $(".em").each(function () {
                $(this).html("");
            });
            for (let x in error.responseJSON.errors) {
                document.getElementById("err" + x).innerHTML =
                    error.responseJSON.errors[x][0];
            }
            $(".request-loader").removeClass("show");
            $(e.target).attr("disabled", false);
        },
    });
});

/* ***************************************************
==========Form Submit with AJAX Request End==========
******************************************************/
  
/* ***************************************************
==========Form Submit with AJAX Request Start==========
******************************************************/
$(document).on("click", ".submitBtn", function (e) {
    $(e.target).attr("disabled", true);

    $(".request-loader").addClass("show");

    let ajaxForm = $(e.target).parent().closest("form");
    let fd = new FormData(ajaxForm[0]);
    let url = ajaxForm.attr("action");
    let method = ajaxForm.attr("method");

    $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
            $(e.target).attr("disabled", false);
            $(".request-loader").removeClass("show");

            $(".em").each(function () {
                $(this).html("");
            });

            if (data == "success") {
                location.reload();
            }

            else if (data.status == 'leadInsert') {
                window.location.href = `${data.data.url}`;
            }

            else if (data.status == 'ErrorToastr') {
                console.log(data.message);
                toastr.error(`${data.message}`, {timeOut: 2500});
            }

            // if error occurs
            else if (typeof data.error != "undefined") {
                for (let x in data) {
                    if (x == "error") {
                        continue;
                    }
                    // ajaxForm.find("[name='" + x + "']").next('.em').html(data[x][0]);
                    ajaxForm
                        .find("[name='" + x + "']")
                        .after(
                            `<p class="mb-0 text-danger em">${data[x][0]}</p`
                        );
                }
            }
        },
        error: function (error) {
            $(".em").each(function () {
                $(this).html("");
            });
            for (let x in error.responseJSON.errors) {
                // ajaxForm.find("[name='" + x + "']").next('.em').html(error.responseJSON.errors[x][0]);
                ajaxForm
                    .find("[name='" + x + "']")
                    .after(
                        `<p class="mt-0 mb-0 text-danger em">${error.responseJSON.errors[x][0]}</p`
                    );
            }
            $(".request-loader").removeClass("show");
            $(e.target).attr("disabled", false);
        },
    });
});

/* ***************************************************
==========Form Submit with AJAX Request End==========
******************************************************/