<?php

namespace App\Http\Controllers\City;

use Exception;
use App\Abstracts\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class CityController extends Controller
{
    public function index()
    {
        return view('cities.index');
    }
    public function distance(Request $request){
        $client = new Client();
        $msg=sprintf("What is the distance between %s and %s. Reply just the distance in kilometers and nothing more",$request->city1,$request->city2);
        $response = $client->post('https://simple-chatgpt-api.p.rapidapi.com/ask', [
            'headers' => [
                'content-type' => 'application/json',
                'X-RapidAPI-Key' => 'a70d2f1d9emsh1a7da97b5baa710p17a19bjsnb6985fdfb13b',
                'X-RapidAPI-Host' => 'simple-chatgpt-api.p.rapidapi.com'
            ],
            'json' => [
                "question"=>$msg
            ],
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return back()->with('success', $result['answer']);
    }
}
