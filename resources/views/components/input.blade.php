@php
	$id = $id ?? "x-imput" . rand(1 , 100);
	$name = $name ?? "noname";
	$value = $value ?? old($name);
	$placeholder = $placeholder ?? "";
	$label = $label ?? 'Pregunta';
	$type = $type ?? "text";
@endphp

<div class="form-floating mb-4">
	@if ($type === "textarea")
	<textarea {{ $attributes->merge(["class" =>"form-control"]) }} placeholder="{{$placeholder}}" id="{{$id}}" style="height: 100px" name="{{$name}}" required>{{$value}}</textarea>
	@elseif ($type === "select")
	<select class="form-select" id="{{$id}}" name="{{$name}}" required>
		<option @if (!$value) selected @endif value="">{{$placeholder}}</option>
		@foreach($items ?? collect([]) as $item)
		<option value="{{$item->id}}" @if ($value == $item->id) selected @endif>{{$item->name}}
		@endforeach
	</select>
	@else
	<input type="{{$type}}" {{ $attributes->merge(["class" =>"form-control"]) }} id="{{$id}}" placeholder="{{$placeholder}}" name="{{$name}}" value="{{$value}}" @if ($type === "number") step="{{$step ?? '0.01'}}" @endif required>
	@endif
	<label for="{{$id}}">{{$label}}</label>
	<div class="invalid-feedback">
		{{$errors->first($name)}}
	</div>
</div>