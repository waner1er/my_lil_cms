<label for="{{$name}}-select">Choose a {{$name}}:</label>

<select name="{{$name}}" id="{{$name}}-select">
  <option value="">--Please choose an option--</option>
  @foreach($elements as $element)
    <option value="{{$element->id}}">{{$element->name}}</option>
  @endforeach
</select>