<div>
  <div id="page-content">
                
    <div class="row">
        <div class="col-lg-12">

            <div class="panel">
                <div class="panel-body ">
                    
                    <h1 class="text-center">{{$categoria}}</h1>

                </div>
                
            </div>
            <div class="panel">
              <div class="panel-body ">
                  
                  <h3 class="text-center">{{$nombre1}}</h3>
                  
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Kata</th>
                          <th scope="col">Juez 1</th>
                          <th scope="col">Juez 2</th>
                          <th scope="col">Juez 3</th>
                          <th scope="col">Juez 4</th>
                          <th scope="col">Juez 5</th>
                          <th scope="col">Juez 6</th>
                          <th scope="col">Juez 7</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <tr>
                          <td scope='row'>{{$kata1->kata}}</td>
      
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas1['juez1'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos1.juez1"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas1['juez2'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos1.juez2"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas1['juez3'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos1.juez3"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas1['juez4'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos1.juez4"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas1['juez5'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos1.juez5"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas1['juez6'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos1.juez6"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas1['juez7'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos1.juez7"></td>
                          <td>{{$total1}}</td>
                        </tr>
                        
                      </tbody>
                    </table>
              </div>
          </div>
      
          <div class="panel">
              <div class="panel-body ">
                  
                  <h3 class="text-center">{{$nombre2}}</h3>
                  
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Kata</th>
                          <th scope="col">Juez 1</th>
                          <th scope="col">Juez 2</th>
                          <th scope="col">Juez 3</th>
                          <th scope="col">Juez 4</th>
                          <th scope="col">Juez 5</th>
                          <th scope="col">Juez 6</th>
                          <th scope="col">Juez 7</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <tr>
                          <td scope='row'>{{$kata2->kata}}</td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas2['juez1'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos2.juez1"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas2['juez2'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos2.juez2"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas2['juez3'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos2.juez3"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas2['juez4'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos2.juez4"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas2['juez5'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos2.juez5"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas2['juez6'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos2.juez6"></td>
                          <td class="cell-fit p-0"><input type="text" class="form-control {{$celdas2['juez7'] ? 'input-transparent' : 'input-red'}}" wire:model.live="puntos2.juez7"></td>
                          <td>{{$total2}}</td>
                        </tr>
                        
                      </tbody>
                    </table>
              </div>
          </div>
          <div>
            <button type="submit" class="btn btn-primary" wire:click="save">Resultado</button>
          </div>
          
      
      
            
        </div>
    </div>				
        
  </div>
  <style>
            
    .input-transparent {
      background: transparent !important;
      border: none !important;
      box-shadow: none !important;
      outline: none !important;
      padding: 0 !important;
      margin: 0;
      width: 100%;
      
      /* Quitar flechas/spinners */
      -moz-appearance: textfield;
      -webkit-appearance: none;
      appearance: none;
      
      /* Heredar estilos de texto */
      font-family: inherit;
      font-size: inherit;
      color: inherit;
    }
  
    .input-red {
      background: red !important;
      border: none !important;
      box-shadow: none !important;
      outline: none !important;
      padding: 0 !important;
      margin: 0;
      width: 100%;
      
      /* Quitar flechas/spinners */
      -moz-appearance: textfield;
      -webkit-appearance: none;
      appearance: none;
      
      /* Heredar estilos de texto */
      font-family: inherit;
      font-size: inherit;
      color: white;
    }
    /* Eliminar spinners en navegadores WebKit */
    .input-transparent::-webkit-outer-spin-button,
    .input-transparent::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  
    .cell-fit {
      padding: 0 !important;
      width: 10%;  /* Fuerza el ancho mínimo */
      white-space: nowrap;
    }
  
    /* Opcional: Ajustar focus para accesibilidad */
    .input-transparent:focus {
      box-shadow: 0 0 0 1px rgba(13, 110, 253, 0.25) !important;
    }
  
  
  </style>
</div>
