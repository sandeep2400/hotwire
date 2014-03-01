<?php 
echo "<div class=\"write_title\">Directory (id - Name - Access Group - Username - Pwd - Date)</div>";
?>
 
<div class = 'to-dos' ng-app ng-controller = 'UserController'>
 		<div class = 'write'>
			<label> Filter for: </label>	
			<span><input type="text" id="searchterm" ng-model='searchItem' placeholder="Search term"></span>
			
	 		<div class='directory' ng-repeat = 'user in users|filter:searchItem'>
	 		<div ng-if='user.you === true'>
		 			<div id='entry1'>You</div>
			 		<div id='entry1'>{{user.id}}</div>
		 			<div id='entry'>{{user.name}}</div>
			 		<input type='text' ng-model='user.access_group' placeholder='{{user.access_group}}'>
			 		<div id='entry'>{{user.username}}</div>
		 			<div id='entry'>{{user.password}}</div>
			 		<div id='entry'>{{user.insert_time}}</div>
			 		<span><input type='submit' ng-click='updContact($index)' value='update'></span>
					</div>
	 		<div ng-if='user.you === false'>
		 			<div id='entry1'>   </div>
		 			<div id='entry1'>{{user.id}} </div>
		 			<div id='entry'>{{user.name}} </div>
		 			<div id='entry'>{{user.access_group}} </div>
		 			<div id='entry'>{{user.username}} </div>
		 			<div id='entry'>{{user.password}} </div>
		 			<div id='entry'>{{user.insert_time}} </div>
			</div>
	 		</div>

		<input type='submit' ng-click='sendContact()' value='Send Mail'>
		<span class = 'message'>{{emailmsg}}</span>
 	</div> 
</div>
