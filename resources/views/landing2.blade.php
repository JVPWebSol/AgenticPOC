<x-layouts.app :title="'Halloweentocht Griezels in Mere'">
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
        
        <!-- Header Navigation (replacing the layout's navigation for this specific page) -->
        <header class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-orange-100 dark:bg-orange-600/20 border border-orange-200 dark:border-orange-500/40 flex items-center justify-center text-xl">
                    🎃
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-widest text-gray-500 dark:text-slate-400 font-semibold leading-none">Halloweentocht</span>
                    <span class="text-xl font-bold text-orange-600 dark:text-orange-500 leading-none">Griezels in <span class="text-gray-900 dark:text-white">Mere</span></span>
                </div>
            </div>

            <!-- Navigation Links & CTA -->
            <div class="flex items-center gap-8">
                <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600 dark:text-slate-300">
                    <a href="#griezeltocht" class="hover:text-gray-900 dark:hover:text-white transition-colors">De Griezeltocht</a>
                    <a href="#contact" class="hover:text-gray-900 dark:hover:text-white transition-colors">Contact</a>
                </nav>
                <a href="#tickets" class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold px-6 py-2.5 rounded-full shadow-lg shadow-orange-600/30 transition-all transform hover:-translate-y-0.5 text-sm">
                    Tickets Reserveren
                </a>
            </div>
        </header>

        <!-- Main Content Grid -->
        <section class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Column: Information & Details -->
            <section class="lg:col-span-7 space-y-6">
                
                <!-- Top Tag -->
                <div class="inline-flex items-center gap-2 bg-orange-100 dark:bg-orange-950/40 border border-orange-200 dark:border-orange-800/40 px-3.5 py-1.5 rounded-full text-xs font-medium text-orange-700 dark:text-orange-400">
                    <span>🧙‍♀️</span>
                    <span>Spookachtige Wandel- & Griezeltocht</span>
                </div>

                <!-- Main Heading -->
                <h1 class="font-halloween text-4xl sm:text-5xl lg:text-6xl text-orange-600 dark:text-orange-500 leading-tight uppercase tracking-wide">
                    Een duistere avond vol spanning, griezels én <span class="text-gray-900 dark:text-white block sm:inline">een halloweenfuif</span>
                </h1>

                <!-- Decorative Wavy Line -->
                <div class="w-28 h-1 text-orange-500">
                    <svg viewBox="0 0 100 20" preserveAspectRatio="none" class="w-full h-full fill-none stroke-current stroke-[4]">
                        <path d="M0 10 Q25 0 50 10 T100 10" />
                    </svg>
                </div>

                <!-- Event Description -->
                <p class="text-gray-700 dark:text-slate-300 text-[1.1rem] leading-relaxed">
                    Stip het aan op je kalender: op <strong class="text-orange-500 dark:text-orange-400 font-semibold">zaterdag 31/10/2026</strong> dwaal je door het duistere <strong class="text-gray-900 dark:text-white">Mere</strong>. Een verlicht parcours van &plusmn; 4,5 km vol griezels, sfeer en thema-hapjes, met start en finish in het Vissershof.
                </p>

                <!-- Badges Bar -->
                <div class="flex flex-wrap gap-2.5 pt-2">
                    <div class="bg-gray-100 dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 px-3.5 py-1.5 rounded-lg text-xs text-gray-700 dark:text-slate-300 flex items-center gap-2">
                        <span>📅</span> <span class="text-orange-500 dark:text-orange-400 font-semibold">31/10/2026</span>
                    </div>
                    <div class="bg-gray-100 dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 px-3.5 py-1.5 rounded-lg text-xs text-gray-700 dark:text-slate-300 flex items-center gap-2">
                        <span>📍</span> <span>Vertrek: Vissershof Mere</span>
                    </div>
                    <div class="bg-gray-100 dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 px-3.5 py-1.5 rounded-lg text-xs text-gray-700 dark:text-slate-300 flex items-center gap-2">
                        <span>🚶‍♂️</span> <span>4,5 KM Griezelroute</span>
                    </div>
                    <div class="bg-gray-100 dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800 px-3.5 py-1.5 rounded-lg text-xs text-gray-700 dark:text-slate-300 flex items-center gap-2">
                        <span>👶</span> <span>Kindvriendelijk</span>
                    </div>
                </div>

                <!-- Card Container: What to expect & Pricing -->
                <div class="bg-white dark:bg-[#0d0e21]/90 border border-gray-200 dark:border-slate-800/80 rounded-2xl p-6 sm:p-7 space-y-6 shadow-xl relative overflow-hidden">
                    
                    <!-- Card Header -->
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                            <span>🧙‍♂️</span>
                            <span class="font-halloween text-orange-500 dark:text-orange-400 text-2xl sm:text-3xl tracking-wide uppercase">Wat staat je te wachten?</span>
                        </h2>
                        <span class="bg-emerald-100 dark:bg-emerald-950/60 border border-emerald-200 dark:border-emerald-700/50 text-emerald-700 dark:text-emerald-400 text-xs font-medium px-3 py-1 rounded-full">
                            Inclusief hapjes & drank
                        </span>
                    </div>

                    <!-- Content Description -->
                    <p class="text-gray-700 dark:text-slate-300 text-[0.935rem] leading-relaxed">
                        Langs de route word je ondergedompeld in Halloween-sfeer met thema-hapjes en drankjes, live griezels op het traject en een speciaal kinderspel: vind de 4 griezels en krijg een zak snoep bij de finish. Wie wil, kan na de tocht nog gezellig blijven hangen op de <strong class="text-gray-900 dark:text-white">Halloweenfuif in het Vissershof</strong> (gratis toegang, ook een prijs voor de best verkleede op de fuif!).
                    </p>

                    <!-- Pricing List -->
                    <div class="bg-gray-50 dark:bg-[#090a18] rounded-xl p-4 space-y-3 border border-gray-200 dark:border-slate-800/50">
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2">
                                <span>🎃</span>
                                <span class="font-medium text-gray-900 dark:text-slate-200">Volwassene <span class="text-orange-500 dark:text-orange-400">*</span></span>
                            </div>
                            <span class="font-bold text-orange-500 dark:text-orange-400">€ 15,00 p.p.</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2">
                                <span>🧹</span>
                                <span class="font-medium text-gray-900 dark:text-slate-200">Kind 3–12 jaar <span class="text-orange-500 dark:text-orange-400">*</span></span>
                            </div>
                            <span class="font-bold text-orange-500 dark:text-orange-400">€ 9,00 p.p.</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2">
                                <span>👻</span>
                                <span class="font-medium text-gray-900 dark:text-slate-200">Tot 3 jaar <span class="text-orange-500 dark:text-orange-400">*</span></span>
                            </div>
                            <span class="font-bold text-emerald-600 dark:text-emerald-400">gratis met ouder</span>
                        </div>
                    </div>

                    <!-- Green Discount Box -->
                    <div class="bg-emerald-100 dark:bg-emerald-950/20 border border-emerald-200 dark:border-emerald-800/40 rounded-xl p-4 flex gap-3 text-[0.825rem] text-gray-700 dark:text-slate-300">
                        <span class="text-emerald-600 dark:text-emerald-400 text-base">✅</span>
                        <div class="space-y-1">
                            <p><strong class="text-emerald-600 dark:text-emerald-400">Early bird korting:</strong> Koop je tickets vóór 30 september en krijg 2,50€ (volwassene) of 1€ (kind) korting per ticket.</p>
                            <p><strong class="text-emerald-600 dark:text-emerald-400">Groepskorting:</strong> Koop 10 of meer tickets en krijg automatisch 10% korting (niet cumuleerbaar met andere kortingen).</p>
                        </div>
                    </div>

                    <!-- Orange Warning Box -->
                    <div class="bg-orange-100 dark:bg-orange-950/20 border border-orange-200 dark:border-orange-800/40 rounded-xl p-4 flex gap-3 text-[0.825rem] text-gray-700 dark:text-slate-300">
                        <span class="text-orange-600 dark:text-orange-400 text-base">⚠️</span>
                        <p>
                            <strong class="text-orange-600 dark:text-orange-400">Vooraf inschrijven verplicht!</strong> Er worden geen tickets ter plaatse verkocht, koop ze dus hier op voorhand.
                        </p>
                    </div>

                    <!-- Footnote -->
                    <p class="text-[0.825rem] text-gray-500 dark:text-slate-400 italic">
                        * Alle vermelde prijzen zijn inclusief hapjes, drankjes, extra's en btw.
                    </p>
                </div>

                <!-- Action Button -->
                <div id="tickets" class="pt-2">
                    <button @click="openModal = true" class="w-full sm:w-auto bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold text-lg px-8 py-4 rounded-full shadow-lg shadow-orange-600/30 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-3">
                        <span>Reserveer je Ticket</span>
                        <span>🎟️</span>
                    </button>
                </div>

                <!-- Footer Tip -->
                <p class="text-[0.825rem] text-gray-500 dark:text-slate-400 italic leading-relaxed pt-2">
                    Tip: Neem een zaklamp of hoofdlampje mee en kom verkleed! Zo maak je de beleving compleet en maak je kans op de prijs voor de best verkleede op de fuif.
                </p>

            </section>

            <!-- Right Column: Image Gallery Grid -->
            <section class="lg:col-span-5 grid grid-cols-2 gap-4">
                
                <!-- Main Top Image (Spans 2 Columns) -->
                <div class="col-span-2 relative group overflow-hidden rounded-2xl border border-gray-200 dark:border-slate-800 shadow-xl aspect-[16/9]">
                    <img src="https://images.unsplash.com/photo-1508361001413-7a9dca21d08a?auto=format&fit=crop&w=800&q=80" alt="Halloween Mere witch" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-4">
                        <span class="font-halloween text-orange-400 text-xl tracking-wider">Halloween Mere</span>
                    </div>
                </div>

                <!-- Pumpkin Image (Tall) -->
                <div class="relative group overflow-hidden rounded-2xl border border-gray-200 dark:border-slate-800 shadow-xl aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1509557965875-b88c97052f0e?auto=format&fit=crop&w=600&q=80" alt="Scary Pumpkin" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                </div>

                <!-- Floating Ghosts Image -->
                <div class="relative group overflow-hidden rounded-2xl border border-gray-200 dark:border-slate-800 shadow-xl aspect-square">
                    <img src="https://images.unsplash.com/photo-1509114397022-ed747cca3f65?auto=format&fit=crop&w=600&q=80" alt="Ghosts in woods" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                </div>

                <!-- Spooky Path Image -->
                <div class="relative group overflow-hidden rounded-2xl border border-gray-200 dark:border-slate-800 shadow-xl aspect-square">
                    <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80" alt="Spooky purple path" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                </div>

                <!-- Zombie / Monster Image -->
                <div class="relative group overflow-hidden rounded-2xl border border-gray-200 dark:border-slate-800 shadow-xl aspect-[4/3]">
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=600&q=80" alt="Scary monster" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                </div>

            </section>

            <!-- Alpine.js Reservation Modal (Interactive Feature) -->
            <div x-show="openModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 dark:bg-black/80 backdrop-blur-sm" 
                 x-cloak>
             
                <div @click.away="openModal = false" class="bg-white dark:bg-[#0d0e21] border border-gray-200 dark:border-slate-800 rounded-2xl max-w-md w-full p-6 space-y-4 shadow-2xl relative">
                    <button @click="openModal = false" class="absolute top-4 right-4 text-gray-400 dark:text-slate-400 hover:text-gray-600 dark:hover:text-white">✕</button>
                    
                    <h3 class="font-halloween text-2xl text-orange-600 dark:text-orange-500">Tickets Reserveren</h3>
                    <p class="text-xs text-gray-500 dark:text-slate-300">Kies het aantal tickets voor de Halloweentocht op 31/10/2026.</p>
                    
                    <form class="space-y-4 pt-2" @submit.prevent="alert('Reservering verstuurd!'); openModal = false;">
                        <div>
                            <label class="block text-xs text-gray-500 dark:text-slate-400 mb-1">Naam</label>
                            <input type="text" required class="w-full bg-gray-100 dark:bg-slate-900 border border-gray-300 dark:border-slate-800 rounded-lg px-3 py-2 text-sm text-gray-900 dark:text-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 dark:text-slate-400 mb-1">E-mailadres</label>
                            <input type="email" required class="w-full bg-gray-100 dark:bg-slate-900 border border-gray-300 dark:border-slate-800 rounded-lg px-3 py-2 text-sm text-gray-900 dark:text-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs text-gray-500 dark:text-slate-400 mb-1">Volwassenen (€15)</label>
                                <input type="number" min="0" value="1" class="w-full bg-gray-100 dark:bg-slate-900 border border-gray-300 dark:border-slate-800 rounded-lg px-3 py-2 text-sm text-gray-900 dark:text-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 dark:text-slate-400 mb-1">Kinderen 3-12j (€9)</label>
                                <input type="number" min="0" value="0" class="w-full bg-gray-100 dark:bg-slate-900 border border-gray-300 dark:border-slate-800 rounded-lg px-3 py-2 text-sm text-gray-900 dark:text-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded-lg text-sm transition-colors">
                            Naar betaling
                        </button>
                    </form>
                </div>
            </div>

        </section>
    </main>

    {{-- Alpine.js for modal --}}
    @push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
</x-layouts.app>