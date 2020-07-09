<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use FarhanWazir\GoogleMaps\GMaps;
use App\GMaps;

class LiveGmapController extends Controller
{
    //

    public function UploadMap(Request $request)
    {
        // $gmapconfig['center'] = 'Rajkot Railway Station,India';
        // $gmapconfig['zoom'] = '14';
        // $gmapconfig['map_height'] = '400px';
        // $livegooglemap = new GMaps();
        // $livegooglemap->initialize($gmapconfig);
        dd($request);
        // $map = $livegooglemap->create_map();
        //return view('home',compact('map'));
    }

    public function direction()
    {
        $gmapconfig['center'] = 'Rua barão de Ibituruna - caiçara, Brasil';
        $gmapconfig['zoom'] = '14';
        $gmapconfig['map_height'] = '500px';
        $gmapconfig['geocodeCaching'] = false;
    
        $gmapconfig['directions'] = true;
     
        $paths[] = null;
            // lista completa
        foreach ($paths as $key ) {
            # code...
            $paths['paths'][] = 'R barão de Ibituruna 90 - caiçara, Brasil';
            $paths['paths'][] = 'Av. carlos luz 800, Brasil';

            $paths['paths'][] = 'Av. carlos luz 208, Brasil';
            $paths['paths'][] = 'R. Belmiro braga 1350 - Caiçara, Brasil';

        }
        // trata a origem e destino
        $first_key = array_key_first($paths['paths']);
        $first_value = $paths['paths'][$first_key];

        $last_key = array_key_last($paths['paths']);
        $last_value = $paths['paths'][$last_key];

        // trata para o trajeto do meio
        $middlePath = array_shift($paths['paths']);
        $eliminateEnd = array_pop($paths['paths']);
    

        $gmapconfig['directionsStart'] = $first_value;
        $gmapconfig['directionsEnd'] = $last_value; 
        
        $gmapconfig['paths'] = $paths['paths'];

        $gmapconfig['directionsDivID'] =  'directionsDiv';
    
        $livegooglemap = new GMaps();
        $livegooglemap->initialize($gmapconfig);
        $map = $livegooglemap->create_map();
        
        return view('map',compact('map'));
    
    }

}
