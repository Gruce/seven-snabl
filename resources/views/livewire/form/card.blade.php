<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 ">
    @for ($i=0 ; $i < 10 ; $i++)
        <x-card shadow=false title="التنومة">
            <x-slot name="action">
                <span class="text-lg">12/2/2005</span>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <x-button negative icon="x" />
                    <x-button primary icon="view-grid-add" href="{{route('show')}}" />
                </div>
            </x-slot>
            <!-- Card Content -->
            <div class="flex justify-center">
                <div class="grid lg:grid-cols-2 sm:grid-cols-1 gap-4">
                    <div>
                        <span class="text-lg">جبار علي محمد</span>
                    </div>
                    <div>
                        <span class="text-lg">عدد الافراد : 43</span>
                    </div>
                </div>
            </div>
        </x-card>
    @endfor
</div>
