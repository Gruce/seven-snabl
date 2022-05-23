<div class="relative overflow-x-auto  sm:rounded-lg mt-10" >
    {{-- <table class="w-full text-sm text-right text-gray-500 table-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    اسم المنطقة
                </th>
                <th scope="col" class="px-6 py-3">
                    الرمز
                </th>
                <th scope="col" class="px-6 py-3">
                    الاجراءات
                </th>
            </tr>
        </thead>
        <tbody> --}}

            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                @forelse ($cities as $city)
                <div key="{{now()}}"  class="m-3">
                    <x-card shadow=false :title="'#'. ($loop->index + 1). ' ' .$city->name">
                        <x-slot name="footer">
                            <div class="flex justify-center text-xs">
                                <div class="flex flex-col items-center justify-center gap-1">
                                    <x-button  wire:click="confirm({{$city->id}},'delete')" class="text-red" icon="trash" negative />
                                </div>
                            </div>
                        </x-slot>
                        <!-- Card Content -->
                        <div class="flex flex-col">
                            {{-- CONTENT TAB --}}
                            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-1 my-1 text-center">
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="text-slate-400 text-sm mb-2">اسم المنطقة</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button  x-show="!open" @click="open = true">{{$city->name}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-input class="w-64" wire:model.lazy="input.cities.{{$loop->index}}.name" type="text"/>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="text-slate-400 text-sm mb-2">الرمز</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button  x-show="!open" @click="open = true">{{$city->code}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-input class="w-64" wire:model.lazy="input.cities.{{$loop->index}}.code" type="text"/>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- END : CONTENT TAB --}}
                        </div>
                    </x-card>
                </div>
                    {{-- <tr class="bg-white  text-center">
                        <td class="px-6 py-4">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="px-6 py-4">

                            <div x-data="{ open: false }">
                                <button  x-show="!open" @click="open = true">{{$city->name}} </button>

                                <ul x-show="open" @click.away="open = false">
                                    <x-input class="w-64" wire:model.lazy="input.cities.{{$loop->index}}.name" type="text"/>
                                </ul>
                            </div>
                        </td>
                        <td class="px-6 py-4">

                            <div x-data="{ open: false }">
                                <button  x-show="!open" @click="open = true">{{$city->code}} </button>

                                <ul x-show="open" @click.away="open = false">
                                    <x-input class="w-64" wire:model.lazy="input.cities.{{$loop->index}}.code" type="text"/>
                                </ul>
                            </div>
                        </td>
                        <td class="px-6 py-4 ">
                            <x-button wire:click="confirm({{$city->id}},'delete')" class="text-red" icon="trash" negative />
                        </td>
                    </tr> --}}
                @empty
            </div>
                <h2 class="text-center">لايوجد</h2>
                {{-- <td colspan="4" class="text-center">لايوجد</td> --}}
            @endforelse
        {{-- </tbody>
    </table> --}}
</div>
