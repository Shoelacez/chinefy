<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


 /**
     * The podcast instance.
     *
     * @var Video
     */
    protected Video $video;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         // TODO: Move this logic to UploadVideo Action

        Log::info('Event Dispatched');

      

    

           $response =  Http::withHeaders([
            'Authorization' => 'Bearer ' . env('JW_API_SECRET'),
            'Content-Type' => 'application/json'

            ])->post('https://api.jwplayer.com/v2/sites/fOWFrwVF/media',[
                'upload' => [
                'method' => 'multipart',
                ],
                'metadata' => [
                    'title' => 'My Multipart Upload Video']
            ]);
           

            Log::info('Video uploaded successfully.', [
                'url' => 'asa',
            ]);

         
    }
}
