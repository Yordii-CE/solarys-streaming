if (!localStorage.getItem("user-new")) {
  location.href = "register_step1.html";
}

const $form = document.getElementById("form");
const $info = document.getElementById("info");
const $checkboxes = Array.from(
  $form.querySelectorAll('input[type="checkbox"]')
);

$form.addEventListener("submit", async (e) => {
  let allDisabled = true;
  $checkboxes.forEach(function (checkbox) {
    if (checkbox.checked) {
      allDisabled = false;
    }
  });

  if (allDisabled) return;
  e.preventDefault();

  let user = JSON.parse(localStorage.getItem("user-new"));
  let preferences = $checkboxes
    .filter((chk) => chk.checked)
    .map((el) => el.value);

  let userNew = {
    ...user,
    preferences: preferences.join(","),
  };

  localStorage.setItem("user-new", JSON.stringify(userNew));
  localStorage.removeItem("user-new");

  const res = await fetch(`http://localhost/jhonatan/solarys/users`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(userNew),
    }),
    json = await res.json();

  json.status == 200 //porque puede ser ok() pero sin data
    ? (() => {
        console.log(json.data.user);
        localStorage.setItem("user", JSON.stringify(json.data.user));
        location.href = "main.html";
      })()
    : (() => {
        $info.classList.remove("d-none");
        $info.textContent = json.details;
      })();
});
