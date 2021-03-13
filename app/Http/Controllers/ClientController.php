<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concessionaire;
use App\Models\Client;

class ClientController extends ApiController
{
    public function list(Request $request)
    {
        try {

            $country_id = $request->country_id;
            $state_id = $request->state_id;
            $city_id = $request->city_id;

            $concessionaires = Concessionaire::leftJoin('users', 'concessionaires.user_id', '=', 'users.id')
                                            ->leftJoin('locations', 'concessionaires.location_id', '=', 'locations.id')
                                            ->leftJoin('countries', 'locations.country_id', '=', 'countries.id')
                                            ->leftJoin('states', 'locations.state_id', '=', 'states.id')
                                            ->leftJoin('cities', 'locations.city_id', '=', 'cities.id')
                                            ->where('user_id', $request->auth->id)
                                            ->where('concessionaires.status', 1)
                                            ->when($country_id, function ($query, $country_id) {
                                                return $query->where('countries.id', $country_id);
                                            })->when($state_id, function ($query, $state_id) {
                                                return $query->where('states.id', $state_id);
                                            })->when($city_id, function ($query, $city_id) {
                                                return $query->where('cities.id', $city_id);
                                            })
                                            ->select('concessionaires.id',
                                            'concessionaires.name',
                                            'concessionaires.RIF',
                                            'countries.name AS country',
                                            'states.name AS state',
                                            'cities.name AS city',
                                            'locations.address'
                                            )
                                            ->with('clients')
                                            ->get();

            return $this->responseApi(null, $concessionaires);

        } catch (Excepcion $e) {
            $error = $this->getGeneralError($e);
            return $this->responseApi($error['message'], null, $error['code'], 'error');
        }
    }

    public function create(Request $request)
    {
        try {

            $data = $request->all();

            $client = Client::create($data);

            return $this->responseApi(null, $client);

        } catch (Excepcion $e) {
            $error = $this->getGeneralError($e);
            return $this->responseApi($error['message'], null, $error['code'], 'error');
        }
    }
}
