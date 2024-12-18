<?php

function validateLocation($input_method, &$formdata, &$errors) {
    $formdata['Name'] = filter_input($input_method, "Name", FILTER_SANITIZE_STRING);
    $formdata['Address'] = filter_input($input_method, "Address", FILTER_SANITIZE_STRING);
    $formdata['FirstName'] = filter_input($input_method, "FirstName", FILTER_SANITIZE_STRING);
    $formdata['LastName'] = filter_input($input_method, "LastName", FILTER_SANITIZE_STRING);
    $formdata['Email'] = filter_input($input_method, "Email", FILTER_SANITIZE_EMAIL);
    $formdata['ContactNumber'] = filter_input($input_method, "ContactNumber", FILTER_SANITIZE_NUMBER_INT);
    $formdata['maxCap'] = filter_input($input_method, "maxCap", FILTER_SANITIZE_NUMBER_INT);
    $formdata['lType'] = filter_input($input_method, "lType", FILTER_SANITIZE_STRING);
    $formdata['facilities'] = filter_input($input_method, "facilities", FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $formdata['link'] = filter_input($input_method, "link", FILTER_SANITIZE_URL);

    if ($formdata['Name'] === NULL ||
                    $formdata['Name'] === FALSE ||
                    $formdata['Name'] === "")
    {
        $errors['Name'] = "name required";
    }
    
    if ($formdata['Address'] === NULL ||
                    $formdata['Address'] === FALSE ||
                    $formdata['Address'] === "")
    {
        $errors['Address'] = "address required";
    }   
    
    if ($formdata['FirstName'] === NULL ||
                    $formdata['FirstName'] === FALSE ||
                    $formdata['FirstName'] === "")
    {
        $errors['FirstName'] = "first name required";
    }
    
    if ($formdata['LastName'] === NULL ||
                    $formdata['LastName'] === FALSE ||
                    $formdata['LastName'] === "")
    {
        $errors['LastName'] = "last name required";
    }
    
    if ($formdata['Email'] === NULL ||
                    $formdata['Email'] === FALSE ||
                    $formdata['Email'] === "")
    {
        $errors['Email'] = " email required";
    }
    
    if ($formdata['Number'] === NULL ||
                    $formdata['Number'] === FALSE ||
                    $formdata['Number'] === "")
    {
         $errors['Number'] = " number required";
    }
    
    if ($formdata['maxCap'] === ""){
        $capacity = intval($formdata['maxCap']);
        if ($capacity < 0 || $capacity > 999999) {
    }
        $errors['maxCap'] = "capacity required. Cannot be a negative value";
    }
    
    if ($formdata['lType'] !== NULL &&
                    $formdata['lType'] !== FALSE &&
                    $formdata['lType'] !== "")
    {
        $type = array("indoor", "outdoor", "both");
        if(!in_array($formdata['lType'], $type)){
            $errors['lType'] = "invalid type";
        }
    }
    
    if ($formdata['facilities'] !== NULL &&
                    $formdata['facilities'] !== FALSE &&
                    $formdata['facilities'] !== "")
    {
        $fcl = array("sound", "screen", "restaurant", "bar", "disabled");
        if(in_array($formdata['facilities'], $fcl)){
            $errors['facilities'] = "invalid restriction";
        }
    }
    
    if ($formdata['link'] !== NULL &&
                    $formdata['link'] !== FALSE &&
                    $formdata['link'] !== "") {
        if (!filter_var($formdata['link'], FILTER_VALIDATE_URL)){
            $errors['link'] = "Invalid url format";
        }
    }
}
