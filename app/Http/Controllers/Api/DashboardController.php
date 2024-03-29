<?php

namespace App\Http\Controllers\Api;

use Auth;
use Hash;
use App\Models\Anggota;
use App\Models\Job;
use App\Models\Team;
use App\Models\User;
use App\Models\Quote;
use App\Models\Client;
use App\Helpers\Helper;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Newsletter;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class DashboardController extends Controller
{

    public function adminProfile(){
        $user = Auth::user();
        return $user;
    }

    public function adminProfileUpdate(Request $request, $id = null){
        $request->validate(
            [
                'name'=> 'required',
                'email'=>'required'
            ]
        );
        $user = Auth::user();
        $image = $user->image;
        $input = $request->all();
        if($request->hasFile('image')){
            $input['image'] = Helper::imgUpdate($request->file('image'), $image);
        }
        $user->fill($input)->save();
    }

    public function adminPasswordUpdate(Request $request){

        $request->validate(
            [
                'password' => 'required|min:6'
            ]
        );

        $user = Auth::user();
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $user->fill($input)->save();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all()->count();
        $anggotaUser = Anggota::where('user_id', \Auth::id())->count();
        $service = Service::all()->count();
        $portfolio = Portfolio::all()->count();
        $team = Team::all()->count();
        $testimonial = Testimonial::all()->count();
        $blog = Blog::all()->count();
        $client = Client::all()->count();
        $package = Package::all()->count();
        $gallery = Gallery::all()->count();
        $job = Job::all()->count();
        $application = JobApplication::all()->count();
        $quote = Quote::all()->count();
        $subscriber = Newsletter::all()->count();
        $blogPosts = Blog::with('bcategory')->orderBy('id', 'DESC')->limit(10)->get();

       return [
            "anggota" => $anggota,
            "anggotaUser" => $anggotaUser,
            "service" => $service,
            "portfolio" => $portfolio,
            "team" => $team,
            "testimonial" => $testimonial,
            "blog" => $blog,
            "client" => $client,
            "package" => $package,
            "gallery" => $gallery,
            "job" => $job,
            "application" => $application,
            "quote" => $quote,
            "subscriber" => $subscriber,
            "blogPosts" => $blogPosts,
       ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
