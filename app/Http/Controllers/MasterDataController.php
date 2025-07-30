<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Stichoza\GoogleTranslate\GoogleTranslate as GoogleTranslateGoogleTranslate;

class MasterDataController extends Controller
{
    public function menu(){
        $user = User::get();
        $jabatan = Jabatan::get();
        $ruangan = Workspace::get();
        return view('master.menu', ['user' => $user->count(), 'jabatan' => $jabatan->count(), 'ruangan' => $ruangan->count()]);
    }

    public function pegawai(Request $request){
        $sort = $request->get('sort', 'users.name'); // Default sort by 'name'
        $direction = $request->get('direction', 'asc'); // Default direction 'asc'

        $query = $request->input('query'); // Menerima query pencarian dari input

        // Jika ada query pencarian, lakukan pencarian pada title dan content
        if ($query) {
            $pegawai = DB::table('users')->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
            ->join('workspaces', 'jabatans.workspace_id', '=', 'workspaces.id')
            ->select('users.*', 'workspaces.nama', 'jabatans.jabatan')
            ->where('users.name', 'like', "%{$query}%")
            ->orWhere('users.email', 'like', "%{$query}%")
            ->orWhere('users.tglLahir', 'like', "%{$query}%")
            ->orWhere('users.status', 'like', "%{$query}%")
            ->orWhere('workspaces.nama', 'like', "%{$query}%")
            ->orWhere('jabatans.jabatan', 'like', "%{$query}%")
            ->orderBy($sort, $direction)->paginate(20);
        } else {
            $pegawai = DB::table('users')->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
            ->join('workspaces', 'jabatans.workspace_id', '=', 'workspaces.id')
            ->select('users.*', 'workspaces.nama', 'jabatans.jabatan')
            ->orderBy($sort, $direction)->paginate(20);
        }
        
        //dd($pegawai);
        
        foreach ($pegawai as $item) {
            $item->nama = GoogleTranslateGoogleTranslate::trans($item->nama,app()->getLocale());
            $item->jabatan = GoogleTranslateGoogleTranslate::trans($item->jabatan,app()->getLocale());
            $item->status = GoogleTranslateGoogleTranslate::trans($item->status,app()->getLocale());
        }
        return view('master.pegawai', compact('pegawai', 'sort', 'direction'));
    }

    public function ruang(){
        $ruang = Workspace::get();
        foreach ($ruang as $item) {
            $item->nama = GoogleTranslateGoogleTranslate::trans($item->nama,app()->getLocale());
        }
        return view('master.ruang', ['ruang' => $ruang]);
    }

    public function jabatan(){
        $jabatan = DB::table('jabatans')->join('workspaces', 'workspaces.id', '=', 'jabatans.workspace_id')->select('jabatans.*', 'workspaces.nama')->get();
        //dd($jabatan);
        foreach ($jabatan as $item) {
            $item->divisi = GoogleTranslateGoogleTranslate::trans($item->divisi,app()->getLocale());
            $item->jabatan = GoogleTranslateGoogleTranslate::trans($item->jabatan,app()->getLocale());
            $item->nama = GoogleTranslateGoogleTranslate::trans($item->nama,app()->getLocale());
        }
        return view('master.jabatan', ['jabatan' => $jabatan]);
    }

    public function tambahJabatan(){
        $ruang = Workspace::get();
        foreach ($ruang as $item) {
            $item->nama = GoogleTranslateGoogleTranslate::trans($item->nama,app()->getLocale());
        }
        return view('master.tambahjabatan', ['ruang' => $ruang]);
    }

    public function tambahRuang(){
        return view('master.tambahruang');
    }

    public function kirimJabatan(Request $request){
        //dd($request);
        $request->validate([
            'jabatan' => 'required|unique:jabatans,jabatan',
            'divisi' => 'required',
            'ruangKerja' => 'required',
        ]);

        Jabatan::create([
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'workspace_id' => $request->ruangKerja,
        ]);

        $msg = 'Posisi pegawai berhasil ditambah!';
        $transMsg = GoogleTranslateGoogleTranslate::trans($msg,app()->getLocale());
        return redirect()->route('jabatan')->with('success', $transMsg);
    }

    public function editJabatan($id){
        $jabatan = Jabatan::where('id', '=', $id)->first();
        $ruang = Workspace::get();
        //dd($ruang);
        foreach ($ruang as $item) {
            $item->nama = GoogleTranslateGoogleTranslate::trans($item->nama,app()->getLocale());
        }
        
        return view('master.editjabatan', ['jabatan' => $jabatan, 'ruang' => $ruang]);
    }

    public function editRuang($id){
        //dd($id);
        $ruang = Workspace::where('id', '=', $id)->first();
        return view('master.editruang', ['ruang' => $ruang]);
    }

    public function kirimRuang(Request $request){
        //dd($request);
        $request->validate([
            'nama' => 'required|unique:workspaces,nama',
            'lokasi' => 'required',
            'bising' => 'required|integer|between:1,100',
        ]);

        Workspace::create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'bising' => $request->bising,
        ]);

        $msg = 'Ruang kerja berhasil ditambah!';
        $transMsg = GoogleTranslateGoogleTranslate::trans($msg,app()->getLocale());
        return redirect()->route('ruang')->with('success', $transMsg);
    }

    public function updateJabatan(Request $request){
        //dd($request);
        $request->validate([
            'jabatan' => 'required',
            'divisi' => 'required',
            'ruangKerja' => 'required',
        ]);

        $jabatan = Jabatan::where([
            ['id','=',$request->id],
        ])->first();
        //dd($jabatan);

        $data = [
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'workspace_id' => $request->ruangKerja,
        ];

        $jabatan->update($data);
        //dd($user);
        $msg = 'Posisi pegawai berhasil diubah!';
        $transMsg = GoogleTranslateGoogleTranslate::trans($msg,app()->getLocale());
        return redirect()->route('jabatan')->with('success', $transMsg);
    }

    public function updateRuang(Request $request){
        //dd($request);
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'bising' => 'required|integer|between:1,100',
        ]);

        $ruang = Workspace::where([
            ['id','=',$request->id],
        ])->first();
        //dd($jabatan);

        $data = [
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'bising' => $request->bising,
        ];

        $ruang->update($data);
        //dd($user);
        $msg = 'Ruang kerja berhasil diubah!';
        $transMsg = GoogleTranslateGoogleTranslate::trans($msg,app()->getLocale());
        return redirect()->route('ruang')->with('success', $transMsg);
    }

    public function hapusJabatan($id)
    {
        
        Jabatan::where([
            ['id','=',$id],
        ])->delete();

        $msg = 'Posisi pegawai berhasil dihapus!';
        $transMsg = GoogleTranslateGoogleTranslate::trans($msg,app()->getLocale());
        return redirect()->route('jabatan')->with('success', $transMsg);
    }

    public function hapusRuang($id)
    {
        Workspace::where([
            ['id','=',$id],
        ])->delete();

        $msg = 'Ruang kerja berhasil dihapus!';
        $transMsg = GoogleTranslateGoogleTranslate::trans($msg,app()->getLocale());
        return redirect()->route('ruang')->with('success', $transMsg);
    }

    public function api()
    {
        $http = new Client();
        $api = 'http://127.0.0.1:8000/api/users';
        $response = $http->get($api, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                // 'api-audiotest' => '3b96481852b94346d4e30c7f767ddc76c03db0eb;com.mobile.presensidemo',
                // 'email' => $request->email,
                // 'password' => $request->password
            ],
            'http_errors' => false
        ]);
        $api_result = json_decode((string)$response->getBody(), true);
        dd($api_result);
    }
}
