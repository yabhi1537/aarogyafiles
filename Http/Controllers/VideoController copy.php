<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 

class VideoController extends Controller
{
    public function index(Request $request)
    {   
        return $request;    
        // $httpClient = new \GuzzleHttp\Client();
        // $request = $httpClient->get("https://www.googleapis.com/youtube/v3/search?key=AIzaSyAsJ3YMjQWBDJCNkwjI4STrnhpQ5D_Io9U&channelId=UCRViPs7M6y19TqbK1RvHDDw&part=snippet,id&order=date&maxResults=20");
        // $response['video'] = json_decode($request->getBody()->getContents());
        // return view('video' ,$response);
    }
    
}
