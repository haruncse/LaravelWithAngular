@extends('layout.app')
@section('homeContent')
<style type="text/css">
	.divShow{
		text-align: left;
	}
	.from-group{
		margin-bottom: 5px;
	}
</style>

<div class="divShow">
	Customer Info Add and Display
</div>

<div class="divShow" ng-app="moduleName" ng-controller="controllerName as customerInfo">

	<div >
		<table>
			<tr>
				<th>Customer Name</th> <th> Customer Type</th><th> Customer Address</th>
			</tr>
			<tr ng-repeat="item in customerData">
				<td>@{{item.customerName}}</td><td>@{{item.customerType}}</td><td>@{{item.customerAddress}}</td>
			</tr>
		</table>
	</div>
	

	<div class="from-group" >
		Customer Name 
		<input class="form-group" type="text" name="" id="customerName" ng-model="customerInfo.customerName" >
	</div>

	<div class="from-group">
		Customer Address 
		<input type="text" name="" id="customerAddress" ng-model="customerInfo.customerAddress" >
	</div>

	<div class="from-group">
		Customer Type 
		<select class="form-group" id="customerType" ng-model="customerInfo.customerType"> 
			<option value="Regular">Regular</option>
			<option value="Frequent">Frequent</option>
		</select>
	</div>

	<div class="from-group">
		<button ng-click="saveCustomerInfo()" >Save Data</button>	
	</div>
</div>

@endsection