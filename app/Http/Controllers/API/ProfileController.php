<?php

namespace App\Http\Controllers\API;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    private const CACHE_KEY = 'profiles_api';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Cache::remember(self::CACHE_KEY,14400, function() {
            return ProfileResource::collection(Profile::all());
        });
    
        return $profiles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->all();
        // Hash/Cryptage
        $formFields['password'] = Hash::make($request->password);
        $profile = Profile::create($formFields);
        Cache::forget(self::CACHE_KEY);

        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Profile  $profile)
    {
        $formFields = $request->all();
        // Hash/Cryptage
        $formFields['password'] = Hash::make($request->password);
        $profile->fill($formFields)->save();
        Cache::forget(self::CACHE_KEY);
        return new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        Cache::forget(self::CACHE_KEY);
        return response()->json([
            'message'=> 'Le profile est bien supprimé.',
            'id' => $profile->id,
            'errors' => []
        ]);
    }

}
