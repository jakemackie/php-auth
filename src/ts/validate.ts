const form: HTMLFormElement = document.querySelector("form") as HTMLFormElement;
const username: HTMLInputElement = document.getElementById(
  "username",
) as HTMLInputElement;
const error: HTMLDivElement = document.getElementById(
  "error",
) as HTMLDivElement;

function validateUsername() {
  const regex: RegExp = /^[a-z0-9_-]{3,15}$/;

  if (username.value.length < 3 || username.value.length > 15) {
    error.textContent = "Username must be between 3 and 15 characters long.";
    return false;
  }

  if (username.value.match(regex)) {
    error.textContent = "";
    return true;
  } else {
    error.textContent =
      "Username can only contain lower case letters, numbers and underscores.";
    return false;
  }
}

form.addEventListener("submit", function (event: Event) {
  if (!validateUsername()) {
    event.preventDefault();
  }
});

function togglePasswordVisibility() {
  const password: HTMLInputElement = document.getElementById(
    "password",
  ) as HTMLInputElement;
  const passwordHidden = document.getElementById("eye-off") as HTMLElement;
  const passwordVisible = document.getElementById("eye") as HTMLElement;

  if (password.type === "password") {
    password.type = "text";
    passwordHidden.classList.toggle("hidden");
    passwordVisible.classList.toggle("hidden");
  } else {
    password.type = "password";
    passwordHidden.classList.toggle("hidden");
    passwordVisible.classList.toggle("hidden");
  }
}
