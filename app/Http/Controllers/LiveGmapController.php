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
    

    public function uploadMap(Request $request)
    {
        // dd($request);
        $paths[] = null;
        foreach ($paths as $key ) {
            # code...
            $paths['paths'][] = 'R barão de Ibituruna 90 - caiçara, Brasil';
            $paths['paths'][] = 'Av. carlos luz 800, Brasil';

            $paths['paths'][] = 'Av. carlos luz 208, Brasil';
            $paths['paths'][] = 'R. Belmiro braga 1350 - Caiçara, Brasil';


        }
        $string = '';
        for ($i=0; $i < count($paths['paths']); $i++) { 
            # code..
            // $pathsPlus['paths'][$i] .= "+";
            $string .= $paths['paths'][$i]."+";

        }
        //dd($string);
        $data_location = "https://maps.google.com/maps/api/geocode/json?address=".urlencode($string)."&key=".$this->apiKey;
        // if ($this->region != "" && strlen($this->region) == 2) {
        //     $data_location .= "&region=".$this->region;
        // }

        $context = null;
        $proxy = config('googlemaps.http_proxy');
        if (!empty($proxy)) {
            $context = stream_context_create([
                'http' => [
                    'proxy' => $proxy,
                    'request_fulluri' => true,
                ]
            ]);
        }

        $data = file_get_contents($data_location, false, $context);

        $data = json_decode($data);
        //dump($paths['paths']);

        //dump($data);
        if ($data->status == "OK") {

            DB::table('info')->delete();

            for ($i=0; $i < count($paths['paths']) ; $i++) 
            { 
         
                $newAddres = new Info();
                $newAddres->endereco = $paths['paths'][$i];
                $newAddres->save();

            }
            
           
        }else {
            echo "api pode ter sido cancelada ou houve um problema de conexão";
        }
       // return redirect(url('googlemap/direction'));
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
        
        // trata a origem e destino
        $first_key = array_key_first($way['path']);
        $first_value = $way['path'][$first_key]->endereco;

      
        $last_key = array_key_last($way['path']);
        $last_value = $way['path'][$last_key]->endereco;

        // trata para o trajeto do meio
        $middlePath = array_shift($way['path']);
        $eliminateEnd = array_pop($way['path']);

        $gmapconfig['directionsStart'] = $first_value;
      
        $gmapconfig['directionsEnd'] = $last_value; 
   
        $gmapconfig['paths'] = $way['path'];

        $gmapconfig['directionsDivID'] =  'directionsDiv';
    
        $livegooglemap = new GMaps();
        $livegooglemap->initialize($gmapconfig);
        $map = $livegooglemap->create_map();
        
        return view('map',compact('map'));
    
    }

}
