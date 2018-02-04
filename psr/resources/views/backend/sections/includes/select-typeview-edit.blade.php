<select class="form-control" name="typeview_id" required>
  @forelse($typeviews as $typeview)
      @if($typeview->id == $section->typeview_id || old('typeview_id') == $section->typeview_id)
        <option value="{{ $typeview->id }}" selected>{{ $typeview->name }}</option>
      @else
        <option value="{{ $typeview->id }}">{{ $typeview->name }}</option>
      @endif
  @empty
    <option value="0">No hay tipos de vista</option>
  @endforelse
</select>
