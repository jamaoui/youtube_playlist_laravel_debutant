<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Mail\profileMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public  function index()
    {
        $profiles = Cache::remember('profiles', 10, function() {
            return Profile::paginate(9);
        });

        return view('profile.index',compact('profiles'));
    }
    public function show(string $id){
        $profile = Cache::remember('profile_'.$id, 10, function() use ($id) {
            return Profile::findOrFail($id);
        });
        
        return view('profile.show',compact('profile'));
    }
    public function create(){
        return view('profile.create');
    }

    public function store(ProfileRequest $request){
        // Validation 
        $formFields = $request->validated();

        // Hash/Cryptage
        $formFields['password'] = Hash::make($request->password);

        $this->uploadImage($request,$formFields);
        
        // Insertion
        $profile = Profile::create($formFields);

        Mail::to($profile->email)->send(new profileMail($profile));
        // Redirection
        return redirect()->route('profiles.index')->with('success','Votre compte est bien créé.');
    }

    public function verifyEmail(Request $request){
        [$createdAt,$id] = explode('///',base64_decode($request->hash));
        $profile = Profile::findOrFail($id);

        if($profile->created_at->toDateTimeString() !== $createdAt){
            abort(403);
        }

        if($profile->email_verified_at !== NULL) {
            return response('Compte déja activé');
        }

        $name = $profile->name;
        $email = $profile->email;
        $profile->fill([
            'email_verified_at' => time()
        ])->save();


        return view('profile.email_verified',compact('name','email'));
    }
    public function destroy(Profile $profile)
    {
        $profile->delete();
        
        return to_route('profiles.index')->with('success','Le Profile à bien été supprimé');
    }

    public function edit(Profile $profile)
    {
        return view('profile.edit',compact('profile'));
    }

    public function update(ProfileRequest $request,Profile $profile)
    {
        $formFields = $request->validated();
        // Hash/Cryptage
        $formFields['password'] = Hash::make($request->password);
        $this->uploadImage($request,$formFields);
        $profile->fill($formFields)->save();

        return to_route('profiles.edit',$profile->id)->with('success','Le Profile à bien été modifié');

    }
    private function uploadImage(ProfileRequest $request,array &$formFields){
        unset($formFields['image']);
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('profile','public');
        }
    }
}
