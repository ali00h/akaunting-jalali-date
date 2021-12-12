@stack($name . '_input_start')


    <div
        class="form-group {{ $col }}{{ isset($attributes['required']) ? ' required' : '' }}{{ isset($attributes['readonly']) ? ' readonly' : '' }}{{ isset($attributes['disabled']) ? ' disabled' : '' }}"
        @if (isset($attributes['show']))
        v-if="{{ $attributes['show'] }}"
        @endif
        @if (isset($attributes[':disabled']))
        :class="[{'disabled' : {{ $attributes[':disabled'] }}}, {'has-error': {{ isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.get("' . $name . '")' }}}]"
        @else
        :class="[{'has-error': {{ isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.get("' . $name . '")' }}}]"
        @endif
    >
        @if (!empty($text))
            {!! Form::label($name, $text, ['class' => 'form-control-label'])!!}
        @endif

        <div class="input-group input-group-merge {{ $group_class }}">
            <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-{{ $icon }}"></i>
                        </span>
            </div>
            {!! Form::text($name . "persianpicker", "", array_merge([
                'class' => 'form-control persian-date-picker',
                'autocomplete' => 'off',
                'placeholder' => trans('general.form.enter', ['field' => $text]),
            ],['id' => $name . 'persianpicker'])) !!}


        </div>

        <div class="invalid-feedback d-block"
             v-if="{{ isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.has("' . $name . '")' }}"
             v-html="{{ isset($attributes['v-error-message']) ? $attributes['v-error-message'] : 'form.errors.get("' . $name . '")' }}">
        </div>
    </div>




    <akaunting-date
        class="{{ $col }}{{ isset($attributes['required']) ? ' required' : '' }} {{ 'cpdp' . $name }} d-none"

        @if (!empty($attributes['v-error']))
        :form-classes="[{'has-error': {{ $attributes['v-error'] }} }]"
        @else
        :form-classes="[{'has-error': form.errors.get('{{ $name }}') }]"
        @endif
        :group_class="'{{ $group_class }}'"

        icon="fa fa-{{ $icon }}"
        title="{{ $text }}"
        placeholder="{{ trans('general.form.select.field', ['field' => $text]) }}"
        name="{{ $name }}"

        @if (isset($value) || old($name))
        value="{{ old($name, $value) }}"
        @endif

        @if (!empty($attributes['model']))
        :model="{{ $attributes['model'] }}"
        @endif

        :date-config="{
            wrap: true, // set wrap to true only when using 'input-group'
            allowInput: false,
        @if (!empty($attributes['show-date-format']))
            altInput: true,
            altFormat: '{{ $attributes['show-date-format'] }}',
        @endif
        @if (!empty($attributes['date-format']))
            dateFormat: '{{ $attributes['date-format'] }}',
        @endif
        @if (!empty($attributes['min-date']))
            minDate: {{ $attributes['min-date'] }},
        @endif
        @if (!empty($attributes['max-date']))
            maxDate: {{ $attributes['max-date'] }},
        @endif
            }"

        locale="{{ language()->getShortCode() }}"

        @if (isset($attributes['period']))
        period="{{ $attributes['period'] }}"
        @endif

        @if (!empty($attributes['v-model']))
        @interface="form.errors.clear('{{ $attributes['v-model'] }}'); {{ $attributes['v-model'] . ' = $event' }}"
        @elseif (!empty($attributes['data-field']))
        @interface="form.errors.clear('{{ 'form.' . $attributes['data-field'] . '.' . $name }}'); {{ 'form.' . $attributes['data-field'] . '.' . $name . ' = $event' }}"
        @else
        @interface="form.errors.clear('{{ $name }}'); form.{{ $name }} = $event"
        @endif

        @if (!empty($attributes['hidden_year']))
        hidden-year
        @endif

        @if (!empty($attributes['min-date-dynamic']))
        :data-value-min="{{ $attributes['min-date-dynamic'] }}"
        @endif

        @if (!empty($attributes['change']))
        @change="{{ $attributes['change'] }}"
        @endif

        @if (isset($attributes['required']))
        :required="{{ ($attributes['required']) ? 'true' : 'false' }}"
        @endif

        @if (isset($attributes['readonly']))
        :readonly="{{ $attributes['readonly'] }}"
        @endif

        @if (isset($attributes['disabled']))
        :disabled="{{ $attributes['disabled'] }}"
        @endif

        @if (isset($attributes['show']))
        v-if="{{ $attributes['show'] }}"
        @endif

        @if (isset($attributes['v-error-message']))
        :form-error="{{ $attributes['v-error-message'] }}"
        @else
        :form-error="form.errors.get('{{ $name }}')"
        @endif
    ></akaunting-date>


@stack($name . '_input_end')


@push('scripts_end')
    <link rel="stylesheet" href="{{ asset('modules\JalaliDate\Resources\assets\sass\persian-datepicker.min.css?v=' . module_version('jalali-date')) }}"/>
    <script src="{{ asset('modules\JalaliDate\Resources\assets\js\persian-date.min.js?v=' . module_version('jalali-date')) }}"></script>
    <script src="{{ asset('modules\JalaliDate\Resources\assets\js\persian-datepicker.min.js?v=' . module_version('jalali-date')) }}"></script>
    <script type="module" src="{{ asset('modules\JalaliDate\Resources\assets\js\jalali-date.js?v=' . module_version('jalali-date')) }}"></script>
@endpush
