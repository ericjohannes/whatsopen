<?php

$name = $response[0]["business_name"];
$website = $response[0]["business_website"]["url"];
$location = json_decode($response[0]["location"]["human_address"]);


// confirm it is open
print("<p>Yep, <strong>$name</strong> has registered as a business <strong>\"open to all customers\"</strong>.</p>");

// give contact info based on what's available
if (!empty($location->address))
{
    print("<p>It can be found at or contacted through $location->address, $location->city, 
    $location->state $location->zip.</p><p>Or ");
}
else
{
    print("<p>It did not provide an address, but ");
}

print("check it out <a href=$website>online</a>.</p>");
?>