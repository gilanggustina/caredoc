<?php

namespace App\Http\Controllers\chatbot;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class chatbotC extends Controller
{
    public function post(Request $request){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://api.edenai.run/v2/text/chat', [
            'body' => '{"response_as_dict":true,"attributes_as_list":false,"show_original_response":false,"temperature":0,"max_tokens":1000,"providers":["openai/gpt-3.5-turbo"],"text":"'.$request->message.'","chatbot_global_action":"You are a very helpful assistant for someone to discuss health problems, limit any discussions. You can only discuss health"}',
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiZDhhOTZmMjYtZjg0Yy00ZjIxLWFhOTAtYjU3ZTA2ODYyYjU3IiwidHlwZSI6ImFwaV90b2tlbiJ9.jub2YQm5ybZXtb7lWzSa5HhMPuq0FmP5GtVC8fO7WfM',
                'content-type' => 'application/json',
            ],
        ]);

        // $client = new Client();
        // $response = $client->request('POST', env('CHATBOT_URL'), [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . env('CHATBOT_TOKEN'),
        //         'Accept' => 'application/json',
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => [
        //         "response_as_dict" => true,
        //         "attributes_as_list" => false,
        //         "show_original_response" => false,
        //         "temperature" => 0,
        //         "max_tokens" => 1000,
        //         "providers" => [
        //             "openai/gpt-3.5-turbo"
        //         ],
        //         "text" => $request->message,
        //         "chatbot_global_action" => "You are a consultant for people"
        //     ]
        // ]);

        $statusCode = $response->getStatusCode();
        $content = json_decode($response->getBody()->getContents(),true);
        return response()->json([
            'status'            => $statusCode,
            'message' => $content["openai/gpt-3.5-turbo"]["generated_text"]
        ]);
    }
}
