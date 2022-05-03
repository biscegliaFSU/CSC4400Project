function submitForm (form) {
  form.action = "example.com";
  document.getElementById("submit-button").style.backgroundImage = "linear-gradient(darkgray, gray)"
  alert("The contact form has been submitted.");
  return false;
}
