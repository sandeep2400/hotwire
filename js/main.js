//main.js
function UserController ($scope, $http){
	$scope.users=[];
	$scope.searchItem = '';
	$scope.emailmsg = '';
	$scope.fadestat = false;
	$scope.fadelink = 'Click me to make the others disappear';
	$scope.posttext = 'this message will be posted';

	var base_url = 'http://localhost/hotwire/';
//Read all users
	$http.get(base_url + 'users/getall')
   		.then(function(res) {   
	   		for (var i=0; i<res.data.rows.length; i+=1){
		   			$scope.users.push(res.data.rows[i]);
	   			}
    	}, function() {
    	    	alert('Could not connect to the server!');
    		}
    	);

//Update a contact on the contact page
	$scope.updContact = function(index)
	{	
		if ((($scope.users[index]['name'] !='') && ($scope.users[index]['name'] != ' ')) && 
			(($scope.users[index]['access_group'] != '') && ($scope.users[index]['access_group'] != ' ')) && 
			(($scope.users[index]['password'] != '') && ($scope.users[index]['password'] != ' ')))
		{
			$http({
				url: base_url + 'users/update',
			    method: "PUT",
			    data: {message:$scope.users[index]},
			    headers: {'Content-Type': 'application/json'}		    
			})
			.then(function(response) {
					load();
				}, 
				function(response) { // optional
				   console.log(response);
				}
			);

		}
	}

	$scope.sendContact = function()
	{	
		$http.post(base_url + 'users/sendmail')
	   		.then(function(returned) {   
				$scope.emailmsg = returned.data;
	    	}, function() {
	    	    	alert('Could not connect to the server!');
	    		}
	    	);
	}

	$scope.fadelines = function()
	{	
		$scope.fadestat = !$scope.fadestat;
		if ($scope.fadestat == true)
		{
			$scope.fadelink = 'Click me to get them back';
			$http({
				url: base_url + 'users/postnote',
			    method: "POST",
			    data: {message:$scope.posttext},
			    headers: {'Content-Type': 'application/json'}		    

			})
			.then(function(response) {
					alert(response.data);
					$scope.posttext = "";
				}, 
				function(response) { // optional
				   console.log(response.data);
				}
			);
		}
		else{
			$scope.fadelink = 'Click me to make the others disappear';
		}
	}

//reload page
function load () 
{
	$scope.users=[]; 
	$scope.searchItem = 'admin';
	$scope.emailmsg = '';
	
	var base_url = 'http://localhost/hotwire/';
	$http.get(base_url + 'users/getall')
   		.then(function(res) {   
	   		for (var i=0; i<res.data.rows.length; i+=1) {
		   			$scope.users.push(res.data.rows[i]);
	   		}
    	},
	    	function() {
    	    	alert('Could not connect to the server!');
    		}
    	);

}

}