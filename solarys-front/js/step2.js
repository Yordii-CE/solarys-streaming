if (!localStorage.getItem("user-new")) {
  location.href = "register_step1.html";
}

const $form = document.getElementById("form");

$form.addEventListener("submit", async (e) => {
  e.preventDefault();
  let user = JSON.parse(localStorage.getItem("user-new"));
  let userNew = {
    ...user,
    isPremium: $form.type.value,
  };

  localStorage.setItem("user-new", JSON.stringify(userNew));

  location.href = "register_step3.html";
});
