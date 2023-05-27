<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Service;
class VideoController extends Controller
{
    function index(){
         
        $response['services'] = Service::where('language_id', '1')->get();
   $chanelRes= file_get_contents("https://www.googleapis.com/youtube/v3/search?key=AIzaSyA_vm0-7zTkVKtKOrm8JDJj7vJc1giNAoc&channelId=UCKdJjgbqedzIjvMUiQ0_tsg&part=snippet,id&order=date&maxResults=3000000");
      
    $blogData = json_decode($chanelRes);
    $response['video'] = $blogData;
    return view('video' ,$response);
    }
}
