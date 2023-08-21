<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    function countryDetails($country){
        $response = Http::get("https://restcountries.com/v3.1/name/$country");
        $country = $response->json();

        if (empty($country)) {
            return response()->json(['message' => 'Country not found'], 404);
        }
       
        $filterCountry = $this->filteredCountry($country);

        return response()->json($filterCountry);

        //return $country;
       // return response()->json($countryInfo);

    }
    function filteredCountry($country){
        $filteredCountry = [];
        foreach ($country as $item) {
            // Extract the specific fields you want
            $filteredItem = [
                'Population' => $item['population'],
                'Capital City' => $item['capital'],
                'Currency' => $item['currencies'],
                'Location' => $item['latlng'],
                'ISO2'=> $item['cca2'],
                'ISO3'=> $item['cca3']
                // Add more fields as needed
            ];
    
            $filteredCountry[] = $filteredItem;
        }
    
        return $filteredCountry;



    }


    function countryStates($country){

        $response = Http::get("https://countriesnow.space/api/v0.1/$country/states");
        $data = $response->json();

        if (empty($data)) {
            return response()->json(['message' => 'Country not found'], 404);
        }
        

        // $states = $data[0]['states'] ?? [];

        // $countryDetails = [
        //     'states' => $states,
        // ];

        return response()->json($data);

    }
}


