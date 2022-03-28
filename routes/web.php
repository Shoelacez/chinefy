<?php

use App\Jobs\ProcessVideo;
use Illuminate\Support\Facades\Route;
use Jwplayer\JwplatformClient;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

Route::controller(\App\Http\Controllers\VideoController::class)->group(function (){

    Route::get('/', 'index')->name('video.index');

    Route::get('/videos/create', 'create')->name('videos.create');

    Route::post('/videos', 'store')->name('videos.store');

    Route::get('/videos/show', 'show')->name('videos.show');

});




Route::get('/test', function(JwplayerService $jwplayerService)
{
    
   // dd(get_class($jwplayerService));


    $jwplayerService->uploadMedia();


    
} );




class JwplayerService{




    public function uploadMedia($value='')
    {
        $partsUrl = $this->fileSplit('/Users/macbookair/Downloads/youtube-downloads/laravelorigin.mp4', 100000000);
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

            ])->get('https://api.jwplayer.com/v2/uploads/'. $response->upload_id .'/parts?page=1&page_length=3');

        
        $uploadLinks = json_decode($stepTwoResponse->body());


   

        // TODO: Convert the file

        foreach($uploadLinks->parts as $url)
        {
            dump($url->upload_link);

            // dump( file_get_contents($partsUrl[0]));

          $stepThreeResponse = Http::attach(
                'vid',  file_get_contents($partsUrl[0]), 'vid', [
                    'Content-Type' => '',
                ]
            )->put($url->upload_link);

          dd($stepThreeResponse->body());

        }

      
    



      
   
    }

    // Default is 1KB

function fileSplit($file , $buffer=1024)
{
    //open file to read
    $file_handle = fopen($file,'r');
    //get file size
    $file_size = filesize($file);
    //no of parts to split
    $parts = $file_size / $buffer;
    
    //store all the file names
    $file_parts = array();
    
    //path to write the final files
    // $store_path = "splits/";
    $store_path = storage_path('app/video');
    
    //name of input file
    $file_name = basename($file);
    
    for($i=0;$i<$parts;$i++){
        //read buffer sized amount from file
        $file_part = fread($file_handle, $buffer);
        //the filename of the part
        $file_part_path = $store_path.$file_name.".part$i";
        //open the new file [create it] to write
        $file_new = fopen($file_part_path,'w+');
        //write the part of file
        fwrite($file_new, $file_part);
        //add the name of the file to part list [optional]
        array_push($file_parts, $file_part_path);
        //close the part file handle
        fclose($file_new);
    }    
    //close the main file handle
    
    fclose($file_handle);
    return $file_parts;
}

}