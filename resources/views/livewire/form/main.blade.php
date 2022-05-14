@section('title', 'الكشوفات')
<div>
    <div class="mt-3" x-data="{ open: false, filter: true }">
        <x-card shadow=false>
            <div class="flex justify-between p-2 mb-3 rounded bg-slate-50">
                <x-button icon="plus" @click="open = ! open" primary label="اضافة" />

                <div class="flex">
                    <div x-show="filter" class="flex gap-1">
                        <x-select
                            placeholder="المنطقة"
                            :async-data="route('cities_select')"
                            option-label="name"
                            option-value="id"
                            wire:model="filter.city_id"
                        />
                        <x-select
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
                    </div>
                    <x-button class="mr-2" icon="filter" @click="filter = ! filter" secondary />
                </div>
            </div>
            <div x-show="open" @click.outside="open = false" class="mb-3">
                @livewire('form.add')
            </div>
            

            
            @forelse ($forms as $form)
                @livewire('form.card', ['form' => $form])
            @empty
                <div>
                    <h1>لايوجد</h1>
                </div>
            @endforelse

        </x-card>
    </div>
</div>