<div class="mb-3">
    <label for="nombre" class="form-label">Nombre: </label>
    <input type="nombre" class="form-control" id="nombre" wire:model.live="nombre" placeholder="nombres..." required>
    @error('nombre') <span class="error">{{ $message }}</span> @enderror
 
  </div>
  <div class="mb-3">
    <label for="direccion" class="form-label">direccion: </label>
    <input type="text" class="form-control" id="direccion" wire:model.live="direccion"  placeholder="direccion..." required>
    @error('direccion') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label for="edad" class="form-label">edad: </label>
    <input type="edad" class="form-control" id="edad" wire:model.live="edad"  placeholder="edad..."   min="0" max="100" required>
    @error('edad') <span class="error">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3">
    <label for="correo" class="form-label">correo</label>
    <input type="email" class="form-control" id="correo"  wire:model.live="correo"  placeholder="correo...">
    @error('correo') <span class="error">{{ $message }}</span> @enderror
  </div>