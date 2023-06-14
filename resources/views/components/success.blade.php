<footer>
    @if(session()->has('success'))
        <div class="text-success">
            <p>{{ session('success') }}</p>
        </div>
   @endif
</footer>
