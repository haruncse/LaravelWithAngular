@extends('layout.app')
@section('homeContent')

<div>
	Customer Info Add and Display
</div>

<div ng-app="moduleName" ng-controller="controllerName as customerInfo">

	<li ng-repeat="item in allDataItem">
		@{{item}}
	</li>

	<div>
		Customer Name 
		<input type="text" name="" id="customerName" ng-model="customerInfo.customerName" >
	</div>

	<div>
		Customer Address 
		<input type="text" name="" id="customerAddress" ng-model="customerInfo.customerAddress" >
	</div>

	<div>
		Customer Type 
		<select id="customerType" ng-model="customerInfo.customerType"> 
			<option value="Regular">Regular</option>
			<option value="Frequent">Frequent</option>
		</select>
	</div>
	
	<div>
		<button ng-click="saveCustomerInfo()" >Save Data</button>	
	</div>
	

</div>

@endsection