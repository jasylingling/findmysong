let mic, recorder, soundFile, record_button, play_button, soundBlob;
let state = 0; // mousePress will increment from Record, to Stop, to Play

function setup() {
  noCanvas();

  // create an audio in
  mic = new p5.AudioIn();

  // users must manually enable their browser microphone for recording to work properly!
  mic.start();

  // create a sound recorder
  recorder = new p5.SoundRecorder();

  // connect the mic to the recorder
  recorder.setInput(mic);

  // create an empty sound file that we will use to playback the recording
  soundFile = new p5.SoundFile();
  userStartAudio(record_button);
  record_button = select(".record");
  record_button.mouseClicked(recordSound);
  play_button = select(".play");
  play_button.mouseClicked(playSound);
}

function recordSound() {
  // use the '.enabled' boolean to make sure user enabled the mic (otherwise we'd record silence)
  if (state === 0 && mic.enabled) {
    select(".record").html("Stop");

    $(".record").removeClass("btn-primary");
    $(".record").addClass("btn-danger");
    // Tell recorder to record to a p5.SoundFile which we will use for playback
    recorder.record(soundFile);

    state++;
  } else if (state === 1) {
    $(".record").addClass("btn-primary");
    $(".record").removeClass("btn-danger");
    $(".play").removeClass("btn-outline-light");
    $(".play").addClass("btn-success");

    select(".record").html("Record");
    recorder.stop(); // stop recorder, and send the result to soundFile

    state = 0;
  }
}

function playSound() {
  if (state == 0 && soundFile) {
    soundFile.play();
    // console.log(soundFile)
    soundBlob = soundFile.getBlob();
    console.log(soundBlob);
  }
}

$("#new_post").submit(function (e) {
  // prevent reloading of page
  e.preventDefault();

  const form = document.querySelector("#new_post");
  // Now we can send the blob to a server...
  let serverUrl = "./new_post_ajax.php";

  const formData = new FormData(form);
  const filename = new Date().toISOString();
  if (soundBlob) {
    formData.append("soundBlob", soundBlob, filename);
  }
  formData.append("create_post", "");
  console.log(formData);
  fetch(serverUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (!data.status) {
        // show errors
        if ($(".post_error")) {
          $(".post_error").remove();
        }

        $("#post_heading").after(`
        <div class="post_error alert alert-danger mt-3" role="alert">
          <strong>${data.condition}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-danger">&times;</span>
          </button>
        </div>
        `);
      } else {
        // Success Post Button Trigger Modal
        $("#post_heading").after(`
        <div id="success-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="success-post">
          <div class="modal-dialog modal-dialog-centered text-dark" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Post erstellt</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                YAY - der Post wurde erfolgreich erstellt!
              </div>
              <div class="modal-footer">
                <a href="forum" class="btn btn-primary btn-xl">Zurück zur Übersicht</a>
              </div>
            </div>
          </div>
        </div>
        `);
        $("#success-modal").modal("show");
      }
    });
});
