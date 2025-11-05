<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Mail; 
use App\Mail\RegistrationConfirmation; 

class RegistrationController extends Controller
{
    /**
     * Menampilkan formulir registrasi.
     */
    public function create()
    {
        // Fungsi ini harus ada untuk menampilkan view!
        return view('register');
    }

    /**
     * Menyimpan data dari formulir dan mengirim email.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'studentEmail' => 'required|email|unique:registrations,student_email',
            'password' => 'required|string|min:8|confirmed',
            'birthdate' => 'required|date',
        ]);

        // 2. Simpan ke Database
        $registration = Registration::create([
            'full_name' => $validatedData['fullName'],
            'student_email' => $validatedData['studentEmail'],
            'password' => Hash::make($validatedData['password']), 
            'birthdate' => $validatedData['birthdate'],
        ]);

        // 3. Buat Array $mailData dari data registrasi (untuk Mailable teman Anda)
        $mailData = [
            'subject' => 'Cloud Computing 2025 - Pendaftaran Berhasil',
            'name' => $registration->full_name,
            'email' => $registration->student_email,
            'password' => $request->password, // Hanya untuk keperluan tugas
            'birth_date' => $registration->birthdate,
            'message' => 'Selamat, Anda berhasil mendaftar!',
        ];

        // 4. Tentukan Penerima
        // $studentEmail = $registration->student_email;
        // $teachingTeam = [
        //     'mychael.engel@ciputra.ac.id',
        //     'hgalih@ciputra.ac.id'
        // ];
        
        // 5. Kirim Email ke Mahasiswa
           Mail::to($registration->student_email)->send(new RegistrationConfirmation($mailData));
           
        // 6. Kirim ke Tim Pengajar
        // Mail::to($teachingTeam)->send(new RegistrationConfirmation($mailData));

        // 7. Kembalikan ke halaman formulir
        return redirect()->route('register.form')
                         ->with('success', 'Registrasi berhasil! Silakan cek email Anda.');
    }
}
