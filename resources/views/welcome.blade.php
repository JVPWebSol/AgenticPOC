<x-layouts.app :title="$event->name ?? 'Halloweentocht Griezels in Mere'">
    {{-- Custom styles for this page --}}
    @push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .font-halloween {
            font-family: 'Creepster', cursive;
            letter-spacing: 1px;
        }
    </style>
    @endpush

    {{-- Main Content --}}
    <main class="bg-gray-50 dark:bg-[#080914] text-gray-900 dark:text-slate-200 antialiased min-h-screen" x-data="{ openModal: false }">
        
        {{-- Event Section --}}
        @if($event)
        <section class="max-w-7xl mx-auto px-6 py-12">
            <div class="bg-white dark:bg-[#0d0e21]/90 border border-gray-200 dark:border-slate-800/80 rounded-2xl overflow-hidden shadow-xl relative">
                @if($event->image)
                <div class="relative aspect-[16/9] overflow-hidden">
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent dark:from-black/80"></div>
                </div>
                @endif
                <div class="p-6 sm:p-8 space-y-6">
                    <div class="inline-flex items-center gap-2 bg-orange-100 dark:bg-orange-950/40 border border-orange-200 dark:border-orange-800/40 px-3.5 py-1.5 rounded-full text-xs font-medium text-orange-700 dark:text-orange-400">
                        <span>🎃</span>
                        <span>Halloween Event</span>
                    </div>
                    
                    <h1 class="font-halloween text-3xl sm:text-4xl lg:text-5xl text-orange-600 dark:text-orange-500 leading-tight uppercase tracking-wide">
                        {{ $event->name }}
                    </h1>

                    <div class="w-28 h-1 text-orange-500">
                        <svg viewBox="0 0 100 20" preserveAspectRatio="none" class="w-full h-full fill-none stroke-current stroke-[4]">
                            <path d="M0 10 Q25 0 50 10 T100 10" />
                        </svg>
                    </div>

                    <div class="flex flex-wrap gap-4 text-sm text-gray-700 dark:text-slate-300">
                        <div class="flex items-center gap-2 bg-gray-100 dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 px-3.5 py-1.5 rounded-lg">
                            <span class="text-orange-500 dark:text-orange-400">📅</span>
                            <span>{{ $event->date->format('d F Y') }} @if($event->time) om {{ $event->time->format('H:i') }} @endif</span>
                        </div>
                        @if($event->location)
                        <div class="flex items-center gap-2 bg-gray-100 dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 px-3.5 py-1.5 rounded-lg">
                            <span class="text-orange-500 dark:text-orange-400">📍</span>
                            <span>{{ $event->location }}</span>
                        </div>
                        @endif
                    </div>
                    
                    @if($event->description)
                    <div class="text-gray-700 dark:text-slate-300 text-base leading-relaxed prose dark:prose-invert max-w-none">
                        {!! $event->description !!}
                    </div>
                    @endif
                </div>
            </div>
        </section>
        @else
        <section class="max-w-7xl mx-auto px-6 py-12">
            <div class="bg-white dark:bg-[#0d0e21]/90 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-8 sm:p-10 text-center space-y-6 shadow-xl">
                <div class="inline-flex items-center gap-2 bg-orange-100 dark:bg-orange-950/40 border border-orange-200 dark:border-orange-800/40 px-3.5 py-1.5 rounded-full text-xs font-medium text-orange-700 dark:text-orange-400">
                    <span>🎃</span>
                    <span>Geen Event</span>
                </div>
                
                <h1 class="font-halloween text-3xl sm:text-4xl lg:text-5xl text-orange-600 dark:text-orange-500 leading-tight uppercase tracking-wide">
                    Welkom op onze Event Pagina
                </h1>

                <div class="w-28 h-1 text-orange-500 mx-auto">
                    <svg viewBox="0 0 100 20" preserveAspectRatio="none" class="w-full h-full fill-none stroke-current stroke-[4]">
                        <path d="M0 10 Q25 0 50 10 T100 10" />
                    </svg>
                </div>

                <p class="text-gray-700 dark:text-slate-300 text-lg leading-relaxed max-w-2xl mx-auto">
                    Er is momenteel geen event gepubliceerd. Blijf op de hoogte voor de volgende Halloweentocht!
                </p>
            </div>
        </section>
        @endif

        {{-- Tasks CRUD Section --}}
        <section class="max-w-7xl mx-auto px-6 pb-12" x-data="taskApp()">
            <div class="bg-white dark:bg-[#0d0e21]/90 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <span>📋</span>
                        <span>Takenlijst</span>
                    </h2>
                    <button
                        @click="openModal()"
                        class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold px-6 py-2.5 rounded-full shadow-lg shadow-orange-600/30 transition-all transform hover:-translate-y-0.5 text-sm flex items-center gap-2"
                    >
                        <span>+</span>
                        <span>Nieuwe taak</span>
                    </button>
                </div>

                {{-- Task Form Modal --}}
                <div
                    x-show="modalOpen"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 dark:bg-black/80 backdrop-blur-sm"
                    @click.outside="modalOpen = false"
                >
                    <div @click.away="modalOpen = false" class="bg-white dark:bg-[#0d0e21] border border-gray-200 dark:border-slate-800 rounded-2xl max-w-md w-full p-6 space-y-4 shadow-2xl relative">
                        <button @click="modalOpen = false" class="absolute top-4 right-4 text-gray-400 dark:text-slate-400 hover:text-gray-600 dark:hover:text-white">✕</button>
                        
                        <h3 class="font-halloween text-2xl text-orange-600 dark:text-orange-500" x-text="editingTask ? 'Taak bewerken' : 'Nieuwe taak'"></h3>
                        
                        <form @submit.prevent="submitTask" class="space-y-4 pt-2">
                            <input type="hidden" name="task_id" x-model="form.id">
                            
                            <div>
                                <label class="block text-xs text-gray-500 dark:text-slate-400 mb-1">Titel</label>
                                <input
                                    type="text"
                                    name="title"
                                    x-model="form.title"
                                    required
                                    class="w-full bg-gray-100 dark:bg-slate-900 border border-gray-300 dark:border-slate-800 rounded-lg px-3 py-2 text-sm text-gray-900 dark:text-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500"
                                >
                            </div>
                            
                            <div>
                                <label class="block text-xs text-gray-500 dark:text-slate-400 mb-1">Beschrijving</label>
                                <textarea
                                    name="description"
                                    x-model="form.description"
                                    rows="3"
                                    class="w-full bg-gray-100 dark:bg-slate-900 border border-gray-300 dark:border-slate-800 rounded-lg px-3 py-2 text-sm text-gray-900 dark:text-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500"
                                ></textarea>
                            </div>
                            
                            <div class="flex justify-end gap-3 pt-2">
                                <button type="button" @click="modalOpen = false; resetForm()" class="px-4 py-2 text-gray-700 dark:text-slate-300 hover:text-gray-900 dark:hover:text-white bg-gray-100 dark:bg-slate-900 border border-gray-300 dark:border-slate-800 rounded-lg text-sm transition-colors">Annuleren</button>
                                <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2.5 px-5 rounded-lg text-sm transition-colors" x-text="editingTask ? 'Bijwerken' : 'Aanmaken'"></button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Tasks List --}}
                <div id="tasks-list" class="space-y-3">
                    @foreach($tasks as $task)
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-[#090a18] rounded-xl border border-gray-200 dark:border-slate-800/50 transition-colors hover:border-gray-300 dark:hover:border-slate-700/50">
                        <div class="flex items-center gap-4">
                            <input
                                type="checkbox"
                                @click="toggleTask({{ $task->id }})"
                                :checked="{{ $task->completed ? 'true' : 'false' }}"
                                class="w-5 h-5 text-orange-500 border-gray-300 dark:border-slate-700 rounded focus:ring-orange-500 bg-white dark:bg-slate-900 appearance-none cursor-pointer"
                            >
                            <div>
                                <h3 class="font-medium text-gray-900 dark:text-slate-100 {{ $task->completed ? 'line-through text-gray-400 dark:text-slate-500' : '' }}">{{ $task->title }}</h3>
                                @if($task->description)
                                <p class="text-xs text-gray-500 dark:text-slate-400 {{ $task->completed ? 'line-through' : '' }}">{{ $task->description }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <button
                                @click="editTask({{ $task->id }}, '{{ $task->title }}', '{{ $task->description ?? '' }}')"
                                class="text-gray-400 dark:text-slate-500 hover:text-orange-500 dark:hover:text-orange-400 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800/50 transition-colors"
                                title="Bewerken"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button
                                @click="deleteTask({{ $task->id }})"
                                class="text-gray-400 dark:text-slate-500 hover:text-red-500 dark:hover:text-red-400 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800/50 transition-colors"
                                title="Verwijderen"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                    
                    @if($tasks->isEmpty())
                    <div class="text-center py-12">
                        <div class="text-4xl mb-3">📝</div>
                        <p class="text-gray-400 dark:text-slate-400 text-lg">Nog geen taken.</p>
                        <p class="text-gray-500 dark:text-slate-500 text-sm mt-1">Klik op 'Nieuwe taak' om te beginnen.</p>
                    </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Footer Tip --}}
        <div class="max-w-7xl mx-auto px-6 pb-8">
            <p class="text-xs text-gray-400 dark:text-slate-400 italic leading-relaxed text-center">
                Tip: Neem een zaklamp of hoofdlampje mee en kom verkleed! Zo maak je de beleving compleet. 🎃
            </p>
        </div>
    </main>

    {{-- Alpine.js for modal --}}
    @push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush

    <script>
        function taskApp() {
            return {
                modalOpen: false,
                editingTask: false,
                form: {
                    id: '',
                    title: '',
                    description: ''
                },
                
                openModal() {
                    this.modalOpen = true;
                    this.editingTask = false;
                    this.resetForm();
                },
                
                editTask(id, title, description) {
                    this.modalOpen = true;
                    this.editingTask = true;
                    this.form.id = id;
                    this.form.title = title;
                    this.form.description = description || '';
                },
                
                resetForm() {
                    this.form.id = '';
                    this.form.title = '';
                    this.form.description = '';
                },
                
                async submitTask() {
                    const formData = new FormData();
                    formData.append('title', this.form.title);
                    formData.append('description', this.form.description);
                    
                    const url = this.form.id ? `/tasks/${this.form.id}` : '/tasks';
                    const method = this.form.id ? 'PUT' : 'POST';
                    formData.append('_method', method);
                    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                    
                    try {
                        const response = await fetch(url, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        
                        if (response.ok) {
                            this.modalOpen = false;
                            this.resetForm();
                            window.location.reload();
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                
                async toggleTask(id) {
                    await fetch(`/tasks/${id}/toggle`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    window.location.reload();
                },
                
                async deleteTask(id) {
                    if (confirm('Weet je zeker dat je deze taak wilt verwijderen?')) {
                        await fetch(`/tasks/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        window.location.reload();
                    }
                }
            }
        }
    </script>
</x-layouts.app>
