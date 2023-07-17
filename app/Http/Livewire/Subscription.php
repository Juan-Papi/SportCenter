<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Subscription extends Component
{
    //empieza en get y termina en property por tanto es una propiedad computada
    public function getDefaultPaymentMethodProperty()
    {
        return auth()->user()->defaultPaymentMethod();
    }

    public function newSubscription($plan)
    {
        //dd($plan);//para probar
        if (!$this->defaultPaymentMethod) {
            // session()->flash('error', 'No tienes un método de pago por defecto');//funciona sin el push js y es mas pele porque se ejecuta una vez y despues vuelves a dar click y ya no se muestra el script
            $this->emit('error', '¡No tienes un método de pago por defecto!');
            return;
        }
        auth()->user()->newSubscription('Membresia Sport', $plan)->create($this->defaultPaymentMethod->id);
    }
    public function render()
    {
        return view('livewire.subscription');
    }
}
