<div class="relative overflow-x-auto  sm:rounded-lg mt-10" >
            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                @forelse ($cities as $city)
                <div key="{{now()}}"  class="m-3">
                    <x-ui.card class="border ">
                        <div class="flex justify-between">
                            <div>
                                <h3 class="font-semibold">
                                    #{{$loop->index + 1}} {{$city->name}}
                                </h3>
                            </div>
                            <div class="flex  text-xs">
                                    <button  wire:click="confirmed({{$city->id}})"   type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-0.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="flex flex-col">
                            {{-- CONTENT TAB --}}
                            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-1 my-1 text-center">
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="text-slate-400 text-sm mb-2">اسم المنطقة</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold "  x-show="!open" @click="open = true">{{$city->name}} </button>
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
                                        <button class="font-semibold " x-show="!open" @click="open = true">{{$city->code}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <input type="text"
                                            wire:model.lazy="input.cities.{{$loop->index}}.code"
                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- END : CONTENT TAB --}}
                        </div>

                    </x-ui.card>
                </div>

                @empty
            </div>
                <h2 class="text-center">لايوجد</h2>
            @endforelse
    </table>
</div>
