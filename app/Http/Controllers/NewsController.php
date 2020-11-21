<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client; 
use GuzzleHttp\Exception\RequestException;

class NewsController extends Controller
{
    public function getData(){    
        $client = new Client(); 
        $request = $client->get('https://newsapi.org/v2/top-headlines?category=technology&apiKey=f21e0dbde6684732b81bf5e127adf080'); 
        $response = $request->getBody();    
        $result = json_decode($response); 
        return view('home',['artikel'=>$result->articles]); 
    }      
    public function searchData(Request $request){ 
        $client = new Client(); 
        $query = $request->keyword; 
        $req = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=f21e0dbde6684732b81bf5e127adf080&q='.$query); 
        $response = $req->getBody(); 
        $result = json_decode($response); 
        return view('home',['artikel'=>$result->articles]); 
   }
} 
 