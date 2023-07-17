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
        auth()->user()->newSubscription('Membresia Sport', $plan)->create($this->defaultPaymentMethod->id);
    }
    public function render()
    {
        return view('livewire.subscription');
    }
}
