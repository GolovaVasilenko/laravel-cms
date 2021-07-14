<?php


namespace App\Services;


use App\Models\Media;
use App\Models\MediaGroup;

class MediaUploadService
{
    public function uploadImage($file, $group = 'uploads')
    {
        $path = $file->store(
            $group, 'media'
        );
        $mediaGroup = MediaGroup::query()->where('slug', $group)->first();
        $media = new Media(['link' => $path, 'group_id' => $mediaGroup->id]);
        $media->save();
        return $path;
    }
}
