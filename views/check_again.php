<p>Sorry, but we couldn't find exactly what you typed. 
<br>
<strong>Were you thinking of one of these?</strong></p>

<form action="check.php" method="post" class="form-inline">
    <fieldset>
        <div class="form-group">
            
            <select name="option" class="form-control">
                
                <?php 
                    foreach ($options as $option)
                    {
                        print("<option value='$option'>$option</option>");
                    }
                ?>
            </select> 
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Check!</button>
        </div>
    </fieldset>
</form>