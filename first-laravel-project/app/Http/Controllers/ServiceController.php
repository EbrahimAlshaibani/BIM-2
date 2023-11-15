<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view("service.index", compact("services"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("service.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = Service::create($request->all());
        if($request->button=='save_and_continue'){
            return redirect()->route("services.edit", $service->id)->with("success","");
        }
        return redirect()->route("services.index")->with("success","");    
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view("service.edit", compact("service"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        if($request->button=='save_as_new'):
            $service = Service::create($request->all());
        else:
            $service->update($request->all());
        endif;

        return redirect()->route("services.index")->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
