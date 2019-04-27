<div class="row">
    <div class="col s12">
        <h5>
            {{ $id }}. ({{$type}})
        </h5>
        <p>
            {!! $content !!}
        </p>
    </div>
</div>
<div class="row">
    @for ($i = 0; $i < count($choices); $i++)
        <div class="col l{{ 7 - count($choices) }} s12">
            <input name="question{{ $id }}" id="{{ strval($id) . strval($i) }}"
                   type="radio" value="{{ chr(65 + $i) }}"
            @if (isset($answer))
                {{ $answer ==  chr(65 + $i) ? ' checked="checked"' : ''}}
                    @endif
            />
            <label for="{{ strval($id) . strval($i) }}" class="black-text">{!! $choices[$i] !!}</label>
        </div>
    @endfor
</div>
