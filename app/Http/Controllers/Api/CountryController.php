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

 

    }
    function filteredCountry($country){
        $filteredCountry = [];
        foreach ($country as $item) {
            
            $filteredItem = [
                'Population' => $item['population'],
                'Capital City' => $item['capital'],
                'Currency' => $item['currencies'],
                'Location' => $item['latlng'],
                'ISO2'=> $item['cca2'],
                'ISO3'=> $item['cca3']
               
            ];
    
            $filteredCountry[] = $filteredItem;
        }
    
        return $filteredCountry;



    }


    public function citiesByCountry(Request $request)
    {
        $countryName = $request->input('country'); 

//        $apiUrl = 'https://countriesnow.space/api/v0.1/countries/cities';

        $link = 'https://countriesnow.space/api/v0.1/countries/states';
        $Data = [
          //  'country' => 'Nigeria',
            'country' => $countryName,
        ];

    
        $response = Http::post($link, $Data);

        
        if ($response->successful()) {
        
            $data = $response->json();

            
            return response()->json($data);
        } else {
            
            return response()->json(['error' => 'Failed to fetch data from the API'], $response->status());
        }
    }

}


