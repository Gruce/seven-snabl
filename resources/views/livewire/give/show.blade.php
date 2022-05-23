<div>
    <x-card>
        <div class="relative sm:rounded-lg mt-10">
            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                @forelse ($gives as $give)
                <div key="{{now()}}" class="m-3">
                    <x-card shadow=false :title="'#'.$give->form->id. ' ' .$give->form->head_family->name ">
                        <x-slot name="footer">
                            <div class="flex justify-center text-xs">
                                <div class="flex flex-col items-center justify-center gap-1">
                                    <x-button wire:click="confirm({{ $give->id }},'delete')" class="text-red" icon="trash" negative />
                                </div>
                            </div>
                        </x-slot>
                        <!-- Card Content -->
                        <div class="flex flex-col">
                            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-1 my-1 text-center">
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="text-slate-400 text-sm mb-2">نوع الهبة</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button  x-show="!open" @click="open = true"> {{ $give->give_type->name}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-select
                                            :options="$give_types"
                                            wire:model.lazy="input.give_forms.{{$loop->index}}.give_type_id"
                                            option-label="name"
                                            option-value="id"
                                            />
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="text-slate-400 text-sm mb-2">الملاحظات</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button  x-show="!open" @click="open = true"> {{ $give->note }}</button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-input class="w-64" wire:model.lazy="input.give_forms.{{$loop->index}}.note" type="text"/>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-card>
                </div>
                @empty
                <h2 class="text-center">لايوجد</h2>
                @endforelse
            </div>
        </div>
    </x-card>
</div>
