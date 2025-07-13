<div class="ml-40" wire:init="load">

    
    {{-- <div x-data="{ show: @entangle('show') }" class="p-4">
    
    <button wire:click="toggle" class="bg-blue-500 text-white px-4 py-2 rounded">
        Afficher le message
    </button>

    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="mt-4 p-4 bg-green-100 border border-green-300 rounded"
    >
        🎉 Voici un message affiché avec animation !
    </div> --}}
{{-- </div> --}}


<div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)" 
    {{-- class="flex" --}}
    >
    {{-- Image animée --}}
    <div class="flex">
        
            <div
            {{-- x-data="scrollReveal()"
            x-init="observe()"
            x-show="visible" --}}
            x-show="show" 
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="{{-- mb-6 --}}">
            {{-- <img src="/images/ma-photo.jpg" class="w-64 h-auto rounded shadow-lg"> --}}

                    <div class="text-left text-10xl mt-37 border-2 border-blue-100 p-4 text-blue-950 inline-block rounded-full h-15 {{-- bg-[#0037Ba] --}}">
                        {{-- rounded bg-white-600 --}}
                        {{-- "> --}}

                        Build with Precision
                    </div>
                    <div class="  mt-10 font-bold text-7xl text-purple-950">
                        Cool <span class="text-red-500">Buildings:</span> <br>Our Adventure Together
                    </div>

                    {{-- <div class="text-left text-7xl mt-17 text-purple-950 font-bold
                                ">
                        
                    </div> --}}
            </div>

        {{-- Paragraphe animé --}}
        <div
            {{-- x-data="scrollReveal()"
            x-init="observe()"
            x-show="visible" --}}
            x-show="show"
            x-transition:enter="transition ease-in-out duration-1000 delay-200"
            x-transition:enter-start="opacity-0 translate-y-5"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="{{-- text-gray-700 text-lg --}}">
            {{-- <p>
                Bienvenue sur ma page ! Ce contenu apparaît avec une belle animation après le chargement.
            </p> --}}
        </div>

        <div
        {{-- x-data="scrollReveal()"
        x-init="observe()"
        x-show="visible" --}}
        x-show="show"
            x-transition:enter="transition ease-in-out duration-1000 delay-200"
            x-transition:enter-start="opacity-0 translate-x-7"
            x-transition:enter-end="opacity-100 translate-x-10"
            class="mt-37">
            <img src="{{ asset('storage/photos/file2.png') }}" alt="Photo">

</div>
    
    </div>
        <div class="flex items-center justify-center">
            <div
            {{-- x-data="scrollReveal()"
            x-init="observe()"
            x-show="visible" --}}
            x-show="show"
            x-transition:enter="transition ease-in-out duration-1000 delay-200"
            x-transition:enter-start="opacity-0 translate-x-7"
            x-transition:enter-end="opacity-100 translate-x-10"
            class="inline-block"
            >
            <img src="{{ asset('storage/photos/maison.png') }}" alt="Photo">

            </div>
            <div class="{{-- flex --}} items-center justify-center inline-block">
                <div
                {{-- x-data="scrollReveal()"
                x-init="observe()"
                x-show="visible" --}}
                x-show="show"
                x-transition:enter="transition ease-in-out duration-1000 delay-200"
                x-transition:enter-start="opacity-0 translate-x-7"
                x-transition:enter-end="opacity-100 translate-x-10"
                class=""
                >
                <img src="{{ asset('storage/photos/maison.png') }}" alt="Photo">

                </div>
            </div>
    


    </div>

</div>





{{-- 
<script>
    function scrollReveal() {
        return {
            visible: false,
            observe() {
                const observer = new IntersectionObserver(
                    (entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                this.visible = true;
                                observer.unobserve(entry.target);
                            }
                        });
                    },
                    { threshold: 0.1 }
                );
                observer.observe(this.$el);
            }
        }
    }
</script> --}}