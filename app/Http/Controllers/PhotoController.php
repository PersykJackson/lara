<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Exceptions\FileAlreadyExistsException;
use App\Http\Requests\SavePhotoRequest;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * @param Photo $photo
     * @return View
     */
    public function index(Photo $photo): View
    {
        return view('photos.index', ['photos' => $photo->getAll()]);
    }

    /**
     * @param SavePhotoRequest $request
     * @param Photo $photo
     * @return RedirectResponse
     */
    public function save(SavePhotoRequest $request, Photo $photo): RedirectResponse
    {
        try {
            $photo->create($request->get('title'), $request->file('photo'));
        } catch (FileAlreadyExistsException $e) {
            back()->withErrors(['photo' => 'Title with this title already exists']);
        }

        return redirect(null, 201)->route('photos');
    }
}
