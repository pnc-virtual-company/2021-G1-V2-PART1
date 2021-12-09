<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountry()
    {
        $countriesPath = storage_path('/countries/countries.json');
        $countries = json_decode(file_get_contents($countriesPath), true);
        
        return $countries;
    }

}