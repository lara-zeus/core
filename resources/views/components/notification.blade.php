<div
    x-data="{
        messages: [],
        remove(message) {
            this.messages.splice(this.messages.indexOf(message), 1)
        }
    }"
    @notify.window="console.log($event.detail); let message = $event.detail; messages.push(message); setTimeout(() => { remove(message) }, 2500)"
    class="fixed inset-0 flex flex-col items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:justify-start space-y-4 z-50">

    <template x-for="(message, messageIndex) in messages" :key="messageIndex" hidden>
       <div
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            :class="{ 'border-secondary-600 text-secondary-600': message[1] === 'warning', 'border-red-600 text-red-600': message[1] === 'error', 'border-primary-600 text-primary-600': message[1] === 'success' }"
            class="border border-r-8 bg-white rounded-xl shadow-md">

            <div class="flex items-center px-2 py-3">
                <svg x-show="message[1] === 'error' || message[1] === 'warning'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <svg x-show="message[1] === 'success'" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="mx-3">
                    <p class="text-gray-600 dark:text-gray-200" x-text="message[0]"></p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button @click="remove(message)" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
