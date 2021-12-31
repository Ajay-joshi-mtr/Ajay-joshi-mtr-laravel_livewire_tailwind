<?php

namespace App\Http\Traits;

use App\Models\Chapter;
use Illuminate\Support\Str;
use App\Models\Media;
use App\Http\Traits\UploadMediaTrait;

trait CreateChapterTrait
{
    use UploadMediaTrait;
    use AddOrUpdateMediaTrait;

    public function createChapterOne($arr)
    {
        $chapter = Chapter::create([
            'title' => $arr['title'],
            'description' => $arr['description'],
            'topic_id' => $arr['topic_id'],
        ]);
        if (!empty($arr['media'])) {
            $this->addOrUpdateMedia($chapter, 'App\Models\Chapter', $arr['media']);
        }

        $chapter->save();

        return $chapter;
    }
}
