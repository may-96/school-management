@if ($errors->any())
    <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        if (!sessionStorage.getItem('errorShown')) {
            const alertBox = document.getElementById('errorAlert');
            alertBox.style.display = 'block';

            setTimeout(() => {
                alertBox.classList.remove('show');
                setTimeout(() => alertBox.remove(), 300);
            }, 3000);

            sessionStorage.setItem('errorShown', 'true');
        }
    </script>
@endif
