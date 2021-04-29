let search_song;
$("#song_submit").hide();
document.querySelector("#song_search").addEventListener("click", (e) => {
  e.preventDefault();
  search_song = document.querySelector("#artist").value.toLowerCase();
  const artist = document.querySelector("#artist").value.replace(/ /g, "+");
  const song = document.querySelector("#song").value.replace(/ /g, "+");

  try {
    getData(artist, song);
  } catch (e) {
    console.log(e);
  }
});

async function getData(artist, song) {
  const response = await fetch(
    `https://itunes.apple.com/search?term=${artist}+${song}&entity=song&media=music`
  );
  const data = await response.json();

  createBox(data);
}

function createBox(data) {
  $("#song_submit").fadeIn("slow");
  // console.log(data);
  document.querySelector(".preview").innerHTML = `
  <div class="song_information"><strong>${data.results[0].artistName} - ${data.results[0].trackName}</strong></div>
  <audio class="post_audio" controls>
    <source src="${data.results[0].previewUrl}" type="audio/x-m4a">
  </audio>`;

  sendData(
    data.results[0].previewUrl,
    data.results[0].artistName,
    data.results[0].trackName
  );
}

function sendData(url, artist, song) {
  $("#proposal_form").submit(function (e) {
    e.preventDefault();
    const postId = window.location.search.substr(1).split("=")[1];
    $.ajax({
      url: "./new_comment_ajax.php",
      type: "POST",
      data: {
        song_submit: "",
        url: url,
        artist: artist,
        song: song,
        post_id: postId,
      },
      success: function (resp) {
        resp = JSON.parse(resp);

        if (!resp.status) {
          console.log("error");
        } else {
          window.location.href = "./post?id=" + postId;
        }
      },
    });
  });
}
