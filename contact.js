function submitForm (form) {
  //form.action = "example.com";
  //Data validation
  let phone = document.getElementById("phone").value;
  let email = document.getElementById("email").value;
  document.getElementById("phone").style.backgroundColor = "White";
  document.getElementById("email").style.backgroundColor = "White";
  console.log(phone);
  console.log(email);

  if (phone == "" && email == "") {
    let confirmAction = confirm("Submitting the form without any contact details will not allow the restaurant to respond to your submission.\nSubmit anyway?");
      if (confirmAction) {
        document.getElementById("submit-button").style.backgroundImage = "linear-gradient(darkgray, gray)"
        alert("The contact form has been submitted.");
        return false;
      } else {
        return false;
      }
    }

  phone = phone.replace(/-/g, "");
  phone = phone.replace("(", "");
  phone = phone.replace(")", "");
  phone = phone.replace(" ", "");
  console.log(phone);

  if (phone.length != 10) {
    document.getElementById("phone").style.backgroundColor = "Yellow";
    alert("Phone number is invalid");
    return false;
  }
  if (!email.includes("@") || !email.includes(".")) {
    document.getElementById("email").style.backgroundColor = "Yellow";
    alert("Email address is invalid");
    return false;
  }
  document.getElementById("submit-button").style.backgroundImage = "linear-gradient(darkgray, gray)"
  alert("The contact form has been submitted.");
  return false;
}
