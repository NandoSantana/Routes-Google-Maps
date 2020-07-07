<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\GMaps;

class LiveGmapController extends Controller
{
    //

    public function direction()
    {
        $gmapconfig['center'] = 'Rajkot Railway Station,India';
        $gmapconfig['zoom'] = '14';
        $gmapconfig['map_height'] = '500px';
        $gmapconfig['geocodeCaching'] = true;
    
        $gmapconfig['directions'] = true;
        $gmapconfig['directionsStart'] = 'Rajkot Railway Station,India';
        $gmapconfig['directionsEnd'] = 'London`s India Club,USA';
        $gmapconfig['directionsDivID'] =  'directionsDiv';
    
        $livegooglemap = new GMaps();
        $livegooglemap->initialize($gmapconfig);
        $map = $livegooglemap->create_map();
        return view('map',compact('map'));
    
    }

    

}
