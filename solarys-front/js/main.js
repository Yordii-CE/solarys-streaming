if (!localStorage.getItem("user")) {
  location.href = "login.html";
}

const $user = JSON.parse(localStorage.getItem("user"));
const preferences = $user.preferences.split(",");
const $btnUpgrade = document.getElementById("btn-upgrade");

if ($user.isPremium == "yes") $btnUpgrade.classList.add("d-none");

document.addEventListener("DOMContentLoaded", async (e) => {
  const res = await fetch(`http://localhost/jhonatan/solarys/movies`),
    json = await res.json();

  let all = json.data.movies;
  let movies = [];

  for (let i = 0; i < all.length; i++) {
    const movie = json.data.movies[i];

    for (let j = 0; j < preferences.length; j++) {
      const genre = preferences[j];

      if (movie.genre == genre) movies.push(movie);
    }
  }

  console.log($user);

  if ($user.isPremium == "no") {
    movies = movies.filter((el) => el.visibility == "free");
    all = all.filter((el) => el.visibility == "free");
  }

  setMovies(movies, "preferences");
  setMovies(all, "popular");
});

function setMovies(movies, containerId) {
  const container = document.getElementById(containerId);

  for (const movie of movies) {
    let url = movie.url.replace(/watch\?v=/, "embed/");
    container.innerHTML += `<iframe
    width="560"
    height="315"
    src="${url}"
    title="YouTube video player"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen
  ></iframe>    `;
  }
}
