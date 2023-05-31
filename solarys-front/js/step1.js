const $form = document.getElementById("form");

$form.addEventListener("submit", async (e) => {
  e.preventDefault();
  let userNew = {
    email: $form.email.value,
    password: $form.password.value,
  };

  localStorage.setItem("user-new", JSON.stringify(userNew));

  location.href = "register_step2.html";
});
