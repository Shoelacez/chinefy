<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JwplayerService{




	public function uploadMedia($value='')
	{
		// 2. Build new media
		       $stepOneResponse =  Http::withHeaders([
            'Authorization' => 'Bearer ' . env('JW_API_SECRET'),
            'Content-Type' => 'application/json'

            ])->post('https://api.jwplayer.com/v2/sites/fOWFrwVF/media',[
                'upload' => [
                'method' => 'multipart',
                ],
                'metadata' => [
                    'title' => 'My Multipart Upload Video']
            ]);

        $response = json_decode($stepOneResponse->body());
            
        // 3. List of all the upload parts
        $stepTwoResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $response->upload_token,
            'Content-Type' => 'application/json'

            ])->get('https://api.jwplayer.com/v2/uploads/'. $response->upload_id .'/parts?page=1&page_length=100');

        
        $uploadLinks = json_decode($stepTwoResponse->body());

        dd($uploadLinks . 'aa');
        // TODO: Convert the file

        foreach($uploadLinks as $url)
        {
        	dump($url);
        }

        // $stepThreeResponse = Http::withHeaders([
        
        //     'Content-Type' => 'application/json'

        //     ])->put('');

   
	}

}