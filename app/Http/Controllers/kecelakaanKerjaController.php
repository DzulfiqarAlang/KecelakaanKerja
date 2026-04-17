<?php

namespace App\Http\Controllers;

use App\Models\KecelakaanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class kecelakaanKerjaController extends Controller
{
    private function encryptFile($file)
{
    $key = hash('sha256', env('AES_SECRET_KEY'));
    $iv = openssl_random_pseudo_bytes(16);

    $fileContent = file_get_contents($file->getRealPath());

    $start = microtime(true);

    $encrypted = openssl_encrypt(
        $fileContent,
        'AES-256-CBC',
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );

    $end = microtime(true);
    $encryptionTime = $end - $start;

    \Log::info("Waktu Enkripsi AES-256-CBC: " . $encryptionTime . " detik");

    return $iv . $encrypted;
}

    private function decryptFile($encryptedData)
{
    $key = hash('sha256', env('AES_SECRET_KEY'));

    $iv = substr($encryptedData, 0, 16);
    $ciphertext = substr($encryptedData, 16);

    $start = microtime(true);

    $decrypted = openssl_decrypt(
        $ciphertext,
        'AES-256-CBC',
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );

    $end = microtime(true);
    $decryptionTime = $end - $start;

    \Log::info("Waktu Dekripsi AES-256-CBC: " . $decryptionTime . " detik");

    return $decrypted;
}
public function showImage($id)
{
    $kerja = KecelakaanKerja::findOrFail($id);

    if (!$kerja->foto || !Storage::disk('public')->exists($kerja->foto)) {
        abort(404);
    }

    $encryptedData = Storage::disk('public')->get($kerja->foto);

    $decrypted = $this->decryptFile($encryptedData);

    if (!$decrypted) {
        abort(500);
    }

    
    $manager = new ImageManager(new Driver());
    $img = $manager->read($decrypted);

    $img->text(
    'TELKOM WITEL KUDUS',
    $img->width() / 2,
    $img->height() / 2,
    function ($font) {
        $font->size(100);
        $font->color('rgba(255,255,255,0.7)'); 
        $font->align('center');
        $font->valign('middle');
        $font->angle(-25); 
    }
);

    return response($img->toJpeg())
        ->header('Content-Type', 'image/jpeg')
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate')
        ->header('Pragma', 'no-cache');
}

    // TAMPILKAN DATA
    public function index()
    {
        $kerja = KecelakaanKerja::latest()->get();
        return view('admin.kecelakaanKerja', compact('kerja'));
    }

    // SIMPAN DATA (CREATE + ENKRIPSI)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $encryptedPath = null;

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');

            $fileName = Str::uuid() . '.enc';
            $path = 'kecelakaanKerja/' . $fileName;

            $encryptedData = $this->encryptFile($file);

            Storage::disk('public')->put($path, $encryptedData);

            $encryptedPath = $path;
        }

        KecelakaanKerja::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'foto' => $encryptedPath,
        ]);

        return redirect()->route('admin.kecelakaanKerja')
            ->with('success', 'Data berhasil ditambahkan dan dienkripsi AES-256-CBC.');
    }
    

    // UPDATE DATA (UPDATE + ENKRIPSI)
    public function update(Request $request, $id)
    {
        $kerja = KecelakaanKerja::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
        ];

        if ($request->hasFile('foto')) {

            // Hapus file lama
            if ($kerja->foto && Storage::disk('public')->exists($kerja->foto)) {
                Storage::disk('public')->delete($kerja->foto);
            }

            $file = $request->file('foto');

            $fileName = Str::uuid() . '.enc';
            $path = 'kecelakaanKerja/' . $fileName;

            $encryptedData = $this->encryptFile($file);

            Storage::disk('public')->put($path, $encryptedData);

            $data['foto'] = $path;
        }

        $kerja->update($data);

        return redirect()->route('admin.kecelakaanKerja')
            ->with('success', 'Data berhasil diperbarui dan dienkripsi AES-256-CBC.');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $kerja = KecelakaanKerja::findOrFail($id);

        if ($kerja->foto && Storage::disk('public')->exists($kerja->foto)) {
            Storage::disk('public')->delete($kerja->foto);
        }

        $kerja->delete();

        return redirect()->route('admin.kecelakaanKerja')
            ->with('success', 'Data berhasil dihapus.');
    }

    
}
