<div class="dropbut"><a {{ $attributes->merge(['class' => 'background block w-full px-4 py-2 text-left text-sm leading-5 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>{{ $slot }}</a></div>

<style>
    .background {
        background-color: #f7c66d;
        color: #7F4E0E;
        font-size: 6vw;
    }

    .dropbut {
        padding: 10px;
    }
</style>
