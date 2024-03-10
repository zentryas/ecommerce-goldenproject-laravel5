@component('mail::message')
# Silahkan Aktivasi Akun Anda

Terimakasih telah membuat akun customer di GOLDEN FACE STORE Silahkan menekan tombol aktivasi untuk proses selanjutnya

@component('mail::button', ['url' => route('auth.activate', [
            'token' => $user->activation_token,
            'email' => $user->email,
        ])
    ]
)
Aktivasi
@endcomponent

Thanks,<br>
Salam hangat dari GOLDEN FACE STORE
@endcomponent
