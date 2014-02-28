<?php 
echo "<div class=\"write_title\">Create a new account</div>";
echo "<div class=\"write\">";  
echo form_open('signup'); 
?>
<label>Name: </label>
<?php $signup_name = array(
                            'name'        => 'signup_name',
                            'id'          => 'signup_name',
                            'value'       => set_value('signup_name'),
                            'size'        => '75',
                          );
	echo form_input($signup_name);
  echo form_error('signup_name'); 
?>

<label>Access Group: </label>
<?php $signup_access = array(
                            'name'        => 'signup_access',
                            'id'          => 'signup_access',
                            'value'       => set_value('signup_access'),
                            'size'        => '75',
                          );
  echo form_input($signup_access);
  echo form_error('signup_access'); 
?>

<label>Username: </label>
<?php $signup_username = array(
                            'name'        => 'signup_username',
                            'id'          => 'signup_username',
                            'value'       => set_value('signup_username'),
                            'size'        => '75',
                          );
  echo form_input($signup_username);
  echo form_error('signup_username'); 
?>

<label>Password: </label>
<?php 
	$signup_pass = array(
              'name'        => 'signup_pass',
              'id'          => 'signup_pass',
              'maxlength'   => '100',
              'size'        => '75',
            );
	echo form_password($signup_pass);
  echo form_error('signup_pass'); 

?>

<label>Repeat Password: </label>
<?php 
  $signup_re_pass = array(
              'name'        => 'signup_re_pass',
              'id'          => 'signup_re_pass',
              'maxlength'   => '100',
              'size'        => '75',
            );
  echo form_password($signup_re_pass);
  echo form_error('signup_re_pass'); 

  echo form_submit('signup','Sign Up');
  echo "<span><a href=\"".site_url("login")."\">Login if you have an account</a></span>";
  echo '</div>';
	echo form_close();
?>

