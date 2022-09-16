<div class="mb-3 col-4">
    {!! Form::text('nombre', $productos->nombre, ['class'=>'form-control', 'autocomplete' => 'off', 'id'=>'nombre','title'=>'Nombre','required' => 'required' ]) !!}
</div>
<div class="mb-3 col-4">
    {!! Form::text('precio', $productos->precio, ['class'=>'form-control', 'autocomplete' => 'off', 'id'=>'nombre','title'=>'Precio','required' => 'required' ]) !!}
</div>
<div class="mb-3 col-4">
    {!! Form::text('impuesto', $productos->impuesto, ['class'=>'form-control', 'autocomplete' => 'off', 'id'=>'nombre','title'=>'Impuesto','required' => 'required' ]) !!}    
</div>