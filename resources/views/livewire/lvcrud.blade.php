<div style="margin-top: 100px;">
    <div class="container">
        <div class="input-group mb-3">
            <input type="text" class="form-control" wire:model.live="buscar" placeholder="buscar">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" wire:click="clear" data-bs-target="#RegistroModal" >Nuevo</button>
          </div>
        @component('_components/tabla')
            <!-- importe del crud -->

            @slot('contenido') <!-- seccion contenido del complemento tabla, foreach-->
         
            @forelse ($estudiante as $item)
            <tr>
                <th scope="row"> {{$loop->iteration}}</th>
                <td>{{$item->nombre}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->edad}}</td>
                <td>{{$item->correo}}</td>
              <td class="text-end">
                <div class="btn-group text-end" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-secondary" wire:click="edit('{{$item->id}}')" data-bs-toggle="modal" data-bs-target="#RegistroModal">editar</button>
                    <button type="button" class="btn btn-outline-secondary" wire:click="delete('{{$item->id}}')">eliminar</button>
                  </div>
              </td>
              </tr>
            
              @empty
               <tr><td>no se encuentran resultados  </td></tr>
            @endforelse

            @endslot

            @slot('paginacion') {{ $estudiante->links() }}@endslot<!-- finalizacion de la tabla-->

        @endcomponent <!-- finalizacion del componente tabla-->
       

        @component('_components/modal')    <!-- importe de modal-->
       
            @slot('titulo','')  <!-- titulo de modal-->
      
            @slot('contenido')  <!-- importe de interfaz del formulario -->
        
            @component('_components/registro') @endcomponent<!-- importe del contenido >>(_component/rergistro) -->


            @if ($id==0)  @slot('accion','store')  @slot('parametro')@endslot 
            @else @slot('accion','update') @slot('parametro') {{$id}} @endslot @endif <!-- accion del botón de la plantilla modal "metodo"("parametro")--> 
            

      
            @endslot
        @endcomponent<!-- finalizacion del componente modal-->
    </div>
</div>
