$(document).ready(function () {
  $("#login_form").submit(function (e) {
    // prevent reloading of page
    e.preventDefault();
    $.ajax({
      url: "./login_ajax.php",
      type: "POST",
      data: {
        login_submit: "",
        username: $("#username").val(),
        password: $("#password").val(),
      },
      success: function (resp) {
        resp = JSON.parse(resp);
        // console.log(resp);
        if (!resp.status) {
          // show errors
          if ($(".login_error")) {
            $(".login_error").remove();
            $("#login_heading").after(`
            <div class="login_error alert alert-danger mt-3" role="alert">
              <strong>Username oder Passwort falsch</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-danger">&times;</span>
              </button>
            </div>`);
          }
        } else {
          window.location.href = "./forum";
        }
      },
    });
  });

  $("#register_form").submit(function (e) {
    // prevent reloading of page
    e.preventDefault();
    $.ajax({
      url: "./registration_ajax.php",
      type: "POST",
      data: {
        register_submit: "",
        register_username: $("#register_username").val(),
        register_email: $("#register_email").val(),
        register_password: $("#register_password").val(),
        confirm_password: $("#confirm_password").val(),
      },
      success: function (resp) {
        resp = JSON.parse(resp);
        // console.log(resp);
        if (!resp.status) {
          // show errors
          if ($(".registration_error")) {
            $(".registration_error").remove();
          }

          $("#registration_heading").after(`
          <div class="registration_error alert alert-danger mt-3" role="alert">
            <strong>Whoops, es ist ein Fehler aufgetreten!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="text-danger">&times;</span>
            </button>
          </div>
          `);

          if (resp.register_username) {
            $(".input_username").after(`
            <div class="registration_error help-block text-danger">
              <ul role="alert">
                <li>${resp.register_username}</li>
              </ul>
            </div>
            `);
          }

          if (resp.register_email) {
            $(".input_email").after(`
            <div class="registration_error help-block text-danger">
              <ul role="alert">
                <li>${resp.register_email}</li>
              </ul>
            </div>
            `);
          }

          if (resp.register_password) {
            $(".input_password").after(`
            <div class="registration_error help-block text-danger">
              <ul role="alert">
                <li>${resp.register_password}</li>
              </ul>
            </div>
            `);
          }

          if (resp.confirm_password) {
            $(".input_confirm_password").after(`
            <div class="registration_error help-block text-danger">
              <ul role="alert">
                <li>${resp.confirm_password}</li>
              </ul>
            </div>
            `);
          }
        } else {
          window.location.href = "./forum";
        }
      },
    });
  });
});
