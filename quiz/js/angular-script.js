// Application module

var crudApp = angular.module('crudApp',['ngSanitize']);
crudApp.controller("DbController",['$scope','$http', function($scope,$http)
{

	// Function to get employee details from the database
	getInfo();
	
	function getInfo()
	{
	// Sending request to EmpDetails.php files 
	$http.post('databaseFiles/empDetails.php').success(function(data)
	{
	// Stored the returned data into scope 
	$scope.details = data;

	});

	$http.post('databaseFiles/idDetails.php').success(function(datad)
	{
	// Stored the returned data into scope 
	$scope.team = datad;
	});

}


 $scope.search_query = 1;
 $scope.myFunc = function() 
 {
 	if( $scope.search_query<$scope.team.n)
 	{
    $scope.search_query++;
    $scope.myText = "";
}
 };
 $scope.myFuncp = function() 
  {
    if($scope.search_query>1)
    $scope.search_query--;
$scope.myText = "";
   };
// Setting default value of gender 
$scope.empInfo = {'no' : '0'};
// Enabling show_form variable to enable Add employee button
$scope.show_form = true;
// Function to add toggle behaviour to form
$scope.formToggle =function()
{
	$('#empForm').slideToggle();
	$('#editForm').css('display', 'none');
}
$scope.insertInfo = function(info)
{
	$http.post('databaseFiles/insertDetails.php',{"name":info.name,"email":info.email,"address":info.address,"gender":info.gender}).success(function(data)
	{
	if (data == true) {
	getInfo();
	$('#empForm').css('display', 'none');
    }});
}
$scope.deleteInfo = function(info)
{
	$http.post('databaseFiles/deleteDetails.php',{"del_id":info.emp_id}).success(function(data){
	if (data == true) {
	getInfo();
}
});
}
$scope.currentUser = {};
$scope.editInfo = function(info){
$scope.currentUser = info;
$('#empForm').slideUp();
$('#editForm').slideToggle();
}
$scope.UpdateInfo = function(info)
{

$http.post('databaseFiles/updateDetails.php',{"qid":info.qid,"answer":info.answer,"team":info.id}).success(function(data)
{
//sub(data);
if (data == 1) 
{
  
  $scope.myText = "Updated Answer="+info.answer;
}
});
//$scope.myText = "Updated Answer="+info.answer;	
}
$scope.updateMsg = function(emp_id){
$('#editForm').css('display', 'none');
}
}]);