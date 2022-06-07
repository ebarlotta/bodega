<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
                <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 410px;">
                    <div class="card bg-primary text-white text-center p-3">
                      <figure class="mb-0">
                        <blockquote class="blockquote">
                          <p>A well-known quote, contained in a blockquote element.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer mb-0 text-white">
                          Someone famous in <cite title="Source Title">Source Title</cite>
                        </figcaption>
                      </figure>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
                <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 410px;">
                    <div class="card bg-primary text-white text-center p-3">
                      <figure class="mb-0">
                        <blockquote class="blockquote">
                          <p>A well-known quote, contained in a blockquote element.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer mb-0 text-white">
                          Someone famous in <cite title="Source Title">Source Title</cite>
                        </figcaption>
                      </figure>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
