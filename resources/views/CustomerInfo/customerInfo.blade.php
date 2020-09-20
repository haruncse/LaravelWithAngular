@extends('layout.app')
@section('homeContent')
<script type="text/javascript" src="/js/homeDataFlow.js"></script>
<style type="text/css">
	.divShow{
		text-align: left;
	}
	.from-group{
		margin-bottom: 5px;
	}
	h2{
		text-align: center;
	}
</style>

<div class="container">
	<div class="row">
		<div class="divShow">
			<h2> Customer Info Add and Display Using Angular </h2>
		</div>
		<div class="divShow" ng-app="moduleName" ng-controller="controllerName as customerInfo">
			<div class="table-responsive" >
				<table class="table table-condensed">
					<tr>
						<th>Customer Name</th> <th> Customer Type</th><th> Customer Address</th>
					</tr>
					<tr ng-repeat="item in customerData">
						<td>@{{item.customerName}}</td><td>@{{item.customerType}}</td><td>@{{item.customerAddress}}</td>
					</tr>
				</table>
			</div>
			<form class="form-inline">
				<div class="form-group" >
					<label class="customerName">Customer Name </label>
					<input class="form-control" placeholder="Customer Name" type="text" name="" id="customerName" ng-model="customerInfo.customerName" >
				</div>
				<div class="form-group">
					<label for="customerAddress">Customer Address</label> 
					<input class="form-control" placeholder="Customer Address" type="text" name="" id="customerAddress" ng-model="customerInfo.customerAddress" >
				</div>
				<div class="form-group">
					<label for="customerType">Customer Type</label>
					<select class="form-control" id="customerType" ng-model="customerInfo.customerType"> 
						<option value="Regular">Regular</option>
						<option value="Frequent">Frequent</option>
					</select>
				</div>
					<button class="btn btn-success" ng-click="saveCustomerInfo()" >Save Data</button>
			</form>
		</div>
	</div>
</div>
@endsection