<div {{ $attributes->only(['class', 'wire:key'])->class('relative') }}
    x-data="wireui_select({
        asyncData:         @js($asyncData),
        optionValue:       @js($optionValue),
        optionLabel:       @js($optionLabel),
        optionDescription: @js($optionDescription),
        hasSlot:     @boolean($slot->isNotEmpty()),
        searchable:  @boolean($searchable),
        multiselect: @boolean($multiselect),
        readonly:    @boolean($readonly || $disabled),
        disabled:    @boolean($disabled),
        placeholder: @js($placeholder),
        template:    @js($template),
        @if ($attributes->wire('model')->value())
            wireModel: @entangle($attributes->wire('model')),
        @endif
    })">
    <div hidden x-ref="json">{!! $optionsToJson() !!}</div>
    <div hidden x-ref="slot">{{ $slot }}</div>

    <div class="relative">
        @if ($label)
            <x-dynamic-component
                :component="WireUiComponent::resolve('label')"
                class="mb-1"
                :label="$label"
                :has-error="$name && $errors->has($name)"
                x-on:click="togglePopover"
                wire:key="select.label"
            />
        @endif

        <x-dynamic-component
            :component="WireUiComponent::resolve('input')"
            class="overflow-hidden text-transparent cursor-pointer dark:text-transparent"
            x-ref="input"
            x-on:click="togglePopover"
            x-on:keydown.enter.stop.prevent="togglePopover"
            x-on:keydown.space.stop.prevent="togglePopover"
            x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
            x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()"
            x-bind:placeholder="getPlaceholder"
            x-bind:value="getSelectedValue"
            readonly
            :name="$name"
            :icon="$icon"
            {{ $attributes->except(['class'])->whereDoesntStartWith(['wire:model', 'type', 'wire:key']) }}>
            <x-slot name="prepend">
                <div :class="{
                    'pointer-events-none': config.readonly,
                    'cursor-pointer': !config.readonly,
                }">
                    <template x-if="!config.multiselect">
                        <div class="absolute right-0 inset-y-0 pr-3.5 w-[calc(100%-3.5rem)] flex items-center" x-on:click="togglePopover">
                            <span
                                class="text-sm truncate text-secondary-700 dark:text-secondary-400"
                                x-show="!isEmpty()"
                                x-html="getSelectedDysplayText()">
                            </span>
                        </div>
                    </template>

                    <template x-if="config.multiselect">
                        <div class="absolute inset-y-0 left-0 flex items-center w-full pl-3 overflow-hidden pr-14" x-on:click="togglePopover">
                            <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
                                <span
                                    class="inline-flex text-sm text-secondary-700 dark:text-secondary-400"
                                    x-show="selectedOptions.length"
                                    x-text="selectedOptions.length">
                                </span>

                                <template x-for="(option, index) in selectedOptions" :key="`selected.${index}`">
                                    <span class="
                                            inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium
                                            border border-secondary-200 shadow-sm bg-secondary-100 text-secondary-700
                                            dark:bg-secondary-700 dark:text-secondary-400 dark:border-none
                                        ">
                                        <span style="max-width: 5rem" class="truncate" x-text="option.label"></span>

                                        <button
                                            class="flex items-center justify-center w-4 h-4 shrink-0 text-secondary-400 hover:text-secondary-500"
                                            x-on:click.stop="unSelect(option)"
                                            tabindex="-1"
                                            type="button">
                                            <x-dynamic-component
                                                :component="WireUiComponent::resolve('icon')"
                                                class="w-3 h-3"
                                                name="x"
                                            />
                                        </button>
                                    </span>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </x-slot>

            <x-slot name="append">
                <div class="absolute inset-y-0 left-0 flex items-center pl-2 gap-x-2">
                    @if ($clearable && !$readonly && !$disabled)
                        <button
                            x-show="!isEmpty()"
                            x-on:click="clear"
                            tabindex="-1"
                            type="button"
                            x-cloak>
                            <x-dynamic-component
                                :component="WireUiComponent::resolve('icon')"
                                class="w-4 h-4 text-secondary-400 hover:text-negative-400"
                                name="x"
                            />
                        </button>
                    @endif

                    <button tabindex="-1" x-on:click="togglePopover" type="button">
                        <x-dynamic-component
                            :component="WireUiComponent::resolve('icon')"
                            class="w-5 h-5
                            {{ $name && $errors->has($name)
                                ? 'text-negative-400 dark:text-negative-600'
                                : 'text-secondary-400'
                            }}"
                            :name="$rightIcon"
                        />
                    </button>
                </div>
            </x-slot>
        </x-dynamic-component>
    </div>

    <div class="absolute z-10 w-full mt-1 overflow-hidden bg-white border rounded-lg shadow-md border-secondary-200 dark:bg-secondary-800 dark:border-secondary-600"
        x-show="popover"
        x-transition
        x-cloak
        x-on:click.outside="closePopover"
        x-on:keydown.escape.window="closePopover">
        <template x-if="asyncData.api || (config.searchable && options.length > 10)">
            <div class="px-2 my-2" wire:key="search.options">
                <x-dynamic-component
                    :component="WireUiComponent::resolve('input')"
                    class="bg-slate-100"
                    x-ref="search"
                    x-model.debounce.{{ $asyncData ? 750 : 0 }}ms="search"
                    x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
                    x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()"
                    shadowless
                    right-icon="search"
                    :placeholder="trans('wireui::messages.searchHere')"
                />
            </div>
        </template>

        <template x-if="popover">
            <ul class="overflow-y-auto select-none max-h-60 overscroll-contain soft-scrollbar"
                tabindex="-1"
                x-ref="optionsContainer"
                name="wireui.select.options.{{ $name }}"
                x-on:keydown.tab.prevent="$event.shiftKey || getNextFocusable().focus()"
                x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
                x-on:keydown.shift.tab.prevent="getPrevFocusable().focus()"
                x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()">
                <div class="w-full h-0.5 rounded-full relative overflow-hidden"
                    :class="{
                        'bg-gray-200 dark:bg-gray-700': asyncData.fetching
                    }">
                    <div class="bg-primary-500 h-0.5 rounded-full absolute animate-linear-progress"
                        style="width: 30%"
                        x-show="asyncData.fetching">
                    </div>
                </div>

                <template x-for="(option, index) in displayOptions" :key="`${index}.${option.value}`">
                    <div x-transition x-html="renderOption(option)"></div>
                </template>

                <li class="px-3 py-2 cursor-pointer text-secondary-500"
                    x-show="displayOptions.length === 0"
                    x-on:click="closePopover">
                    {{ $emptyMessage ?? __('wireui::messages.empty_options') }}
                </li>
            </ul>
        </template>
    </div>
</div>
