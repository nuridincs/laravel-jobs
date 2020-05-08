<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class JobsController extends Controller
{
    public function index()
    {
      $response = Http::get('https://jobs.github.com/positions.json');
      $data['jobs'] = $response->json();

      return view('jobs.index', $data);
    }

    public function detailJobs(Request $request)
    {
      $id = $request->id;
      $response = Http::get('https://jobs.github.com/positions/'.$id.'.json');
      $data['detailJobs'] = $response->json();

      return view('jobs.details', $data);
    }

    public function searchJobs(Request $request)
    {
      $currentURL = \Request::fullUrl();
      $searchParam = parse_url($currentURL, PHP_URL_QUERY);
      $response = Http::get('https://jobs.github.com/positions.json?'.$searchParam);
      $data['jobs'] = $response->json();
      $data['search'] = true;

      return view('jobs.index', $data);
    }
}
