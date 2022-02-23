var btn = document.getElementById("login_btn");

btn.addEventListener("click", function(){
	var name = document.getElementById("name").value;
	var pass = document.getElementById("pass").value;
	if(name === "Marcos" && pass === "xyz123")
	{
		location.href = "employee_page.html";
	}
	if(name === "Aaron" && pass === "abc789")
	{
		location.href = "manager_page.html";
	}
});
