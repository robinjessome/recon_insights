@props([
  'tableHead' => null,
  'tableBody' => null,
  ])

<div {{ $attributes->merge([
  'class' => 'flex flex-col'
]) }}>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow-sm overflow-hidden border-b border-gray-200 sm:rounded-md">
          <table class="table-auto min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                {{  $tableHead }}
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{  $tableBody }}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  