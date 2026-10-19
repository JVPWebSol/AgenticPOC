<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $event->name ?? 'Event Landing Page' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen" x-data="taskApp()">
    <div class="max-w-4xl mx-auto px-4 py-12">
        {{-- Event Section --}}
        @if($event)
        <section class="mb-12 bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" class="w-full h-64 object-cover">
            @endif
            <div class="p-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">{{ $event->name }}</h1>
                
                <div class="flex flex-wrap gap-6 text-gray-600 dark:text-gray-300 mb-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ $event->date->format('d F Y') }} @if($event->time) om {{ $event->time->format('H:i') }} @endif</span>
                    </div>
                    @if($event->location)
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $event->location }}</span>
                    </div>
                    @endif
                </div>
                
                @if($event->description)
                <div class="prose dark:prose-invert max-w-none">
                    {{ $event->description }}
                </div>
                @endif
            </div>
        </section>
        @else
        <section class="mb-12 bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Welkom op onze Event Pagina</h1>
            <p class="text-gray-600 dark:text-gray-300">Er is momenteel geen event gepubliceerd.</p>
        </section>
        @endif

        {{-- Tasks CRUD Section --}}
        <section class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Takenlijst</h2>
                <button
                    @click="openModal()"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors"
                >
                    Nieuwe taak
                </button>
            </div>

            {{-- Task Form Modal --}}
            <div
                x-show="modalOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 overflow-y-auto"
                @click.outside="modalOpen = false"
            >
                <div class="flex min-h-full items-center justify-center p-4">
                    <div class="fixed inset-0 bg-black/50" @click="modalOpen = false"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-xl max-w-md w-full p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white" x-text="editingTask ? 'Taak bewerken' : 'Nieuwe taak'"></h3>
                            <button @click="modalOpen = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <form @submit.prevent="submitTask">
                            <input type="hidden" name="task_id" x-model="form.id">
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Titel</label>
                                <input
                                    type="text"
                                    name="title"
                                    x-model="form.title"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                >
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Beschrijving</label>
                                <textarea
                                    name="description"
                                    x-model="form.description"
                                    rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                ></textarea>
                            </div>
                            
                            <div class="flex justify-end gap-3">
                                <button type="button" @click="modalOpen = false; resetForm()" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">Annuleren</button>
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors" x-text="editingTask ? 'Bijwerken' : 'Aanmaken'"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Tasks List --}}
            <div id="tasks-list" class="space-y-3">
                @foreach($tasks as $task)
                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                    <div class="flex items-center gap-4">
                        <input
                            type="checkbox"
                            @click="toggleTask({{ $task->id }})"
                            :checked="{{ $task->completed ? 'true' : 'false' }}"
                            class="w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-red-500"
                        >
                        <div>
                            <h3 class="font-medium text-gray-900 dark:text-white {{ $task->completed ? 'line-through text-gray-400' : '' }}">{{ $task->title }}</h3>
                            @if($task->description)
                            <p class="text-sm text-gray-500 dark:text-gray-400 {{ $task->completed ? 'line-through' : '' }}">{{ $task->description }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button
                            @click="editTask({{ $task->id }}, '{{ $task->title }}', '{{ $task->description ?? '' }}')"
                            class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 p-1"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button
                            @click="deleteTask({{ $task->id }})"
                            class="text-gray-500 hover:text-red-600 p-1"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @endforeach
                
                @if($tasks->isEmpty())
                <p class="text-center text-gray-500 dark:text-gray-400 py-8">Nog geen taken. Klik op 'Nieuwe taak' om te beginnen.</p>
                @endif
            </div>
        </section>
    </div>

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
</body>
</html>
