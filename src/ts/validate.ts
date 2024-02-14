const form: HTMLFormElement = document.querySelector("form") as HTMLFormElement;
const username: HTMLInputElement = document.getElementById(
  "username",
) as HTMLInputElement;
const error: HTMLDivElement = document.getElementById(
  "error",
) as HTMLDivElement;

function validateUsername() {
  const regex: RegExp = /^[a-z_.]+$/;

  if (username.value.match(regex)) {
    error.textContent = "";
    return true;
  } else {
    error.textContent =
      "Username can only contain lowercase letters, underscores, and periods.";
    return false;
  }
}

form.addEventListener("submit", function (event) {
  if (!validateUsername()) {
    event.preventDefault();
  }
});
