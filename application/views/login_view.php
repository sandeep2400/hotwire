<?php
echo "<div class=\"write_title\">Login</div>";
echo "<div class=\"write\">";  
?>
<?php echo form_open('login/validate_credentials'); ?>
<label>Username: </label>
<?php 
	$data = array(
              'name'        => 'username',
              'id'          => 'username',
              'maxlength'   => '100',
              'size'        => '75'
            );

	echo form_input($data);
?>

<label>Password: </label>
<?php 
	$data = array(
              'name'        => 'password',
              'id'          => 'password',
              'maxlength'   => '100',
              'size'        => '75'
            );
	echo form_password($data);
  if (isset($err_msg))
    {
      echo '<p>'.$err_msg.'</p>';
    }
  echo form_submit('login','Login');
  echo "<span><a href=\"".site_url("signup")."\">Create a new Account</a></span>";
  echo form_close();
  echo '</div>';

?>
