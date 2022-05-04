function alphanumeric(input_user, input_pass)
{ 
    var letters = /^[0-9a-zA-Z]+$/;

    if(input_user.value.match(letters))
    {
        return true;
    }
    else
    {
        input_user.value = "";
        return false;
    }
    
    if(input_pass.value.match(letters))
    {
        return true;
    }
    else
    {
        input_user.value = "";
        return false;
    }
    
    
}

