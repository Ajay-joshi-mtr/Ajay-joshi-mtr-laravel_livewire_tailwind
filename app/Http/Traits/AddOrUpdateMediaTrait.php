<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;
use App\Models\Media;
use App\Http\Traits\UploadMediaTrait;
use Illuminate\Support\Facades\Storage;

trait AddOrUpdateMediaTrait
{
    use UploadMediaTrait;

    public function addOrUpdateMedia($model_object, $mediable_type, $newmedia)
    {
        $media = [];
        if ($newmedia) {
            $file = $newmedia;
            $name = Str::slug($file->getClientOriginalName()) . '_' . time();

            $folder = '/uploads/media/' . ''; // $upload_path
            $filePath = $folder . $name . '.' . $file->getClientOriginalExtension();
            $this->uploadOne($file, $folder, 'public', $name);

            $media = new Media(['name' => $file->getClientOriginalName(), 'path' => $filePath, 'size' => $file->getSize(), 'ext' => $file->getClientOriginalExtension()]);

            $old_media = Media::where('mediable_id', $model_object->id)->where('mediable_type', $mediable_type)->first();
            if ($old_media) {
                Storage::disk('public')->delete($old_media->path);
                $old_media->delete();
            }
            $model_object->media()->save($media);
            return true;
        }

        return false;
    }
}
