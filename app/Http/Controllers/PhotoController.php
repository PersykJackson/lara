<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Exceptions\FileAlreadyExistsException;
use App\Http\Requests\SavePhotoRequest;
use App\Models\Photo;

class PhotoController extends Controller
{
    private Photo $model;

    /**
     * @param Photo $photo
     */
    public function __construct(Photo $photo)
    {
        $this->model = $photo;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('photos.index', ['photos' => $this->model->getAll()]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('photos.create');
    }

    /**
     * @param SavePhotoRequest $request
     * @return RedirectResponse
     */
    public function store(SavePhotoRequest $request): RedirectResponse
    {
        try {
            $this->model->create($request->get('title'), $request->file('photo'));
        } catch (FileAlreadyExistsException $e) {
            return Redirect::back()->withErrors(['photo' => 'Title with this title already exists']);
        }

        return Redirect::route('photos');
    }
}
