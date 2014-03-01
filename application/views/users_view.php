<?php 
echo "<h4>Assignment 1: Filter users by entering the filter term  in the search bar. Click Send mail to get the list of users</h4>";
echo "<div class=\"write_title\">Directory (id - Name - Access Group - Username - Pwd - Date)</div>";
//	$2ndOne = "I should fade out";
$second_one = "I should fade out";
$third_one = "Fade me out too";
?>
 
<div class = 'to-dos' ng-app ng-controller = 'UserController'>
 		<div class = 'write'>
			<label> Filter for: </label>	
			<span><input type="text" id="searchterm" ng-model='searchItem' placeholder="Type 'admin' here"></span>
			
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

		<div id="assignment">
			<h4>Assignment 2</h4>
			<input type = 'text' ng-model = 'posttext' placeholder = 'What message would you like to post' />

			<div id='theOne' class = "hotwire" ng-click='fadelines()'>
					<a href='#'>{{fadelink}}</a>
			</div>
			<div ng-hide="fadestat" id='second' class = "hotwire"><?php echo $second_one?></div>
			<div ng-hide="fadestat" id='third'  class = "hotwire"><?php echo $third_one?></div>
		</div>



 	</div> 
</div>
