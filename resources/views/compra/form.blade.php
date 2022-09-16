<div class="mb-3 col-4">
    <select name="producto_id" class="form-control" id="exampleFormControlSelect1">
        <option>Seleccione</option>
         @foreach ($productos as $producto)
         <option value="{{$producto->id}}">{{$producto->nombre}}</option>
         @endforeach
    </select>  
</div>
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">

<input type="hidden" name="status" value="0">