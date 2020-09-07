<?php

namespace App\Http\Controllers;

use App\Model\CustomerInfo;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerInfo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
         
        $inputData=$request->all();
        //return $inputData['customerName'];
        $customerData=new CustomerInfo;
        $customerData->customerName=$inputData['customerName'];
        $customerData->customerAddress=$inputData['customerAddress'];
        $customerData->customerType=$inputData['customerType'];
        $customerData->save();

        return $customerData;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CustomerInfo  $customerInfo
     * @return \Illuminate\Http\Response
     */


    public function show(CustomerInfo $customerInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CustomerInfo  $customerInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerInfo $customerInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CustomerInfo  $customerInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerInfo $customerInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CustomerInfo  $customerInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerInfo $customerInfo)
    {
        //
    }
}
