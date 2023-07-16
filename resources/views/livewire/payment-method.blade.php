<div>
    <section class="bg-gray-800 rounded shadow-lg mb-12">
        <div class="px-8 py-6">
            <h1 class="text-gray-50 text-lg font-semibold mb-4">Agregar método de pago</h1>
            <div class="flex" wire:ignore>
                <p class="text-gray-50 mr-6">Información de tarjeta</p>
                <div class="flex-1">
                    <input id="card-holder-name" class="form-control mb-4" placeholder="Nombre del titular de la tarjeta">

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element" class="form-control mb-2 text-gray-50"></div>

                    <span id="card-error-message" class="text-red-600 text-sm"></span>
                </div>
            </div>
        </div>

        <footer class="px-8 py-6 bg-gray-800 border-t border-gray-700">
            <div class="flex justify-end">
                <x-button id="card-button" data-secret="{{ $intent->client_secret }}">
                    Update Payment Method
                </x-button>
            </div>

        </footer>
    </section>

    <section class="bg-gray-800 rounded shadow-lg">
        <header class="px-8 py-6 bg-gray-800 border-b border-gray-700">
            <h1 class="text-gray-50 text-lg font-semibold">Métodos de pago agregados</h1>
        </header>
        <div class="px-8 py-6">

            <ul class="divide-y divide-gray-700 text-gray-50">
                {{-- Buscar en google api Stripe para ver que campos tiene el object metodo de pago paymentMethod --}}
                @foreach ($paymentMethods as $paymentMethod)
                    <li class="py-2">
                        <p><span class="font-semibold">{{$paymentMethod->billing_details->name}}</span> xxxx-{{$paymentMethod->card->last4}}</p>
                        <p>Expira: {{$paymentMethod->card->exp_month}}/{{$paymentMethod->card->exp_year}}</p>
                        <p>Marca: {{$paymentMethod->card->brand}}</p>
                    </li>
                @endforeach
            </ul>

        </div>
    </section>

    @push('js')
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');
        </script>

        <script>
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');


            cardButton.addEventListener('click', async (e) => {

                //Deshabilitar boton
                cardButton.disabled = true;

                const clientSecret = cardButton.dataset.secret;

                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                );
                //Volver a habilitar el boton
                cardButton.disabled = false;

                if (error) {
                    // Display "error.message" to the user...

                    let span = document.getElementById('card-error-message');
                    span.textContent = error.message;
                } else {
                    // The card has been verified successfully...
                    //Limpiar formulario
                    cardHolderName.value = '';
                    cardElement.clear();
                    @this.addPaymentMethod(setupIntent.payment_method);
                }
            });
        </script>
    @endpush

</div>
