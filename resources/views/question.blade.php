<div class="row">
    <div class="col s12">
        <h4>{{ $id }}.</h4>
        <p>
            {{ $content }}
        </p>
    </div>
</div>
<div class="row">
    @for ($i = 0; $i < count($choices); $i++)
        <div class="col s{{ 7 - count($choices) }}">
            <input name="question{{ $id }}" id="{{ strval($id) . strval($i) }}" type="radio" value="{{ chr(65 + $i) }}" />
            <label for="{{ strval($id) . strval($i) }}" class="black-text">{{ $choices[$i] }}</label>
        </div>
    @endfor
</div>