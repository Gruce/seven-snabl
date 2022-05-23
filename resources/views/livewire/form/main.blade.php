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
                <x-input
                    placeholder="البحث عن رقم الاستمارة"
                    wire:model="filter.search"
                    @keydown.enter.prevent="$refresh"
                />
                <x-button class="mr-2 " icon="filter" @click="filter = ! filter" secondary />
            </div>
        </div>
        {{-- FILTERS --}}
        <div x-show="filter" class="grid lg:grid-cols-3 sm:grid-cols-1">
            <x-select

                class="{{$filter['city_id'] ? 'border-2 border-green-100 rounded-lg' : ''}} m-3"
                placeholder="المنطقة"
                :async-data="route('cities_select')"
                option-label="name"
                option-value="id"
                wire:model="filter.city_id"
            />
            <x-select

                class="{{$filter['person']['level'] ? 'border-2 border-green-100 rounded-lg' : ''}} m-3"
                placeholder="مستوى الفقر"
                :options="[
                    ['name' => 'B1',  'id' => 1],
                    ['name' => 'B2', 'id' => 2],
                    ['name' => 'B3',   'id' => 3],
                    ['name' => 'B4',    'id' => 4],
                ]"
                option-label="name"
                option-value="id"
                wire:model="filter.person.level"
            />
            <x-select

                class="{{$filter['review'] ? 'border-2 border-green-100 rounded-lg' : ''}} m-3"
                placeholder="الحالة"
                :options="[
                    ['name' => 'تمت المراجعة',  'value' =>true ],
                    ['name' => 'لم تتم المراجعة', 'value' => false],

                ]"
                option-label="name"
                option-value="value"
                wire:model="filter.review"
            />
        </div>
        <x-card shadow=false>

            {{-- ADD MODAL --}}
            <x-modal.card  blur wire:model.defer="addModal">
                @livewire('form.add')
            </x-modal.card>

            @forelse ($forms as $form)
                @livewire('form.card', ['form' => $form])
            @empty
                <div>
                    <h1>لايوجد</h1>
                </div>
            @endforelse

            {{-- {{ $forms->links() }} --}}

        </x-card>
    </div>
</div>
