    
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first('otp') }}</div>
    @endif

    <!-- <form action="{{ route('client.otp.verify') }}" method="POST">
        @csrf
        <input name="otp" type="text" placeholder="Enter OTP" required>
        <button type="submit">Verify OTP</button>
    </form> -->
   <x-guest-layout>
    <form action="{{ route('client.otp.verify') }}" class="kt-card-content flex flex-col gap-5 p-10" id="otp_form" method="POST">
        @csrf

        <div class="text-center mb-6">
            <img src="{{ asset('assets/media/app/default-logo.png') }}" alt="Logo" class="mx-auto h-20 w-auto">
        </div>
        
        <div class="text-center mb-2">
            <h3 class="text-lg font-medium text-mono mb-5">
                Vérifiez votre email
            </h3>
            <div class="flex flex-col">
                <span class="text-sm text-secondary-foreground mb-1.5">
                    Entrez le code de vérification envoyé à
                </span>
                <span class="text-sm font-medium text-mono">
                    @php
                        $email = old('email');
                        if($email) {
                            [$local, $domain] = explode('@',$email);
                            $firstletter = substr($local,0,1);
                            $lastletter = substr($local, -1);

                            if(strlen($local) < 2){
                                $email = '****';
                            }else{
                                $email = str_repeat('*', strlen($local) - 2);
                            }
                            echo $firstletter . $email . '@' . $domain;
                        }else {
                            echo 'votre email';
                        }
                    @endphp
                </span>
            </div>
        </div>

        <div class="flex flex-wrap justify-center gap-2">
            <input class="kt-input focus:border-primary/10 focus:ring-3 focus:ring-primary/10 size-10 shrink-0 px-0 text-center" 
                   maxlength="1" name="otp_0" placeholder="" type="text" value="" required />
            <input class="kt-input focus:border-primary/10 focus:ring-3 focus:ring-primary/10 size-10 shrink-0 px-0 text-center" 
                   maxlength="1" name="otp_1" placeholder="" type="text" value="" required />
            <input class="kt-input focus:border-primary/10 focus:ring-3 focus:ring-primary/10 size-10 shrink-0 px-0 text-center" 
                   maxlength="1" name="otp_2" placeholder="" type="text" value="" required />
            <input class="kt-input focus:border-primary/10 focus:ring-3 focus:ring-primary/10 size-10 shrink-0 px-0 text-center" 
                   maxlength="1" name="otp_3" placeholder="" type="text" value="" required />
            <input class="kt-input focus:border-primary/10 focus:ring-3 focus:ring-primary/10 size-10 shrink-0 px-0 text-center" 
                   maxlength="1" name="otp_4" placeholder="" type="text" value="" required />
            <input class="kt-input focus:border-primary/10 focus:ring-3 focus:ring-primary/10 size-10 shrink-0 px-0 text-center" 
                   maxlength="1" name="otp_5" placeholder="" type="text" value="" required />
        </div>

        @if ($errors->any())
            <div class="text-center">
                <span class="text-sm text-red-600">
                    {{ $errors->first() }}
                </span>
            </div>
        @endif

        <div class="flex items-center justify-center mb-2">
            <span class="text-2sm text-secondary-foreground me-1.5">
                Vous n'avez pas reçu de code ?
            </span>
            <a class="text-2sm kt-link" href="{{ route('client.login') }}">
                Renvoyer
            </a>
        </div>

        <button class="kt-btn kt-btn-primary flex justify-center grow" type="submit">
            Continuer
        </button>
    </form>

    <script>
        // Auto-focus et navigation entre les champs OTP
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[name^="otp_"]');
            
            inputs.forEach((input, index) => {
                // Auto-focus sur le premier champ
                if (index === 0) {
                    input.focus();
                }
                
                // Navigation automatique vers le champ suivant
                input.addEventListener('input', function() {
                    if (this.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });
                // Retour au champ precedent avec backspace
                input.addEventListener('keydown',function(){
                    if(this.value.length === 0 && index > 0 && event.key === 'Backspace') {
                        inputs[index -1].focus();
                    }
                })
            });
        });
    </script>
</x-guest-layout>
