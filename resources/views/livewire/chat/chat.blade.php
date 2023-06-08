<div class="container mx-auto shadow-lg rounded-lg w-2/3 ">
    <!-- headaer -->
    <div class="px-5 py-5 flex justify-between items-center bg-white border-b-2">
        <div class="font-semibold text-2xl">LaraChat</div>
        <div class="w-1/2">
            <input type="text" name="" id="" placeholder="search IRL"
                class="rounded-2xl bg-gray-100 py-3 px-5 w-full" />
        </div>
        <div>
            @auth
                <x-imageletter :name="auth()->user()->name" />
            @endauth
        </div>
    </div>
    <!-- end header -->
    <!-- Chatting -->
    <div x-data="{ message: '' }" class="flex flex-row justify-between bg-white min-h-[500px]">
        <!-- chat list -->
        <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">
            <!-- search compt -->
            <div class="border-b-2 py-4 px-2">
                <input type="text" placeholder="search chatting"
                    class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full" />
            </div>
            <!-- end search compt -->
            <!-- user list -->
            <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2">
                <div class="w-1/4">
                    <img src="https://source.unsplash.com/_7LbC5J-jw4/600x600"
                        class="object-cover h-12 w-12 rounded-full" alt="" />
                </div>
                <div class="w-full">
                    <div class="text-lg font-semibold">Luis1994</div>
                    <span class="text-gray-500">Pick me at 9:00 Am</span>
                </div>
            </div>

            <div class="flex flex-row py-4 px-2 items-center border-b-2 border-l-4 border-blue-400">
                <div class="w-1/4">
                    <img src="https://source.unsplash.com/L2cxSuKWbpo/600x600"
                        class="object-cover h-12 w-12 rounded-full" alt="" />
                </div>
                <div class="w-full">
                    <div class="text-lg font-semibold">MERN Stack</div>
                    <span class="text-gray-500">Lusi : Thanks Everyone</span>
                </div>
            </div>

            <!-- end user list -->
        </div>
        <!-- end chat list -->
        <!-- message -->
        <div class="w-full px-5 flex flex-col justify-between">
            <div class="flex flex-col-reverse mt-5 max-h-[500px] overflow-auto">
                @auth
                @foreach ($this->messages as $item)
                    {{-- if message is from user logged --}}
                    @if ($item->from->id == auth()->user()->id)
                        <div class="flex justify-end mb-4">
                            <div>
                                <div
                                    class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                                    {{ $item->content }}
                                </div>

                            </div>
                            <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                                class="object-cover h-8 w-8 rounded-full" alt="" />
                        </div>
                    @else
                        <div class="flex justify-start mb-4 ">
                            <x-imageletter :name="$item->from->name" />
                            <div
                                class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                                {{ $item->content }}
                            </div>
                        </div>
                    @endif
                @endforeach
                @endauth
            </div>
            <div class="py-5 flex">
                <input x-model="message" class="w-full bg-gray-300 py-5 px-3 rounded-l-lg" type="text"
                    placeholder="type your message here..." />
                <button  x-on:click="$wire.sendMessage(message)" class="bg-cyan-800 w-32 rounded-r-lg text-white hover:bg-cyan-950"> Send > </button>
            </div>
        </div>

    </div>
</div>
</div>


<script type="module">
Echo.private(`messageschat`)
    .listen('MessageEvent', (e) => {
        console.log(e);
    });
</script>