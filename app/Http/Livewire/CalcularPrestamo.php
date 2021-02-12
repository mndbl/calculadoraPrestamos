<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class CalcularPrestamo extends Component
{
    use WithPagination;
    public $sistema, $tipoCalculo, $monto, $capital, $periodo, $tasa, $tasaConvertida, $plazo, $cuota, 
    $cuotas = [], $calculado = false, $intGen, $totalGen;
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
        $this->reset('cuotas');
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
                $this->calculado = true;
        
    }
    public function sistFrances(){
        //construir tabla
        for ($i=1; $i < $this->plazo + 1; $i++) { 
            $this->cuotas[$i] = [
                'numero' => ($i),
                'cuota' => number_format($this->cuota, 2, ',', '.'),
                'interes' => number_format($this->capital * $this->tasaConvertida, 2, ',', '.'), 
                'amortizado' => number_format($amortizado = $this->cuota - ($this->capital * $this->tasaConvertida) , 2, ',', '.'),
                'vivo' => number_format($this->capital = $this->capital - $amortizado , 2, ',', '.')
            ];
        }
        $this->intGen = $this->cuota * $this->plazo - $this->monto;        
        $this->totalGen = $this->cuota * $this->plazo;        
    }
    public function sistAleman(){
        $this->cuota = $this->monto / $this->plazo;
        //construir tabla
        for ($i=1; $i < $this->plazo + 1; $i++) { 
            $this->cuotas[$i] = [
                'numero' => ($i),
                'cuota' => number_format($this->cuota + $this->capital * $this->tasaConvertida, 2, ',', '.'),
                'interes' => number_format($this->capital * $this->tasaConvertida, 2, ',', '.'), 
                'amortizado' => number_format($amortizado = $this->cuota, 2, ',', '.'),
                'vivo' => number_format($this->capital = $this->capital - $amortizado , 2, ',', '.')
            ];
            $this->intGen = $this->intGen + $this->capital * $this->tasaConvertida;
        }
        $this->totalGen = $this->cuota * $this->plazo + $this->intGen;        
    }
    public function sistEEUU(){
        //construir tabla
        for ($i=1; $i < $this->plazo + 1; $i++) { 
            if ($i < $this->plazo) {
                
            $this->cuotas[$i] = [
                'numero' => ($i),
                'cuota' => number_format($this->capital * $this->tasaConvertida, 2, ',', '.'),
                'interes' => number_format($this->capital * $this->tasaConvertida, 2, ',', '.'), 
                'amortizado' => number_format($this->capital , 2, ',', '.'),
                'vivo' => number_format($this->capital, 2, ',', '.')
            ];
            }else{
                $this->cuotas[$i] = [
                    'numero' => ($i),
                    'cuota' => number_format($this->capital, 2, ',', '.'),
                    'interes' => number_format($this->capital * $this->tasaConvertida, 2, ',', '.'), 
                    'amortizado' => number_format($this->capital, 2, ',', '.'),
                    'vivo' => number_format($this->capital - $this->capital, 2, ',', '.')
                ];
            }
        }
        $this->intGen = $this->capital * $this->tasaConvertida * $this->plazo;        
        $this->totalGen = $this->capital + $this->capital * $this->tasaConvertida * $this->plazo;        
    }
    public function borrar(){
        $this->reset([
            'monto', 'periodo', 'tasa', 'plazo', 'calculado'
        ]);
    }
}
