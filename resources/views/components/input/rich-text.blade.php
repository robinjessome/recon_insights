@props([
    'id' => null,
    'current' => null,
    'dispatch' => null,
])

<div x-data="{
    value: '{{ $current }}',
    init() {

        var toolbarOptions = [
            ['bold', 'italic', 'link', 'blockquote'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'super'}],          
            [{ 'align': [] }],
            ['clean']
          ];

        let quill = new Quill(this.$refs.quill, { 
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow' 
        })
 
        quill.root.innerHTML = this.value
 
        quill.on('text-change', () => {
            if(this.value !== quill.root.innerHTML) {
                $dispatch({{ $dispatch }});
            }
            this.value = quill.root.innerHTML
        })

    },
}"

{{ $attributes->merge(['class' => '']) }}

>
    <div x-ref="quill" ></div>
    <input 
        name="{{ $id }}" 
        type="hidden"
        :value="value"
    >
    {{-- <div x-html="value"></div> --}}
</div>

{{-- don't forget to include the JS and CSS for Quill! --}}