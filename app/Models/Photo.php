<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\FileAlreadyExistsException;

class Photo extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    private function getUserDir(): string
    {
        $id = Auth::id();
        $imgDir = Setting::where('title', '=', config('settings.img_dir.title'))->get()->first()->value;

        return "$imgDir/$id";
    }

    /**
     * @param string $title
     * @param UploadedFile $photo
     * @return void
     * @throws FileAlreadyExistsException
     */
    public function create(string $title, UploadedFile $photo): void
    {
        $ext = $photo->extension();
        $userDir = $this->getUserDir();
        $fileName = "$title.$ext";

        if (Storage::exists("$userDir/$fileName")) {
            throw new FileAlreadyExistsException();
        }

        $photo->storeAs($userDir, $fileName);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $userDir = $this->getUserDir();
        $url = Storage::url($userDir);

        $photos = Storage::files($userDir);

        return str_replace($userDir, $url, $photos);
    }
}
