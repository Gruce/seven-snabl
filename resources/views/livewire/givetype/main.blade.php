<div>
    <x-card>
       @livewire('givetype.add')
       <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
        <table class="w-full text-sm text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        الهبة
                    </th>
                    <th scope="col" class="px-6 py-3">
                        الاجراءات
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($gives as $give)
                    <tr class="bg-white  ">
                        <td class="px-6 py-4">
                            {{ $loop->index + 1 }}
                        <td class="px-6 py-4">
                            {{  $give->name }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-button   class="text-gray-500" icon="pencil-alt" secondary />
                            <x-button wire:click="confirm({{ $give->id}},'delete')" class="text-red" icon="trash" negative />
                        </td>
                    </tr>
                @empty

                    <td colspan="4" class="text-center">لايوجد</td>
                @endforelse
            </tbody>
        </table>
    </div>

    </x-card>
</div>
