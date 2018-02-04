<select class="form-control" name="section_id" required>
  @forelse($sections as $subSection)
    @if($subSection->level == 1)
      @if($subSection->id == $section->section_id || old('section_id') == $section->section_id)
        <option value="{{ $subSection->id }}" selected>{{ $subSection->name }}</option>
      @else
        <option value="{{ $subSection->id }}">{{ $subSection->name }}</option>
      @endif
    @endif
  @empty
    <option value="0">No hay secciones</option>
  @endforelse
</select>
