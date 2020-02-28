<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trip;
use App\Comment;
use Illuminate\Support\Facades\Validator;
class CommentsController extends Controller
{
    public function create($id){
      $comentarioYaHecho = Comment::where('trip_id','=',$id)->get();
      //var_dump($comentarioYaHecho);
      if (!is_null($comentarioYaHecho->first())) {
        $mensaje ='Ya comentaste este viaje';
      echo "<script type='text/javascript'>alert('$mensaje');</script>";
      return redirect('perfil');
      }else {
        return view('add_comment',[
          'id'=>$id,
        ]);
      }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request,$id){
      $this->validate($request, [
          'rating' => ['required','integer','min:1','max:5'],
          'content' => ['required','max:100']
      ]);
        $comment = new Comment([
          'rating'=>$request['rating'],
          'content'=>$request['content']
        ]);
        $trip=Trip::find($id);
        $comment->trip()->associate($trip);
        $comment->save();
        $mensaje ='Comentario Enviado!';
      echo "<script type='text/javascript'>alert('$mensaje');</script>";
        return redirect('perfil');
    }
}
