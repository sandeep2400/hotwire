<html>
<head>
	<title>Hotwire User Manager</title>
    <?php $this->load->helper('html');?> 

    <link href='http://fonts.googleapis.com/css?family=Istok+Web' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js?<?php echo time(); ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/angular.js?<?php echo time(); ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/main.js?<?php echo time(); ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/ui-bootstrap-tpls-0.10.0.js?<?php echo time(); ?>" ></script>

	<?php echo link_tag('css/bootstrap.css');?>    
	<?php echo link_tag('css/style.css');?>    

</head>

<body>
<div id="banner">
	<a href="<?php echo base_url()?>" title="Home">User Manager</a>   
</div> 
<?php 
	$is_logged_in = $this->session->userdata('is_logged_in');
	if (isset($is_logged_in) && ($is_logged_in == true)) {
		echo '<div id="logstat">'.anchor('login/logout', 'Logout').'</div>'; 
	}
	else {
		echo '<div id="logstat">'.anchor('login', 'Login').'</div>'; 
	}

?>

