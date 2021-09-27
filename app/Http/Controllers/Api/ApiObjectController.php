<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Location;
use App\Models\objects;
use phpDocumentor\Reflection\Location as ReflectionLocation;

class ApiObjectController extends Controller
{
 
  
    /**
     * get save locations data from database
     * 
     */
    public function mapMarker()
    { 
        $request=objects::all();
        $map_markes = array ();
        foreach ($request as $key => $request) { 
            $map_markes[] = (object)array(
                'name' => $request->name,
                'adress' => $request->adress,
                'city' => $request->city,
                'state' => $request->state,
                'hours' => $request->hours,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            );
        }
        return response()->json($map_markes);
    }
 

}