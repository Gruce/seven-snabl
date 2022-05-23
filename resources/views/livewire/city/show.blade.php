<div class="relative overflow-x-auto  sm:rounded-lg mt-10" >
            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                @forelse ($cities as $city)
                <div key="{{now()}}"  class="m-3">
                    <x-ui.card class="border bg-gray-50">
                        <div>
                            <h3 class="font-semibold">
                                #{{$city->name}} {{$loop->index + 1}}
                            </h3>
                        </div>
                        <!-- Card Content -->
                        <div class="flex flex-col">
                            {{-- CONTENT TAB --}}
                            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-1 my-1 text-center">
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="text-slate-400 text-sm mb-2">اسم المنطقة</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button  x-show="!open" @click="open = true">{{$city->name}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <input type="text"
                                                    wire:model.lazy="input.cities.{{$loop->index}}.name"
                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
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
                        <div class="mt-3">
                        <div class="flex justify-center text-xs">
                            <div class="flex flex-col items-center justify-center gap-1">
                                <button  wire:click="confirm({{$city->id}},'delete')"   type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    </x-ui.card>
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
