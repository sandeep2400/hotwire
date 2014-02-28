//main.js
function UserController ($scope, $http){
	$scope.users=[];
	$scope.searchItem = 'admin'

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
		$http.get(base_url + 'users/sendmail')
	   		.then(function(res) {   
		   		for (var i=0; i<res.data.rows.length; i+=1){
			   			$scope.users.push(res.data.rows[i]);
		   			}
	    	}, function() {
	    	    	alert('Could not connect to the server!');
	    		}
	    	);
	}

//reload page
function load () 
{
	$scope.users=[]; 
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