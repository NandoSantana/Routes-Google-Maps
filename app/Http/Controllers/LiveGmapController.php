<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use FarhanWazir\GoogleMaps\GMaps;
use App\GMaps;

class LiveGmapController extends Controller
{
    //

    public function map()
    {
        $gmapconfig['center'] = 'Rajkot Railway Station,India';
        $gmapconfig['zoom'] = '14';
        $gmapconfig['map_height'] = '400px';
        $livegooglemap = new GMaps();
        $livegooglemap->initialize($gmapconfig);
     
        $map = $livegooglemap->create_map();
        return view('map',compact('map'));
    }

    public function direction()
    {
        $gmapconfig['center'] = 'Rua barão de Ibituruna - caiçara, Brasil';
        $gmapconfig['zoom'] = '14';
        $gmapconfig['map_height'] = '500px';
        $gmapconfig['geocodeCaching'] = false;
    
        $gmapconfig['directions'] = true;
        
        // for ($i=0; $i < 2; $i++) { 
        //     # code...
        //     $gmapconfig['directionsStart'][$i] = 'Rua barão de Ibituruna 90 - caiçara, Brasil';
        //     $gmapconfig['directionsEnd'][$i] = 'Av. carlos luz 200, Brasil';

        //     $gmapconfig['directionsStart'][$i] = 'Av. carlos luz 208, Brasil';
        //     $gmapconfig['directionsEnd'][$i] = 'R. Belmiro braga 1350 - Caiçara, Brasil';
           
        //     //dump($gmapconfig['directionsStart']);
        //     //dump($gmapconfig['directionsEnd']);
        // }
        //$gmapconfig['directionsStart'][] = '';
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
    

        //dd($paths['paths']);
        
       // dd($paths['directions']);
        $gmapconfig['directionsStart'] = $first_value;
        $gmapconfig['directionsEnd'] = $last_value; 
        
        $gmapconfig['paths'] = $paths['paths'];
        //dd($gmapconfig);
        // $gmapconfig['directionsStart'] = [];
        // $gmapconfig['directionsStart'] = 'Rua barão de Ibituruna 90 - caiçara, Brasil';
        // $gmapconfig['directionsEnd'] = 'Av. carlos luz 200, Brasil';

        // $gmapconfig['directionsStart'] = 'Av. carlos luz 200, Brasil';
        // $gmapconfig['directionsEnd'] = 'R. Belmiro braga 1350 - Caiçara, Brasil';

        $gmapconfig['directionsDivID'] =  'directionsDiv';
    
        $livegooglemap = new GMaps();
        $livegooglemap->initialize($gmapconfig);
        //$livegooglemap->add_marker();
        $map = $livegooglemap->create_map();
        
        return view('map',compact('map'));
    
    }

}
