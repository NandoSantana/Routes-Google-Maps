<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use FarhanWazir\GoogleMaps\GMaps;
use App\Info;
use App\GMaps;
use Illuminate\Support\Facades\DB;

class LiveGmapController extends Controller
{

    public function __construct($config = array())
    {
        $this->apiKey = config('googlemaps.key');
    }

    public function direction()
    {

        $gmapconfig['zoom'] = '14';
        $gmapconfig['map_height'] = '500px';
        $gmapconfig['geocodeCaching'] = false;
    
        $gmapconfig['directions'] = true;
     
        $paths[] = null;

        $ways = Info::All();
       
        for ($i=0; $i < count($ways) ; $i++) { 
            # code...
            $way['path'][] = $ways[$i];
            
        }
       
        $last_key = array_key_last($way['path']);
        $last_value = $way['path'][$last_key]->endereco;

        // trata para o trajeto do meio
        //$middlePath = array_shift($way['path']);
        //$eliminateEnd = array_pop($way['path']);

        $gmapconfig['directionsStart'] = "Av Dr. Gastão Vidigal, 1132 - Vila Leopoldina - 05314-010";
      
        $gmapconfig['directionsEnd'] = $last_value; 
   
        $gmapconfig['paths'] = $way['path'];

        $gmapconfig['directionsDivID'] =  'directionsDiv';
    
        $livegooglemap = new GMaps();
        $livegooglemap->initialize($gmapconfig);
        $map = $livegooglemap->create_map();
        
        return view('map',compact('map'));
    
    }

}
