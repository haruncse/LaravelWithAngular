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

<script type="text/javascript">

    //var displayField=["manageAccount","personalInfo","Orders"];
    var displayField=["personalInfo","Orders"];
    /*$(document).ready(function() {
        //$("#manageAccount").css("display","none");
        //$("#personalInfo").css("display","none");
        for(var i in displayField){
            $("#"+displayField[i]).css("display","none");
        }
    });*/
    //var displayField=["manageAccount","personalInfo","Orders"];
    function displayInfo(itemId){
        $("#"+itemId).css("display","block");
        for(var i in displayField){
            if(displayField[i]!=itemId){
                $("#"+displayField[i]).css("display","none");
            }
        }
        if(itemId=="Orders"){
            allOrderList();
        }
    }

    function allOrderList() {
        console.log("All order List");
    }

    function updatePersonalInfo() {
        //console.log("updatePersonalInfo");
        $.ajax({
            dataType:'json',
            type:'POST',
            url:'/update-customer-personal-info-by-ajax',
            data:{
                'userName':$("#userName").val(),
                'mobileNumber':$("#mobileNumber").val(),
                'address':$("#address").val(),
                'petName':$("#petName").val(),
                'petType':$("#petType").val()
              },
            success:function(result){
              console.log(result); 
              //alert('Product Added in Cart Successfully.');
            },
            error: function( req, status, err ){
              console.log( 'wrong->', status, err );
              alert(err);
            }
        });
    }

</script>

<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

<style type="text/css">

    a:focus, a:hover {
        color: #216a94;
        text-decoration: none;
    }

    .displayDiv{
        border: 1px solid skyblue;
        border-radius: 5px;
    }
    .mContainer2{
        padding-top: 50px;
    }

    .userName{
        height: 20px;    
        font-size: 
        medium;margin-top: 10px;
    }
</style>

<div class="divShow" ng-app="moduleName" ng-controller="controllerName as customerInfo">
	Customer Info Service
	<div class="container mContainer2">
	    <div class="row">
	        <div class="displayDiv col-lg-3 col-md-3 col-sm-4 col-xs-4 ">
	            <label class="col-lg-12 label label-info userName"> My Name </label>
	            {{--<label class="col-lg-12" onclick="displayInfo('manageAccount');"><a>Manage Account</a></label>--}}
	            <label class="col-lg-12" onclick="displayInfo('personalInfo');"><a>Personal Information</a></label>
	            <label class="col-lg-12" onclick="displayInfo('Orders');"><a>Orders</a></label>
	            <label class="col-lg-12" onclick="displayInfo('Orders');"><a>Re-Order</a></label>
	            <label class="col-lg-12"><a  href="http://lovelypetbd/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a></label>
	        </div>
	        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 ">
	            <div id="personalInfo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="panel panel-default">
	                    <div class="panel-heading"><label> Update Your Personal Info</label></div>

	                    <div class="panel-body">
	                      @if(Session::has('message'))
	                      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	                      @endif

	                            <div class="form-group{{ $errors->has('mobileNumber') ? ' has-error' : '' }}">
	                                <label for="userName" class="col-md-4 control-label">Name </label>

	                                <div class="col-md-6">
	                                    <input id="userName" type="text" class="form-control" name="name"  value="" required autofocus>
	                                </div>
	                            </div>

	                            <div class="form-group{{ $errors->has('mobileNumber') ? ' has-error' : '' }}">
	                                <label for="mobileNumber" class="col-md-4 control-label">Mobile Number</label>

	                                <div class="col-md-6">
	                                    <input id="mobileNumber" type="text" class="form-control" name="mobileNumber" min="11" maxlength="11" value="" required autofocus>

	                                </div>
	                            </div>

	                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
	                                <label for="address" class="col-md-4 control-label">Address</label>

	                                <div class="col-md-6">
	                                    <input id="address" type="text" class="form-control" name="address" value="" required>

	                                    @if ($errors->has('address'))
	                                        <span class="help-block">
	                                            <strong>{{ $errors->first('address') }}</strong>
	                                        </span>
	                                    @endif
	                                </div>
	                            </div>

	                             <div class="form-group{{ $errors->has('mobileNumber') ? ' has-error' : '' }}">
	                                <label for="emailAddress" class="col-md-4 control-label">Email Address </label>

	                                <div class="col-md-6">
	                                    <input id="emailAddress" type="text" class="form-control" name="emailAddress"  value="" required autofocus disabled="disabled">
	                                </div>
	                            </div>
	                             <div class="form-group">
	                                <label for="petName" class="col-md-4 control-label">Pet Name </label>

	                                <div class="col-md-6">
	                                    <input id="petName" type="text" class="form-control" name="petName"  value="" >
	                                </div>
	                            </div>
	                             <div class="form-group">
	                                <label for="petType" class="col-md-4 control-label">Pet Type </label>

	                                <div class="col-md-6">
	                                    <input id="petType" type="text" class="form-control" name="petType" placeholder="ex: cat/dog etc"  value="" >
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-6 col-md-offset-4">
	                                    <button type="button" onclick="updatePersonalInfo()" class="btn btn-primary">
	                                        Update Personal Info
	                                    </button>
	                                </div>
	                            </div>
	                    </div>
	                </div>
	            </div>

	            <div id="Orders" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="panel panel-default">
	                    <div class="panel-heading"><label> All Order List</label></div>

	                    <div class="panel-body">
	                      @if(Session::has('message'))
	                      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	                      @endif
	                        <form class="form-horizontal" method="POST" action="/">
	                            {{ csrf_field() }}

	                            <div class="form-group">
	                                
	                                <div class="col-md-10">
	                                    <label>All order List</label>
	                                </div>

	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@endsection