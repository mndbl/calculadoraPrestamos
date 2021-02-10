<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class CalcularPrestamo extends Component
{
    use WithPagination;
    public $sistema, $tipoCalculo, $monto, $capital, $periodo, $tasa, $tasaConvertida, $plazo, $cuota, $cuotas = [], $calculado = false;
    public function render()
    {
        return view('livewire.calcular-prestamo');
    }
    public function calcular(){
        // dd('sistema');
        $this->validate([
            'sistema' => 'required|min:3',
            'monto' => 'required|numeric',
            'periodo' => 'required|min:3',
            'tasa' => 'required|numeric',
            'plazo' => 'required|numeric',
        ]);
        switch ($this->sistema) {
            case 'Aleman':
                $this->sistAleman();
                break;
            case 'EEUU':
                $this->sistEEUU();
                break;
            
           case 'Frances':
                $this->sistFrances();
                break;
        }
        $this->calculado = true;
        
    }
    public function sistFrances(){
        //tasa según el período
        switch ($this->periodo) {
            case 'Mensual':
                $this->tasaConvertida = $this->tasa / 12 / 100;
                break;
            case 'Bimestral':
                $this->tasaConvertida = $this->tasa / 6 / 100;
                break;
            case 'Trimestral':
                $this->tasaConvertida = $this->tasa / 4 / 100;
                break;
            case 'Semestral':
                $this->tasaConvertida = $this->tasa / 2 / 100;
                break;
            case 'Diario':
                $this->tasaConvertida = $this->tasa / 360 / 100;
                break;
            
            default:
                $this->tasaConvertida = $this->tasa / 100;
                break;
        }
        $this->capital = $this->monto;
        //calcular cuota método francés a=Co ( i / 1 - (1 + i)n)
        // (1+i)n
        $divisor = 1 - pow(1 + $this->tasaConvertida, -$this->plazo);
        // i / 1 - (1 + i)n
        $factor = $this->tasaConvertida / $divisor;
        $this->cuota = $this->monto * $factor;
    }
    public function sistAleman(){
        dd('<h1>Sistema Alemán</h1>');
    }
    public function sistEEUU(){
        dd('<h1>Sistema EEUU</h1>');
    }
    public function borrar(){
        $this->reset([
            'monto', 'periodo', 'tasa', 'plazo', 'calculado'
        ]);
    }
}
