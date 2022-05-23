<div>
    <x-card>
        <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
            {{-- <table class="w-full text-sm text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            رقم الاستمارة
                        </th>
                        <th scope="col" class="px-6 py-3">
                            رب الاسرة
                        </th>
                        <th scope="col" class="px-6 py-3">
                            نوع الهبة
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الملاحظات
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الاجراءات
                        </th>
                    </tr>
                </thead>
                <tbody> --}}
                    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                        @forelse ($gives as $give)
                        <div class="m-3">
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
                                    {{-- CONTENT TAB --}}
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
                                    {{-- END : CONTENT TAB --}}
                                </div>
                            </x-card>
                        </div>
                            <!-- <tr class="bg-white  text-center">
                                <td class="px-6 py-4">
                                    {{-- {{ $loop->index + 1 }} --}}
                                </td>
                                <td class="px-6 py-4">
                                    {{-- {{ $give->form->id }} --}}
                                </td>
                                <td class="px-6 py-4">
                                    {{-- {{ $give->form->head_family->name }} --}}
                                </td>
                                <td class="px-6 py-4">

                                    <div x-data="{ open: false }">
                                        {{-- <button  x-show="!open" @click="open = true"> {{ $give->give_type->name}} </button> --}}

                                        {{-- <ul x-show="open" @click.away="open = false"> --}}
                                            <x-select
                                            {{-- :options="$give_types" --}}
                                            {{-- wire:model.lazy="input.give_forms.{{$loop->index}}.give_type_id" --}}
                                            option-label="name"
                                            option-value="id"
                                            />
                                        </ul>
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4">
                                    {{ $give->give_type->name}}
                                </td> --}}
                                <td class="px-6 py-4">

                                    <div x-data="{ open: false }">
                                        {{-- <button  x-show="!open" @click="open = true"> {{ $give->note }}</button> --}}
                                        {{-- <ul x-show="open" @click.away="open = false"> --}}
                                            {{-- <x-input class="w-64" wire:model.lazy="input.give_forms.{{$loop->index}}.note" type="text"/> --}}
                                        </ul>
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4">
                                    {{ $give->note }}
                                </td> --}}
                                <td class="px-6 py-4 ">
                                    {{-- <x-button wire:click="confirm({{ $give->id }},'delete')" class="text-red" --}}
                                        icon="trash" negative />
                                </td>
                            </tr> -->
                        @empty
                    </div>
                        <h2 class="text-center">لايوجد</h2>
                        {{-- <td colspan="4" class="text-center">لايوجد</td> --}}
                    @endforelse
                {{-- </tbody>
            </table> --}}
        </div>

    </x-card>
</div>
