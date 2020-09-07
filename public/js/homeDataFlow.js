(function (){
	var appName=angular.module('moduleName', []);

	console.log("Home Data Flow Inside Module ");

	appName.controller("controllerName",['$scope','$http',function ($scope,$http){
		$scope.allDataItem=[];

		console.log("Home Data Flow Inside Controller ");

		$http.get('/get-basic-data').success(function(data){
			console.log(data);
			$scope.allDataItem=data;
		});

		var dataItem=this;
		var customerInfo=this;

		$scope.formData = {};
		$scope.addDataItem=function () {
			//console.log("Data");
			//console.log($("#myData").val());
			var data=document.getElementById("myData").value;
			console.log("D1 ",dataItem.dataText,"D2 ",dataItem.dataText2,"D3 ",dataItem.dataText3);
			var aa={};
			$http.post('/post-basic-data/'+dataItem).success(function(data){
				console.log(data);
			});
		}

		$scope.postsave= function(){
		    $http({
		        method:"POST",
		        url:'/post-basic-data2',
		        data: this.dataItem
		    })
		    .success(function(result){
		        //alert(result);
		        console.log(result);
		    })
		};

		$scope.saveCustomerInfo=function(){
			$http({
				method:"POST",
				url:'/customer-info',
				data:this.customerInfo
			}).success(function(result){
				console.log(result);
			})/*.error()*/
		};

	}]);

})();