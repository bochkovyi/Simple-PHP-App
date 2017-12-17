<form method="post">
<fieldset>
  <legend>Please register. Already registered? <a href="login">Log in</a></legend>

  <div class="form-group">
    <label for="username">Username</label>
    <input type="username" class="form-control" name="username" aria-describedby="usernameHelp" placeholder="Enter username">
    <small name="usernameHelp" class="form-text text-muted">Username will be save in unencripted JSON file and all the office will be able to read it.</small>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</fieldset>
</form>