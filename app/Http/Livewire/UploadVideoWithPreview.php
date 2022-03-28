<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Jobs\ProcessVideo;


class UploadVideoWithPreview extends Component
{

    use WithFileUploads;

    public  $video ;

    public string $name = '';

    public string $description = '';

    
    
    public function updated()
    {

//        dump($this->video->path());
    }




    public function save()
    {

        $video = Video::create([
            'name' => $this->name,
            'description' => $this->description,
            'video_id' => $this->video->path()
        ]);


        ProcessVideo::dispatch($video);

        $this->clear();

    }



    public function clear()
    {
        $this->name = '';
        $this->description = '';
    }


    public function render()
    {
        return view('livewire.upload-video-with-preview');
    }
}
