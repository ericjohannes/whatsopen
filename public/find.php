<?php
    
    // configuration
    require("../includes/config.php");

   // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("find_form.php");
    }
    
    // check what businesses are listed
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $view_uid = "mqet-2q6r";
        $root_url = "https://data.southbendin.gov/";
        $socrata = new Socrata($root_url);
        
        $params = array("business_type" => $_POST["type"]);
        $response = $socrata->get("resource/$view_uid.json", $params); 
        if (empty($response[0]))
        {
            $oops = $_POST["type"];
            apologize("We could not find any $oops businesses on the list. Try another type!");
        }
        
        render("find.php", ["responses" => $response, "type" =>$_POST["type"]]);
        //var_dump($response);
    }

?>