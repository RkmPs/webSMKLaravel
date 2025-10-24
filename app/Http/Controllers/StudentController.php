<?php

namespace App\Http\Controllers;

use App\Models\SiswaUjikom;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * index
     */
    public function index(): View
    {
        $students = SiswaUjikom::latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    /**
     * create
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * store
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nis'            => 'required|unique:siswa_ujikom,nis',
            'nama'           => 'required|string|max:100',
            'tempat_lahir'   => 'required|string|max:50',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'kelas'          => 'required|string|max:10',
            'alamat'         => 'required|string',
            'kelurahan'      => 'required|string|max:50',
            'kecamatan'      => 'required|string|max:50',
            'kota_kabupaten' => 'required|string|max:50',
            'provinsi'       => 'required|string|max:50',
            'foto'           => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload foto
        $foto = $request->file('foto');
        $foto->storeAs('public/students', $foto->hashName());

        //create student
        SiswaUjikom::create([
            'nis'            => $request->nis,
            'nama'           => $request->nama,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'kelas'          => $request->kelas,
            'alamat'         => $request->alamat,
            'kelurahan'      => $request->kelurahan,
            'kecamatan'      => $request->kecamatan,
            'kota_kabupaten' => $request->kota_kabupaten,
            'provinsi'       => $request->provinsi,
            'foto'           => $foto->hashName(),
        ]);

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     */
    public function show(int $nis): View
    {
        $student = SiswaUjikom::findOrFail($nis);
        return view('students.show', compact('student'));
    }

    /**
     * edit
     */
    public function edit(int $nis): View
    {
        $student = SiswaUjikom::findOrFail($nis);
        return view('students.edit', compact('student'));
    }

    /**
     * update
     */
    public function update(Request $request, int $nis): RedirectResponse
    {
        $student = SiswaUjikom::findOrFail($nis);

        //validate form
        $request->validate([
            'nama'           => 'required|string|max:100',
            'tempat_lahir'   => 'required|string|max:50',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'kelas'          => 'required|string|max:10',
            'alamat'         => 'required|string',
            'kelurahan'      => 'required|string|max:50',
            'kecamatan'      => 'required|string|max:50',
            'kota_kabupaten' => 'required|string|max:50',
            'provinsi'       => 'required|string|max:50',
            'foto'           => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //check if new photo is uploaded
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/students', $foto->hashName());

            //delete old photo
            Storage::delete('public/students/' . $student->foto);

            //update student with new photo
            $student->update([
                'nama'           => $request->nama,
                'tempat_lahir'   => $request->tempat_lahir,
                'tanggal_lahir'  => $request->tanggal_lahir,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'kelas'          => $request->kelas,
                'alamat'         => $request->alamat,
                'kelurahan'      => $request->kelurahan,
                'kecamatan'      => $request->kecamatan,
                'kota_kabupaten' => $request->kota_kabupaten,
                'provinsi'       => $request->provinsi,
                'foto'           => $foto->hashName(),
            ]);
        } else {
            //update student without new photo
            $student->update([
                'nama'           => $request->nama,
                'tempat_lahir'   => $request->tempat_lahir,
                'tanggal_lahir'  => $request->tanggal_lahir,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'kelas'          => $request->kelas,
                'alamat'         => $request->alamat,
                'kelurahan'      => $request->kelurahan,
                'kecamatan'      => $request->kecamatan,
                'kota_kabupaten' => $request->kota_kabupaten,
                'provinsi'       => $request->provinsi,
            ]);
        }

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     */
    public function destroy(int $nis): RedirectResponse
    {
        $student = SiswaUjikom::findOrFail($nis);

        //delete photo
        Storage::delete('public/students/' . $student->foto);

        //delete student
        $student->delete();

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
