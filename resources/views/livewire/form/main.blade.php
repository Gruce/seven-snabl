@section('title', 'الكشوفات')
<div>
    <div class="mt-3" x-data="{ open: false, filter: false }">
        <x-card shadow=false>
            <div class="flex justify-between p-2 mb-3 rounded bg-slate-50">
                <!--- Add button -->
                <x-button icon="plus" @click="$openModal('addModal')" primary label="اضافة" class="mb-3" />
                <!--- filter & search section -->
                <div class="flex">
                    <x-input
                        class="w-full"
                        placeholder="البحث عن رقم الاستمارة"
                        wire:model="filter.search"
                        @keydown.enter.prevent="$refresh"
                    />
                    <div x-show="filter" class="flex gap-1 mr-2">
                        <x-select
                            class="{{$filter['city_id'] ? 'border-2 border-green-100 rounded-lg' : ''}} "
                            placeholder="المنطقة"
                            :async-data="route('cities_select')"
                            option-label="name"
                            option-value="id"
                            wire:model="filter.city_id"
                        />
                        <x-select
                            class="{{$filter['person']['level'] ? 'border-2 border-green-100 rounded-lg' : ''}} "
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
                            class="{{$filter['review'] ? 'border-2 border-green-100 rounded-lg' : ''}} "
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
                    <x-button class="mr-2" icon="filter" @click="filter = ! filter" secondary />

                </div>
            </div>
            <!--- Add modal -->
            <x-modal  blur wire:model.defer="addModal" max-width="5xl">
                <x-card fullscreen="false">
                    @livewire('form.add')
                </x-card>
            </x-modal>

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
