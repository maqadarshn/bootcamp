<form action="changepwd.php" method="post">
    <fieldset>
        
        <div class="form-group">
            <input class="form-control" name="oldpassword" placeholder="Old Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Change Password
            </button>
        </div>
    </fieldset>
</form>