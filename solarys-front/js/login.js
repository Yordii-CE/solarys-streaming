if (localStorage.getItem("user")) {
  location.href = "main.html";
}

const $form = document.getElementById("form");
const $info = document.getElementById("info");

$form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const res = await fetch(
      `http://localhost/jhonatan/solarys/users/${$form.email.value}/${$form.password.value}`
    ),
    json = await res.json();

  console.log(json.status == 200 && json.data);
  json.status == 200 && json.data //porque puede ser ok() pero sin data
    ? (() => {
        localStorage.setItem("user", JSON.stringify(json.data.user));
        location.href = "main.html";
      })()
    : (() => {
        $info.classList.remove("d-none");
        $info.textContent = json.details;
      })();
});
