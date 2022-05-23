@section('title', 'الكشوفات')
<div>
    <div class="mt-3" x-data="{ open: false, filter: false }">
        <div class="grid p-2 mb-3 rounded lg:grid-cols-2 sm:grid-cols-1 bg-slate-50">
            {{-- ADD --}}
            <div class="flex justify-start">
                <x-button icon="plus" @click="$openModal('addModal')" primary label="اضافة" class="mb-3" />
            </div>

            {{-- FILTER BUTTON --}}
            <div class="flex justify-end">
                <x-input placeholder="البحث عن رقم الاستمارة" wire:model="filter.search"
                    @keydown.enter.prevent="$refresh" />
                <button @click="filter = ! filter" class="text-gray-900 bg-gray-400 rounded-sm w-16 mr-4"><i
                        class="fa-solid fa-filter"></i></button>
            </div>
        </div>
        {{-- FILTERS --}}
        <div x-show="filter" class="grid lg:grid-cols-3 sm:grid-cols-1 ">
            <x-select class="{{ $filter['city_id'] ? 'border-2 border-green-100 rounded-lg' : '' }} "
                placeholder="المنطقة" :async-data="route('cities_select')" option-label="name" option-value="id"
                wire:model="filter.city_id" />
            <select  wire:model="filter.person.level"
                class=" bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 mr-2  ">
                <option value="1" selected>B1</option>
                <option value="2">B2</option>
                <option value="3">B3</option>
                <option value="4">B4</option>
            </select>
            <select  wire:model="filter.review"
                class=" bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 mr-2  ">
                <option value="2" selected>تمت المراجعة</option>
                <option value="1">لم تتم المراجعة</option>
            </select>

        </div>

        {{-- ADD MODAL --}}
        <x-modal.card blur wire:model.defer="addModal" max-width="5xl">
            @livewire('form.add')
        </x-modal.card>

        <div class="grid gap-2 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            @forelse ($forms as $form)
                <div class="mb-1 mt-5">
                    @livewire('form.card', ['form' => $form])
                </div>
            @empty
                <div>
                    <h1>لايوجد</h1>
                </div>
            @endforelse
        </div>

        {{-- {{ $forms->links() }} --}}
    </div>

    @livewire('give.add', ['form' => $form_id ?? 1])
</div>
