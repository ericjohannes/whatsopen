<p class="descrip">Know what you want but not sure where to go for it? <br>Choose a type of business, from the ones the city database
recognizes, and find all <strong>"open"</strong> businesses of that type.</p>

<form action="find.php" method="post" class="form-inline">
    <fieldset>
        <div class="form-group">
            <select name="type" class="form-control">
                
                <option value="">Pick a type</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Retail">Retail</option>
                <option value="Services">Services</option>
                <option value="Real Estate and Housing">Real Estate and Housing</option>
                <option value="Cultural">Cultural</option>
                <option value="Education">Education</option>
                <option value="Other">Other</option>
                
            </select> 
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Find!</button>
        </div>
    </fieldset>
</form>