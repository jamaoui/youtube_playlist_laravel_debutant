<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PublicationRequest;

class PublicationController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::latest()->paginate();
        
        return view('publication.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationRequest $request)
    {
        $formFields = $request->validated();
        $this->uploadImage($request,$formFields);
        $formFields['profile_id'] = Auth::id();
        Publication::create($formFields);
        
        return to_route('publications.index')->with('success','La publica à bien été publiée');;
    }
    private function uploadImage(PublicationRequest $request,array &$formFields){
        unset($formFields['image']);
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('publication','public');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication,Request $request)
    {

        // Authorization :

        // Policies (Controllers) PublicationPolicy
        $this->authorize('update',$publication);
        return view('publication.edit',compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        Gate::authorize('update-publication',$publication);
        $formFields = $request->validated();
        $this->uploadImage($request,$formFields);
        $publication->fill($formFields)->save();
        return to_route('publications.index')->with('success','La publication à bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('publications.index')->with('success','La publication à bien été supprimée');

    }
}
