<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

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
        //Capturar error
         try {
            //code...
            auth()->user()->newSubscription('Membresia Sport', $plan)->create($this->defaultPaymentMethod->id);

         } catch (\Exception $e) {

            // $this->emit('error', $e->getMessage());//asi se queda cuando esta en ingles por defecto
             $this->emit('error', __($e->getMessage()));//laravel toma ahora el valor del msj como una llave y busca el valor equivalente en el json que esta en la carpeta lang

         }
    }
    public function render()
    {
        return view('livewire.subscription');
    }
}
