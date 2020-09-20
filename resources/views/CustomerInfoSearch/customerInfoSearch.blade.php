@extends('layout.app')
@section('homeContent')
<script type="text/javascript" src="/js/customerSearch.js"></script>
<style type="text/css">
	.divShow{
		position: relative;
	}

	.search__suggestion {
	  font: normal normal normal 14px/normal Arial;
	  position: absolute;
	  left: 2px;
	  top: 3px;
	  color: #aaa;
	  z-index: -1;
	}
	input {
	  font: normal normal normal 14px/normal Arial;
	  background: transparent;
	}
	ul{
		margin: 0px;
	}
</style>

<div class="container">
	<div class="row">
		<div class="container col-md-6">
			<div class="col-md-4" ng-app="customerInfoSearchApp" ng-controller="customerInfoSearchController">
				<h3 >AngularJS Autocomplete Textbox</h3>
				<label>Customer Info Search: Enter Customer Info </label>
				<div >
					<input type="text" name="customerInfo" id="customerInfo" ng-model="customerSearchInfo" ng-keyup="searchCustomer(customerSearchInfo)" class="form-control" />
					<ul class="list-group">
						<li class="list-group-item" ng-repeat="customerData in filterCoustomer track by $index" ng-click="fillTextBox(customerData)">@{{customerData}}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection