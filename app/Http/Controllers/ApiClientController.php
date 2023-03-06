<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiClientController extends Controller
{
    public function apiResponce()
    {

        $packageName='com.firstblastit'; //com.example.blahblah
        $productId='demo_fb';
        $token='dfcndhlbpnffdmjmlhfakkii.AO-J1Oxn3wt9h6IK9jSJtScVZhLd3oXJoqQYYVkAPf28t1-l7n3JFmJJ-Urodnjf1ZvTVII5mkkUhQDgiq2XoI_VJkS4ebalMA';

        $client = new \Google_Client();
        $client->setAuthConfig(public_path('credentials.json'));
        $client->addScope('https://www.googleapis.com/auth/androidpublisher');


        $service = new \Google_Service_AndroidPublisher($client);

        $purchase = $service->purchases_products->get($packageName, $productId, $token);
        echo json_encode($purchase);
    }
}
