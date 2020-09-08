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

		var customerInfo=this;
		$scope.customerData=[];
		$scope.customerSuggestion = {};
		var customerNameAddress=[];
		$scope.filterCustomer=null;
		$scope.saveCustomerInfo=function(){
			$http({
				method:"POST",
				url:'/customer-info',
				data:this.customerInfo
			}).success(function(result){
				console.log(result);
				$http.get('/customer-info').success(function(data){
					console.log(data);
					$scope.customerData=data;
					customerInfo.customerName="";
					customerInfo.customerAddress="";
					customerInfo.customerType="";
				});

			})/*.error()*/
		};

		$http.get('/customer-info').success(function(data){
			console.log(data);
			$scope.customerData=data;
			angular.forEach($scope.customerData, function(value, key){
		        customerNameAddress.push(value.customerName);
		        customerNameAddress.push(value.customerAddress);
	        });
	        console.log(customerNameAddress);
		});

		$scope.customerSearchByNameAddress=function($event) {

			//console.log($event.keyCode);

			if ($event.keyCode == 39) {    // confirm suggestion with right arrow
		        $scope.customerSearch = $scope.customerSuggestion.text;
		        return;
		    }

		    $scope.customerSuggestion.text = '';
		    for (var i = 0; i < customerNameAddress.length; i++) {
		        if ($scope.customerSearch && customerNameAddress[i].indexOf($scope.customerSearch) === 0) {
		          $scope.customerSuggestion.text = customerNameAddress[i];
		          console.log(customerNameAddress[i]);
		          break;
		        }
		    }
		};

		$scope.customerDataSearch=function(string){
			var output=[];
			angular.forEach($scope.customerData,function(value){
				if(value.customerName.toLowerCase().indexOf(string.toLowerCase())>=0){
					output.push(value.customerName);
					output.push(value.customerAddress);
				}
			});
			$scope.filterCustomer=output;
			console.log(output);
		}

		$scope.fillTextbox=function(string){
			$scope.customerSearch=string;
			$scope.filterCustomer=null;
		}
		
	}]);

})();