<?php
if (!isset($user)) {
  redirect_to(url_for('/index.php'));
}
?>

<dl>
  <dt>First name</dt>
  <dd><input type="text" name="user[first_name_usr]" value="<?php echo h($user->first_name_usr); ?>" require minlength="2" maxlength="255"></dd>
</dl>

<dl>
  <dt>Last name</dt>
  <dd><input type="text" name="user[last_name_usr]" value="<?php echo h($user->last_name_usr); ?>" require minlength="2" maxlength="255"></dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="email" name="user[email_usr]" value="<?php echo h($user->email_usr); ?>" ></dd>
</dl>

<dl>
  <dt>Phone</dt>
  <dd><input type="phone" name="user[phone_usr]" value="<?php echo h($user->phone_usr); ?>"></dd>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="user[username_usr]" value="<?php echo h($user->username_usr); ?>" require minlength="2" maxlength="255"></dd>
</dl>

<dl>
  <dt>Password</dt>
  <dd><input type="password" name="user[password_usr]" value="" require minlength="6" maxlength="190" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d){6,}$"></dd>
</dl>

<dl>
  <dt>Confirm Password</dt>
  <dd><input type="password" name="user[confirm_password]" value="" require minlength="6" maxlength="190" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d){6,}$"></dd>
</dl>

