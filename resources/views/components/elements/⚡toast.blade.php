<?php

use Livewire\Component;

new class extends Component
{
    
};
?>
<div {{ $attributes->only(['class'])->class('max-w fixed bottom-4 right-4 hidden') }} data-ui-toast>
    <div class="p-2 flex rounded-xl shadow-lg bg-white border border-zinc-200 border-b-zinc-300/80 dark:bg-zinc-700 dark:border-zinc-600">
        <div class="flex-1 flex items-start gap-4 overflow-hidden align-middle">
            <div class="flex-1 py-1.5 ps-2.5 flex gap-2">
                <div>
                    <div class="font-medium text-sm text-zinc-800 dark:text-white" data-ui-toast-text>
                        
                    </div>
                </div>
            </div>

            {{-- Close button --}}
            <ui-close class="flex items-center">
                <button type="button" class="inline-flex items-center font-medium justify-center gap-2 truncate disabled:opacity-50 dark:disabled:opacity-75 disabled:cursor-default h-8 text-sm rounded-md w-8 bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-400 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white" as="button" wire:click="$js.close">
                    <div>
                        <svg class="[:where(&)]:size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"></path>
                        </svg>
                    </div>
                </button>
            </ui-close>
        </div>
    </div>
</div>

<script>
    this.$js.close = () => document.querySelector('[data-ui-toast]').classList.add('hidden');
</script>