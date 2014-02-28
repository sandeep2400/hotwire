<div id="sidebar">
        <li><a href="<?php echo site_url("about");?>">About</a></li> 
        <?php 
			$is_logged_in = $this->session->userdata('is_logged_in');
			if (isset($is_logged_in) && ($is_logged_in == true))
			{
				echo "<li><a href=\"".site_url("users")."\">Users</a></li>";				
			}
?>
</div><!--sidebar -->
<div id = "Main">