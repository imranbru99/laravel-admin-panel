<div
    x-data="{
        toasts: [],
        add(toast) {
            const id = Date.now();
            const item = {
                id,
                type: toast.type || 'success',
                message: toast.message || '',
                timeout: toast.timeout || 4000
            };
            this.toasts.push(item);
            setTimeout(() => this.remove(id), item.timeout);
        },
        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }"
    x-on:admin-panel:toast.window="add($event.detail)"
    class="admin-toast-container"
    style="display: none;"
    x-show="toasts.length > 0"
>
    <template x-for="t in toasts" :key="t.id">
        <div
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="admin-toast"
            :class="'admin-toast-' + t.type"
        >
            <div class="flex items-center gap-3">
                <template x-if="t.type === 'success'">
                    <x-admin-panel::icon name="check" class="w-5 h-5 text-emerald-500 flex-shrink-0" />
                </template>
                <template x-if="t.type === 'error'">
                    <x-admin-panel::icon name="alert-circle" class="w-5 h-5 text-red-500 flex-shrink-0" />
                </template>
                <template x-if="t.type === 'warning'">
                    <x-admin-panel::icon name="alert-circle" class="w-5 h-5 text-amber-500 flex-shrink-0" />
                </template>
                <template x-if="t.type === 'info'">
                    <x-admin-panel::icon name="sparkles" class="w-5 h-5 text-indigo-500 flex-shrink-0" />
                </template>

                <p x-text="t.message" class="text-sm font-medium text-[var(--admin-text)] flex-1"></p>

                <button type="button" @click="remove(t.id)" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                    <x-admin-panel::icon name="x" class="w-4 h-4" />
                </button>
            </div>
        </div>
    </template>
</div>
