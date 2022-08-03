$(document).ready(function () {
    console.log("Entrando al WIZARD");
    var flagNO, flagSI;
    $("#form").steps({
        headerTag: "h1",
        transitionEffect: "fade",
            labels: {
                previous: 'Anterior',
                next: 'Siguiente',
                finish: 'Enviar',
                current: ''
            },
            bodyTag: "fieldset",
            titleTemplate: '<h1 class="title">#title#</h1>',
            onStepChanging: function (event, currentIndex, newIndex) {
                // Always allow going backward even if the current step contains invalid fields!
                console.log("CURRENT INDEX: " + currentIndex);
                console.log("NEW INDEX: " + newIndex);
                // PREVIUOS FORM
                var form = $(this);
                if (currentIndex > newIndex) {
                    flagNO = false;
                    flagSI = true;
                    form.trigger('reset');
                    console.log("fun onStepChanging (1): " + currentIndex + " |> " + newIndex + "||:> " + flagNO);
                    return true;
                }
                // Forbid suppressing "Warning" step if the user is to young
                // Clean up if user went backward before
                // NEXT FORM
                if (currentIndex < newIndex) {
                    flagNO = true;
                    flagSI = false;
                    console.log("fun onStepChanging (1): " + currentIndex + " |> " + newIndex + "||:> " + flagNO);
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }
                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";
                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                console.log("CURRENT INDEXX: " + currentIndex);
                console.log("PRIOR INDEXX: " + priorIndex);
                if (currentIndex === 1 && priorIndex === 2 && flagNO === false) {
                    $(this).steps("previous");
                    return;
                }
                if (currentIndex === 4 && priorIndex === 5 && flagNO === false) {
                    $(this).steps("previous");
                    return;
                }
                if (currentIndex === 3 && priorIndex === 4 && flagNO === false) {
                    $(this).steps("previous");
                    return;
                }
                if (currentIndex === 2 && priorIndex === 3 && flagNO === false) {
                    $(this).steps("previous");
                    return;
                }
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && $('#flexRadioDefault2').is(':checked') && flagNO === true) {
                        console.log("fun onStepChanged (2): STEP: " + currentIndex + " |> ");
                        $(this).steps("next");
                    }
                if (currentIndex === 3 && $('#flexRadioDefault2').is(':checked') && flagNO === true) {
                        console.log("fun onStepChanged (3): STEP: " + currentIndex + " |> ");
                        $(this).steps("next");
                    }
                if (currentIndex === 4 && $('#flexRadioDefault2').is(':checked') && flagNO === true) {
                        console.log("fun onStepChanged (4): STEP: " + currentIndex + " |> ");
                        $(this).steps("next");
                    }
                if (currentIndex === 1 && $('#flexRadioDefault1').is(':checked') && flagNO === true) {
                    console.log("fun onStepChanged (1): STEP: " + currentIndex + " |> ");
                    $(this).steps("next");
                }
            },
            onFinishing: function (event, currentIndex) {
                var form = $(this);
                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";
                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                var form = $(this);
                // Submit form input
                form.submit();
            },
        })
        .validate({
            errorPlacement: function (error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password",
                },
            },
        });
});