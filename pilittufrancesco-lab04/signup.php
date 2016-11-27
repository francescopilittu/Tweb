<?php include("top.html"); ?>

<form method="post" action="signup-submit.php">
<fieldset>
    <legend>New User signup:</legend>
    <div>
        <label><strong>Name:</strong></label><input type="text" name="name" size="16"/>
    </div>
    <div>
        <label><strong>Gender: </strong></label><input type="radio" name="gender" value="M"/>Male
        <input type="radio" name="gender" value="F" checked="checked"/>Female
    </div>
    <div>
        <label><strong>Age:</strong></label><input type="text" name="age" size="6" maxlength="2"/>
    </div>
    <div>
        <label><strong>Personality type:</strong></label><input type="text" name="pType" size="6" maxlength="4"/> (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Dont know your type?</a>)
    </div>
    <div>
        <label><strong>Favorite OS:</strong></label>
        <select name="favoriteOS" size="1" >
            <option>Windows</option>
            <option>MacOS</option>
            <option selected="selected">Linux</option>                        
        </select> 
    </div>
    <div>
        <label><strong>Seeking age:</strong></label>
        <input type="text" name="minAge" size="6" maxlength="2" placeholder="min"/> to <input type="text" name="maxAge" size="6" maxlength="2" placeholder="max"/>
    </div>
    <div>
        <input type="submit" value="Sign Up" />
    </div>
</fieldset>
</form>
<?php include("bottom.html"); ?>
