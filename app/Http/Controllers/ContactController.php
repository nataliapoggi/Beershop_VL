<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate();
        return view('commentList', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response]
     */
    public function store(Request $request)
    {

      $request->validate([
        'name' => 'required|max:255|min:2',
        'lname' => 'required|max:255|min:2',
        'email' => 'required|string|email|max:255',
        'comment' => 'required|max:1000'
      ],[
        'required' => 'El campo :attribute es requerido',
        'max' => 'Excedio el máximo de caracteres para este campo',
        'min' => 'El campo :attribute debe tener al menos 2 caracteres',
        'email' => 'El campo :attribute debe ser un email válido',
      ]);

      $contact = Contact::create($request->all());

      return redirect()->route('contactSuccess');
    }

    /**
     * Display the specified contact.
     *
     */
     
    public function search(Request $request)
    {
      
      if (isset( $request->q))
     {
        $q =$request->q;
      
        $contacts= Contact::where('name', 'like', '%'. $q .'%')
          ->orWhere('lname', 'like', '%'. $q .'%')  
          ->orWhere('email', 'like', '%'. $q .'%')
          ->orWhere('created_at', 'like', '%'. $q .'%')
          ->orWhere('comment', 'like', '%'. $q .'%')
          ->orderBy('id')
          ->paginate(10); 
          return view('commentList', compact('contacts'));
      };

      if (isset( $request['opcion']) && $request['opcion']=='Sin responder' )
      {
        $contacts= Contact::where('answered', '=', 0)
              ->orderBy('id')
              ->paginate(10);
        return view('commentList', compact('contacts'));
      };

      if (isset( $request['opcion']) && $request['opcion']!='Sin Responder' )
      {
        $contacts= Contact::where('answered', '=', 1)
              ->orderBy('id')
              ->paginate(10);
        return view('commentList', compact('contacts'));
      };
    
      
      $contacts = Contact::orderBy('id')->paginate();
      return view('commentList', compact('contacts'));
      
  }

  public function answer($id)
  {
    
    $contact = contact::find($id);
    $contact->answered =1;
    $contact->save();
    $contacts = Contact::orderBy('id')->paginate(10);
    return view('commentList', compact('contacts'))->with('message', 'Actualizado correctamente');;
  }

}     
        
?>       
    
       


