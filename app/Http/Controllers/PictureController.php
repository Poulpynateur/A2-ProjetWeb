<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\site\Picture;
use App\Models\site\Comment;

class PictureController extends Controller
{

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Add a comment with the actual date
     */
    public function createComment(Request $request) {
        $datetime = (new \DateTime())->format('Y-m-d');
        try {
            Comment::create([
                'content' => $request->comment,
                'date' =>  $datetime,
                'id_Users' => Auth::id(),
                'id_Pictures' => $request->id_picture
                ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Commentaire poster !',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Un problème a eu lieu ...',
            ]);
        }
    }

    public function getPictures(Request $request) {
        $files = glob(public_path('img/upload/'.$request->eventID.'/*'));
        \Zipper::make(public_path('event_'.$request->eventID.'.zip'))->add($files)->close();
        return response()
            ->download(public_path('event_'.$request->eventID.'.zip'))
            ->deleteFileAfterSend();
    }

    /**
     * Upload a image on the server
     * @return JSON status, if success the image path
     */
    public function upload(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if($request->id_event == '') {
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('img/upload'), $imageName);
                
                return response()->json([
                    'status' => 'success',
                    'message' => 'Image chargé avec succès !',
                    'path' => '/img/upload/'.$imageName
                ]);
            }
            else {
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('img/upload/'.$request->id_event), $imageName);

                Picture::create(
                    ['link' => '/img/upload/'.$request->id_event.'/'.$imageName,
                    'id_Events' => $request->id_event,
                    'id_Users' => Auth::id()]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Image ajouter à l\'événement avec succès !',
                    'path' => '/img/upload/'.$request->id_event.'/'.$imageName
                ]);
            }
        }

        return response()->json([
            'status' => 'warning',
            'message' => 'Fichier invalide !'
        ]);
    }
}