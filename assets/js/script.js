function login() {
  document.querySelector("input[type='text']").value = "tesfay";
  document.querySelector("input[type='password']").value = "Avdc12$sd";
  document.querySelector("input[type='submit']").click();
}

function reload() {
  location.reload();
  console.log("reloaded");
  setTimeout(1000);
  login();
  console.log("tried login");
}

// setInterval(reload, 5000);
