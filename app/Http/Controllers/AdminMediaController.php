<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{

    public function index() {

        //
        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function create() {

        //
        return view('admin.media.create');
    }

    public function store(Request $request) {

        //
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file' => $name]);

        session()->flash('photo_uploaded', 'Media files have been uploaded');

        return redirect('/admin/media');
    }

    public function destroy($id) {

        //
        $photo = Photo::findOrFail($id);

        unlink(public_path().$photo->file);

        $photo->delete();

        session()->flash('photo_deleted', 'Photo file has been delete');

    }

    public function deleteMedia(Request $request)
    {
        //
        if(isset($request->delete_single)) {
            $this->destroy($request->file);

            return redirect()->back();
        }

        if(isset($request->delete) && !empty($request->checkBoxArray)) {

            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo) {
                $photo->delete();
            }

            session()->flash('photos_deleted', 'Chosen photos have been deleted');

            return redirect()->back();
        } else {
            session()->flash('photos_deleted', "Choose photos to delete, could not delete any photo");

            return redirect()->back();
        }
    }
}
