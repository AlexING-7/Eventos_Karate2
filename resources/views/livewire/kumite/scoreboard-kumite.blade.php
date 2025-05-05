<div>
    <style>
    .capa { display: flex; flex-direction: row; align-items: flex-start; justify-content: center; gap: 20px; flex-wrap: wrap; }
    .competitor { border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); padding: 20px; width: 100%; max-width: 300px; color: #fff; position: relative; display: flex; flex-direction: column; align-items: center; }
    .aka { background: #c62828; }
    .ao { background: #1565c0; }
    .competitor h2 { margin-bottom: 10px; font-size: 1.5rem; color: #fff}
    .score { font-size: 3rem; margin: 10px 0; }
    .warnings, .senshu { font-size: 1rem; margin: 10px 0; text-align: center; }
    .points-buttons { display: flex; flex-direction: column; gap: 10px; margin: 10px 0; }
    .warning-checkboxes, .penalty-checkboxes { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin: 10px 0; }
    .buttons button, .points-buttons button, .senshu-button, .timer-buttons button {
      padding: 10px 15px;
      font-size: 1rem;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-weight: bold;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: all 0.2s ease-in-out;
    }
    .aka .points-buttons button { background: linear-gradient(to right, #e53935, #d32f2f); color: #fff; }
    .ao .points-buttons button { background: linear-gradient(to right, #2196F3, #3e8fd8); color: #fff; }
    .buttons button:hover, .points-buttons button:hover, .senshu-button:hover, .timer-buttons button:hover {
      transform: scale(1.05);
      opacity: 0.9;
    }
    .points-buttons button { background: linear-gradient(to right, #2196F3, #21CBF3); color: #fff; }
    .senshu-button { background: linear-gradient(to right, #FFD54F, #FFEB3B); color: #000; }
    .senshu-indicator { position: absolute; top: 10px; right: 10px; font-size: 1.5rem; background: yellow; color: black; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; font-weight: bold; }
    .timer { background: #fff; text-align: center; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); padding: 20px; width: 100%; max-width: 200px; }
    .timer-display { font-size: 2.5rem; margin-bottom: 15px; }
    .timer-buttons button { background: linear-gradient(to right, #4CAF50, #81C784); color: #fff; }
    .etiqueta { display: flex; align-items: center; gap: 5px; }
    
    </style>
<div class="panel-body" style="text-align: center; margin: auto; width: 100%; font-size: 1.5rem;color:darkslategray">
  <h2 class="panel-title" style="font-size: 4rem; padding-top: 10px;">{{$categoria}}</h2>
  <p style="font-size: 3rem;">{{$tatami}} | {{$ronda}}</p>
  <p style="font-size: 3rem;">{{$participantes1}}-{{$participantes2}}</p>
</div>
  <div class="panel-body">
    <div class="capa">
    
      <div class="competitor aka" id="playerA">
      @if ($senshuA)
      <div class="senshu-indicator" id="indicatorA">S</div>
      @endif
        
        <h2>AKA</h2>
        <div class="score" id="scoreA">{{$scoreA}}</div>
        <div class="points-buttons">
          <button wire:click="addScore('A', 1)">Yuko</button>
          <button wire:click="addScore('A', 2)">Wazari</button>
          <button wire:click="addScore('A', 3)">Ippon</button>
        </div>
        <div class="senshu">
          Senshu: 
          @if ($senshuA)
            <span id="senshuA">SI</span>
          @else
            <span id="senshuA">NO</span>    
          @endif
          <div><button class="senshu-button" wire:click="toggleSenshu('A')">Senshu</button></div>
        </div>
        <div class="warning-checkboxes">
          <label class="etiqueta"><input type="checkbox" value="1C" wire:model="faltasA" wire:click="Warning()"> 1C</label>
          <label class="etiqueta"><input type="checkbox" value="2C" wire:model="faltasA" wire:click="Warning()"> 2C</label>
          <label class="etiqueta"><input type="checkbox" value="3C" wire:model="faltasA" wire:click="Warning()"> 3C</label>
          <label class="etiqueta"><input type="checkbox" value="HC" wire:model="faltasA" wire:click="Warning()"> HC</label>
          <label class="etiqueta"><input type="checkbox" value="H"  wire:model="faltasA" wire:click="Warning()"> H</label>
        </div>
        <div class="penalty-checkboxes">
          <label class="etiqueta"><input type="checkbox"> HANTEI</label>
          <label class="etiqueta"><input type="checkbox"> KIKEN</label>
          <label class="etiqueta"><input type="checkbox"> SHIKAKU</label>
        </div>
        <div class="points-buttons">
          <button wire:click="addScore('A', -1)">-1</button>
        </div>
        Warnings: {{ is_array($faltasA) ? implode(', ', $faltasA) : $faltasB }}
      </div>
  
      <div class="timer">
        <div class="timer-display" wire:poll.1s >{{ gmdate('i:s', $remaining) }}</div>
        <div class="timer-buttons">
          <button id="toggleTimerButton" wire:click="toggleTimer()">{{ $running ? 'Pausa' : 'Iniciar' }}</button>
          <button wire:click="resetTimer()">Reiniciar</button>
        </div>
      </div>
  
  
      <div class="competitor ao" id="playerB">
          @if ($senshuB)
          <div class="senshu-indicator" id="indicatorA">S</div>
          @endif
        <h2>AO</h2>
        <div class="score" id="scoreB">{{$scoreB}}</div>
        <div class="points-buttons">
          <button wire:click="addScore('B', 1)">Yuko</button>
          <button wire:click="addScore('B', 2)">Waza-ri</button>
          <button wire:click="addScore('B', 3)">Ippon</button>
        </div>
        <div class="senshu">
          Senshu: 
          @if ($senshuB)
            <span id="senshuB">SI</span>
          @else
            <span id="senshuB">NO</span>    
          @endif
          <div><button class="senshu-button" wire:click="toggleSenshu('B')">Senshu</button></div>
        </div>
        <div class="warning-checkboxes">
          <label class="etiqueta"><input type="checkbox" value="1C" wire:model="faltasB" wire:click="Warning()"> 1C</label>
          <label class="etiqueta"><input type="checkbox" value="2C" wire:model="faltasB" wire:click="Warning()"> 2C</label>
          <label class="etiqueta"><input type="checkbox" value="3C" wire:model="faltasB" wire:click="Warning()"> 3C</label>
          <label class="etiqueta"><input type="checkbox" value="HC" wire:model="faltasB" wire:click="Warning()"> HC</label>
          <label class="etiqueta"><input type="checkbox" value="H"  wire:model="faltasB" wire:click="Warning()"> H</label>
        </div>
        <div class="penalty-checkboxes">
          <label class="etiqueta"><input type="checkbox"> HANTEI</label>
          <label class="etiqueta"><input type="checkbox"> KIKEN</label>
          <label class="etiqueta"><input type="checkbox"> SHIKAKU</label>
        </div>
        <div class="points-buttons">
          <button wire:click="addScore('B', -1)">-1</button>
        </div>
        Warnings: {{ is_array($faltasB) ? implode(', ', $faltasB) : $faltasB }}
      </div>
    </div>
    
  </div>
  
  

</div>
