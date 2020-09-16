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
</style>

<div class="divShow">
	Customer Info Service
</div>

<div class="divShow" ng-app="moduleName" ng-controller="controllerName as customerInfo">

</div>

@endsection