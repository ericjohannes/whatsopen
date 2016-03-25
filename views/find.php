<p>
    Below are all the <strong><?=$type?></strong> businesses that have registered as <strong>"open"</strong>.
</p>

<table class="table table-striped">

    <thead align="left">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Address</th>
        </tr>
    </thead>

    <tbody align="left">
        <?php foreach ($responses as $response): 
        
        // cycle through each response and pull out relevant info

        ?>
        
        <tr>
            <td>
            <?php
            if ( array_key_exists('business_website', $response))
            {
                $url = $response["business_website"]["url"];
                
                $name = $response["business_name"];
                if ( array_key_exists( 'url', $response["business_website"]))
                {
                    print ( "<a href= $url>$name</a>");
                }
                else
                {
                    print($response["business_name"]);
                }
            }
            else
            {
                print($response["business_name"]);
            }
            ?>
            <td>
            
            <?php
            // add a description if provided
            if ( array_key_exists('business_website', $response))
            {
                if ( array_key_exists('description', $response["business_website"]))
                {
                    print( $response["business_website"]["description"]);
                }
                else 
                {
                    print("Not provided");
                }
            }
            else 
            {
                print("Not provided");
            }
            ?>
            
            </td>
            <td><?php 
            
            if ( array_key_exists('location', $response))
            {
                if ( array_key_exists('human_address', $response["location"]))
                {
                    // access the location and print it
                    $location = json_decode($response["location"]["human_address"]);
                    if ( !empty($location->address))
                    {
                        print("$location->address, $location->city");
                    }
                    else
                    {
                        print("Not provided");
                    }
                    
                }
            }
            else
            {
                print("Not provided");
            }
            ?>
            </td>
        </tr>

        <?php endforeach ?>
    </tbody>

</table>