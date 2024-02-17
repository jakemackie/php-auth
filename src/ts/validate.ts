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
