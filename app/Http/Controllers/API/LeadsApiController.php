<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\leadsApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LeadsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'nama' => 'required',
            'no_telphone' => 'required',
            'tipe_kendaraan' => 'required',
            'plat_no_kendaraan' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'photo' => 'required',
            'from' => 'required',

        ]);


        $requestData = $request->all();


        $data = new leadsApi;

        $data->nama = $requestData['nama'];
        $data->no_telphone = $requestData['no_telphone'];

        if($requestData['from'] == 'gadai_motor'){
            $data->gadai_motor = json_encode($requestData);
        }elseif($requestData['from'] == 'dana_ekspres'){
            $data->dana_ekspres = json_encode($requestData);
        }elseif($requestData['from'] == 'gadai_online'){
            $data->gadai_online = json_encode($requestData);
        }

        $data->save();

        return response()->json([
            'massage' => 'success',
            'data' => $data
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\leadsApi  $leadsApi
     * @return \Illuminate\Http\Response
     */
    public function show(leadsApi $leadsApi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\leadsApi  $leadsApi
     * @return \Illuminate\Http\Response
     */
    public function edit(leadsApi $leadsApi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\leadsApi  $leadsApi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, leadsApi $leadsApi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\leadsApi  $leadsApi
     * @return \Illuminate\Http\Response
     */
    public function destroy(leadsApi $leadsApi)
    {
        //
    }
}
