<x-mail::message>
# Pendaftaran Berhasil!

Halo, **{{ $registration->full_name }}**!

Selamat! Anda telah berhasil terdaftar untuk **Cloud Computing 2025**. Kami senang Anda bergabung dengan kami.

Berikut adalah detail pendaftaran Anda yang telah kami simpan:

{{-- Menggunakan Panel agar terlihat lebih rapi --}}
<x-mail::panel>
* **Nama Lengkap:** {{ $registration->full_name }}
* **Email:** {{ $registration->student_email }}
* **Tanggal Lahir:** {{ \Carbon\Carbon::parse($registration->birthdate)->format('d F Y') }}
</x-mail::panel>

Anda dapat mengunjungi kembali website kami kapan saja dengan menekan tombol di bawah ini.

{{-- 
  INI PERBAIKAN UTAMA:
  :url="url('/')" akan otomatis mengambil APP_URL dari file .env Anda 
  (yaitu 'http://cc.test') dan mengarahkannya ke halaman utama.
--}}
<x-mail::button :url="url('/')" color="primary">
Kunjungi Website
</x-mail::button>

Terima kasih,<br>
Tim {{ config('app.name') }}
</x-mail::message>