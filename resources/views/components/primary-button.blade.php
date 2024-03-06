<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success text-pink-700']) }}>
    {{ $slot }}
</button>
