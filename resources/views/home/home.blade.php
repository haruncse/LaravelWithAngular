@extends('layout.app')
@section('homeContent')
<script type="text/javascript" src="/js/homeDataFlow.js"></script>
<div>
	This is Home Content
</div>

<div ng-app="moduleName" ng-controller="controllerName as dataItem">
	<li ng-repeat="item in allDataItem">
		@{{item}}
	</li>
	<input type="text" name="" id="myData" ng-model="dataItem.dataText" >
	<input type="text" name="" id="myData2" ng-model="dataItem.dataText2" >
	<input type="text" name="" id="myData3" ng-model="dataItem.dataText3" >
	<button ng-click="addDataItem()" >Add Data</button>
	<button ng-click="postsave()" >Add Data2</button>
</div>

@endsection