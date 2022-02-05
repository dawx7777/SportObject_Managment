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
        $objects=objects::all();
        $map_markes = array ();
        foreach ($objects as $key => $object) { 
            $map_markes[] = (object)array(
                'id' => $object->id,
                'name' => $object->name,
                'adress' => $object->adress,
                'city' => $object->city,
                'state' => $object->state,
                'hours' => $object->hours,
                'picture'=>$object->picture,
                'latitude' => $object->latitude,
                'longitude' => $object->longitude,
                'width' => $object->width,
                'lenght' => $object->lenght,
                'type' => $object->type,
                'light' => $object->light,
                'count' => $object->count,
            );
        }
        return response()->json($map_markes);
    }


     
 

}