<div>
    <div class="relative mt-4 overflow-x-auto sm:rounded-lg">
        <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
            @forelse ($user as $item)
            <div key="{{now()}}" class="m-3">
                <x-ui.card class="bg-white ">

                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-semibold">
                                #{{$item->name}} {{$loop->index + 1}}
                            </h3>
                        </div>
                        <div class="flex text-xs">
                            <button wire:click="confirmed({{$item->id}})" type="button" class="px-4 py-2 mb-2 mr-2 text-sm font-medium text-red-500 border border-red-600 rounded-lg hover:bg-red-600 hover:text-white">
                                <span>حذف</span>
                            </button>
                        </div>
                    </div>


                    <!-- Card Content -->
                    <div class="flex flex-col">
                        {{-- CONTENT TAB --}}
                        <div>
                            <div class="grid gap-1 my-1 text-center lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="mb-2 text-sm text-slate-400">اسم المستخدم</span>
                                    <div x-cloak x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold " x-show="!open" @click="open = true">{{$item->name}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <input type="text" wire:model.lazy="input.user.{{$loop->index}}.name" class="bg-white border border-gray-300 text-gray-900 text-sm font-s rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="mb-2 text-sm text-slate-400">البريد الالكتروني</span>
                                    <div x-cloak x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold " x-show="!open" @click="open = true">{{$item->email}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <input type="text" wire:model.lazy="input.user.{{$loop->index}}.email" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="mb-2 text-sm text-slate-400">نوع المستخدم</span>
                                    <div x-cloak x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold " x-show="!open" @click="open = true">{{$item->is_admin == 1 ? 'مشرف' : 'مخول'}} </button>
                                        <ul x-show="open" @click.away="open = false">

                                            <select wire:model.lazy="input.user.{{$loop->index}}.is_admin" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                                <option value="1" selected>مشرف</option>
                                                <option value="2">مخول</option>
                                            </select>

                                        </ul>
                                    </div>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                    <span class="mb-2 text-sm text-slate-400">رقم الهاتف</span>
                                    <div x-cloak x-data="{ open: false }" class="flex justify-center">
                                        <button class="font-semibold " x-show="!open" @click="open = true">{{$item->phonenumber}} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <input type="text" wire:model.lazy="input.user.{{$loop->index}}.phonenumber" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        </ul>
                                    </div>
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
        </tbody>
        </table>
    </div>
</div>
