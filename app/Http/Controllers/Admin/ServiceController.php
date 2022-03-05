<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ServiceController extends MainController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = $this->info;
        $user = auth()->user();

        $userServices = $user->services()->get(['service_id'])->toArray();

        $us = array();
        foreach ($userServices as $userService){
            $us[] = $userService['service_id'];
        }


        $services = Service::pluck('name', 'id')->all();

        $breadcrumb = [
            [
                'name' => 'Service',
            ]
        ];

        return view('admin.service.index', compact('services','us', 'breadcrumb','info'));
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
        $service_ids = array();
        if (isset($request->all()['services']))
            $service_ids = $request->all()['services'];
        $user = auth()->user();
        $user->services()->detach();
        foreach ($service_ids as $key => $service_id) {
            $user->services()->attach($service_id);
        }

        return redirect()->route('service.index')->with('status', 'Profile updated!');
            //->with('success', 'Services updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
