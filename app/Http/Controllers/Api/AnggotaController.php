<?php

namespace App\Http\Controllers\Api;

use Auth;

use App\Models\Anggota;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Anggota\AnggotaResource;

use Illuminate\Http\Response;

class AnggotaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas = Anggota::orderBy('id', 'DESC')->paginate(10);

        return AnggotaResource::collection($anggotas);

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

        // $this->dataValidation($request);

        // $slug = Str::slug($request->title);
        // $input = $request->all();
        // $input['image'] = Helper::imgStore($request->file('image'));
        // $input['slug'] = $slug;
        // $anggota = new Anggota();
        // $anggota->fill($input)->save();

        $anggota = new Anggota();
        $anggota->nama=$request->nama;
        $anggota->slug=Str::slug($request->nama);
        $anggota->gender=$request->gender;
        $anggota->tanggal_lahir=$request->tanggal_lahir;
        $anggota->nik=$request->nik;
        $anggota->pekerjaan=$request->pekerjaan;
        $anggota->alamat=$request->alamat;
        $anggota->rt=$request->rt;
        $anggota->rw=$request->rw;
        $anggota->kelurahan=$request->kelurahan;
        $anggota->kecamatan=$request->kecamatan;
        $anggota->kabupaten_kota=$request->kabupaten_kota;
        $anggota->korwil=$request->korwil;
        $anggota->tps=$request->tps;
        $anggota->ktp_image=Helper::imgStore($request->file('ktp_image'));
        $anggota->question_1=$request->question_1;
        $anggota->question_2=$request->question_2;
        $anggota->question_3=$request->question_3;
        $anggota->question_4=$request->question_4;
        $anggota->question_5=$request->question_5;
        $anggota->user_id=Auth::user()->id;
        // $anggota->user_id=$request->user_id;

        $anggota->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return new AnggotaResource($anggota);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

        // $this->dataValidation($request, $id);

        // $anggota = Anggota::findOrFail($id);
        // $image = $anggota->ktp_image;
        // $slug = Str::slug($request->nama);


        // $input = $request->all();

        // if($request->hasFile('ktp_image')){
        //     $input['ktp_image'] = Helper::imgUpdate($request->file('ktp_image'), $image);
        // }

        // $input['slug'] = $slug;
        // $anggota->fill($input)->save();



        $anggota = Anggota::findOrFail($id);
        $anggota->nama=$request->nama;
        $anggota->slug=Str::slug($request->nama);
        $anggota->gender=$request->gender;
        $anggota->tanggal_lahir=$request->tanggal_lahir;
        $anggota->nik=$request->nik;
        $anggota->pekerjaan=$request->pekerjaan;
        $anggota->alamat=$request->alamat;
        $anggota->rt=$request->rt;
        $anggota->rw=$request->rw;
        $anggota->kelurahan=$request->kelurahan;
        $anggota->kecamatan=$request->kecamatan;
        $anggota->kabupaten_kota=$request->kabupaten_kota;
        $anggota->korwil=$request->korwil;
        $anggota->tps=$request->tps;
        if($request->hasFile('ktp_image')){
            $anggota->ktp_image = Helper::imgUpdate($request->file('ktp_image'), $anggota->ktp_image);
        }
        // $anggota->ktp_image=Helper::imgStore($request->file('ktp_image'));
        $anggota->question_1=$request->question_1;
        $anggota->question_2=$request->question_2;
        $anggota->question_3=$request->question_3;
        $anggota->question_4=$request->question_4;
        $anggota->question_5=$request->question_5;
        $anggota->user_id=Auth::user()->id;

        $anggota->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $anggota = Anggota::findOrFail($id);
        Helper::imgDelete($anggota->ktp_image);
        $anggota->delete();
    }


    public function multipleDelete(Request $request)
    {

        foreach($request->all() as $item){
            $id = $item['id'];
            $anggota = Anggota::findOrFail($id);
            Helper::imgDelete($anggota->ktp_image);
            $anggota->delete();
        }

    }

    public function dataValidation($request, $id = null)
    {

        if($id == null){
            $nama = 'required|string';

        }else{
            $nama = 'required|string,'.$id;
        }

        $request->validate(
            [
                'nama' => $nama,
                // 'slug'=> 'required',
                'gender'=> 'required',
                'tanggal_lahir'=> 'required',
                'nik'=> 'required',
                'pekerjaan'=> 'required',
                'alamat'=> 'required',
                'rt'=> 'required',
                'rw'=> 'required',
                'kelurahan'=> 'required',
                'kecamatan'=> 'required',
                'kabupaten_kota'=> 'required',
                'korwil'=> 'required',
                'tps'=> 'required',
                // 'ktp_image'=> Helper::imgValidation($id, $request->file('ktp_image')),
                'question_1'=> 'required',
                'question_2'=> 'required',
                'question_3'=> 'required',
                // 'question_4'=> 'required',
                // 'question_5'=> 'required'
            ]
        );

    }
}
