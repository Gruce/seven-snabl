<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 ">
    @for ($i=0 ; $i < 10 ; $i++)
        <x-card shadow=false title="التنومة">
            <x-slot name="action">
                <button class="rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    <x-icon name="dots-vertical" class="w-4 h-4 text-gray-500" />
                </button>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <x-button negative icon="x" />
                    <x-button primary icon="view-grid-add" label="gh" href="{{route('show')}}" />
                </div>
            </x-slot>
            <!-- Card Content -->
            <div class="flex justify-center">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
                    <div>
                        <span class="text-lg">جبار علي محمد</span>
                    </div>
                    <div>
                        <span class="text-lg">12/2/2005</span>
                    </div>
                    <div>
                        <span class="text-lg">مستوى الفقر : B2</span>
                    </div>
                    <div>
                        <span class="text-lg">عدد افراد الاسرة</span>
                    </div>
                </div>
            </div>
        </x-card>
    @endfor
</div>
