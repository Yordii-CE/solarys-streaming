if (!localStorage.getItem("user")) {
  location.href = "login.html";
}

const $form = document.getElementById("form");
const $info = document.getElementById("info");
const $user = JSON.parse(localStorage.getItem("user"));

$form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const res = await fetch(
      `http://localhost/jhonatan/solarys/users/${$user.email}`,
      {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
      }
    ),
    json = await res.json();

  json.status == 200 //porque puede ser ok() pero sin data
    ? (() => {
        localStorage.setItem("user", JSON.stringify(json.data.user));
        location.href = "main.html";
      })()
    : (() => {
        $info.classList.remove("d-none");
        $info.textContent = json.details;
      })();
});
