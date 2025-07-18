<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientOtpController extends Controller
{
    public function showForm()
    {
        return view('client.auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp_0' => 'required|string|max:1',
            'otp_1' => 'required|string|max:1',
            'otp_2' => 'required|string|max:1',
            'otp_3' => 'required|string|max:1',
            'otp_4' => 'required|string|max:1',
            'otp_5' => 'required|string|max:1',
        ]);

        // Récupération du code OTP complet à partir des champs individuels
        $otpCode = '';
        for ($i = 0; $i < 6; $i++) {
            $otpCode .= $request->input("otp_{$i}", '');
        }

        $client = Client::find(session('client_id'));

        if (
            $client &&
            (string) $client->otp_code === (string) $otpCode &&
            $client->otp_expires_at > now()
        ) {
            Auth::guard('client')->login($client);   // connexion effective
            $client->email_verified_at = now();      // marquer comme vérifié
            $client->save();
            session()->forget('client_id');          // nettoyage
            if ($client->stores()->count() === 0) {
                return redirect()->route('client.store.create')
                    ->with('success', 'OTP verified successfully!');
            }
            return redirect()->route('client.dashboard')
                    ->with('success', 'OTP verified successfully!');
        }

        return back()->withErrors(['otp' => 'Code OTP invalide ou expiré.']);
    }
}
