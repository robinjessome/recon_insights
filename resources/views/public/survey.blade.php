<x-public-layout>
    <div class="p-12">
        <h1>{{ $survey->title }}</h1>
        <p>{{ $survey->description }}</p>
        <img src="{{ Storage::disk('s3')->url($survey->featuredImage) }}" />
        <hr class="my-6" />
        <div class="richtext">
            {!! $survey->mainContent !!}
        </div>
    </div>
</x-public-layout>
