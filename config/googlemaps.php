<?php
return [
    /* =====================================================================
    |                                                                       |
    |                  Global Settings For Google Map                       |
    |                                                                       |
    ===================================================================== */



    /* =====================================================================
    General
    ===================================================================== */

    // API UELLO AIzaSyCyLOJAgHeo27XlVsXF98jWVMpToAYzfQY
    //  Minha KEY AIzaSyBLv-8mb2S7pZijk1kFwAVjen2wyZbhN3Q
    'key' => env('GOOGLE_MAPS_API_KEY', 'AIzaSyCyLOJAgHeo27XlVsXF98jWVMpToAYzfQY'), //Get API key: https://code.google.com/apis/console
    'adsense_publisher_id' => env('GOOGLE_ADSENSE_PUBLISHER_ID', ''), //Google AdSense publisher ID

    'geocode' => [
        'cache' => false, //Geocode caching into database
        'table_name' => 'info', //Geocode caching database table name
    ],

    'css_class' => '', //Your custom css class

    'http_proxy' => env('HTTP_PROXY', null), // Proxy host and port
];
