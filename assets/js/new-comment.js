const session_username = sessionStorage.getItem("data");
// console.log(session_username);
$("#new_comment").submit(function (e) {
  if ($(".alert-success")) {
    $(".alert-success").remove();
  }

  // prevent reloading of page
  e.preventDefault();
  const postId = window.location.search.substr(1).split("=")[1];
  // console.log(postId);
  $.ajax({
    url: "./new_comment_ajax.php",
    type: "POST",
    data: {
      create_comment: "",
      id: postId,
      comment: $("#comment").val(),
    },
    success: function (resp) {
      resp = JSON.parse(resp);
      // console.log(resp);
      if (!resp.status) {
        // show errors
        console.log("Something went wrong");
      } else {
        $("#create_comment").after(`
        <div class="comment_success alert alert-success mt-3" role="alert">
            <strong>Dein Kommentar wurde gespeichert</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-success">&times;</span>
            </button>
        </div>`);
        $("#comment").val("");
        $.ajax({
          url: "./new_comment_ajax.php",
          type: "POST",
          data: {
            get_comments: "",
            id: postId,
          },
          success: function (resp) {
            resp = JSON.parse(resp);
            // console.log(resp);
            if (!resp.status) {
              console.log("Something went wrong");
            } else {
              // console.log(resp);
              $(".comment_container").html("");
              resp.data.forEach((comment) => {
                const template = `
                <div class="card shadow-lg p-3 mb-4 rounded text-dark posted-comments">
                    <div class="container">
                        <div class="row mb-4 mt-1 avatar-center">
                            <div class="col user_profilepic text-left">
                                <img id="profilepic" class="bg-light rounded-circle p-2" src="https://robohash.org/${
                                  comment.username
                                }.png?set=set4" alt="kitty user profilepic">
                            </div>
                            <div class="col post_user_date text-right">
                                <p><strong>${
                                  comment.username[0].toUpperCase() +
                                  comment.username.slice(1)
                                }</strong></p>
                                <p><small>gepostet am ${
                                  comment.post_date
                                }</small></p>
                            </div>
                        </div>
                        <div class="comment">
                            <p>${comment.comment}</p>
                        </div>
                    </div>
                </div>
              `;

                $(".comment_container").append(template);
              });
            }
          },
        });
      }
    },
  });
});
