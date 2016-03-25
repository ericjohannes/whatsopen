<?php
    
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render the form to check
        render("check_form.php");
    }
    
    // if user reached page via POST (as by submitting the check form.)
     else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // start by defining pieces.
        $view_uid = "mqet-2q6r";
        $root_url = "https://data.southbendin.gov/";
        $socrata = new Socrata($root_url);
        
        // check if there's an option chosen first and if so, go with that one
        if (!empty($_POST["option"]))
        {
            $name_trimmed = $_POST["option"];
        }
        else
        {
            $name_trimmed = rtrim(ltrim($_POST["name"]));
        }
       
        
        
        
        
        $params = array("business_name" => $name_trimmed);
        $response = $socrata->get("resource/$view_uid.json", $params); 
        
        if (empty($response[0]))
        {
            // check if the name is similar to any names in the list
            // start by getting an array of the businesses that start with the same first letter
            $first = substr($name_trimmed, 0, 1);

            $params = array("\$where" => "starts_with(business_name, '$first')");
            $response = $socrata->get("resource/$view_uid.json", $params);
            
            // creates options array to be filled later
            $options = array();
            
            // loop through each name found
            foreach ($response as $value)
            {
                // compare each name to what was typed
                similar_text($value["business_name"], $name_trimmed, $percent);
                if ($percent > 50)
                {
                    // if more than half the chars match, add it to options
                    $options[] = $value["business_name"];
                }
                
            }
            
            // if no matches are found, apologize
            if (empty($options))
            {
                $oops = $name_trimmed;
                apologize("We could not find that $oops is on the list. If might not have registered as an 
                Open Business, but be sure you spelled it correctly.");
            }
            else
            {
                render("check_again.php", ["options" => $options]);
            }
            

        }
        
        render("check.php", ["response" => $response]);
    }

?>