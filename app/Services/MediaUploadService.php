<?php


namespace App\Services;


use App\Models\MediaGroup;

class MediaUploadService
{
    public function uploadImage($file, $group = 'uploads')
    {
        $mediaGroup = MediaGroup::query()->where('slug', $group)->first() ?? null;
        if(!$mediaGroup) {
            return false;
        }

    }
}
