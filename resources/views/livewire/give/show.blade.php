<div>
    <x-ui.card  >
        <div class="relative mt-3 sm:rounded-lg">
            <div class="grid gap-2 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">
                @forelse ($gives as $give)
                <div key="{{now()}}">
                    <x-ui.card class="bg-white border">
                        <div class="flex justify-between">
                            <div>
                                <h3 class="font-semibold">
                                    # {{$give->form->id}} {{$give->form->head_family->name}}
                                </h3>
                            </div>
                            <div class="flex text-xs">
                                <button wire:click="confirmed({{$give->id}})" type="button" class="px-4 py-2 mb-2 mr-2 text-sm font-medium text-red-500 border border-red-600 rounded-lg hover:bg-red-600 hover:text-white">
                                    <span>حذف</span>
                                </button>
                            </div>
                        </div>
                        <!-- Card Content -->
                        <div class="flex flex-col">
                            <div class="grid gap-1 my-1 text-center lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="mb-2 text-sm text-slate-400">نوع الهبة</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold " x-show="!open" @click="open = true"> {{ $give->give_type->name}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <select  wire:model.lazy="input.give_forms.{{$loop->index}}.give_type_id"
                                                class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                            @foreach ($give_types as  $give_type)
                                            <option  value="{{$give_type['id']}}">{{$give_type['name']}}</option>
                                            @endforeach
                                            </select>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="mb-2 text-sm text-slate-400">الملاحظات</span>
                                    <div x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold " x-show="!open" @click="open = true"> {{ $give->note }}</button>
                                        <ul x-show="open" @click.away="open = false">
                                            <input type="text"
                                            wire:model.lazy="input.give_forms.{{$loop->index}}.note"
                                            class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </x-ui.card>
                </div>
                @empty
                <h2 class="text-center">لايوجد</h2>
                @endforelse
            </div>
        </div>

    </x-ui.card>
</div>
