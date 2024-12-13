<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Rating</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Input Rating</h1>

        <!-- Form untuk input rating -->
        <form method="GET" action="{{ route('ratings.create') }}" class="mb-4">
            <!-- Dropdown Penulis -->
            <div class="mb-3">
                <label for="author_id" class="form-label">Pilih Penulis</label>
                <select name="author_id" id="author_id" class="form-select" onchange="this.form.submit()" required>
                    <option value="" disabled {{ !$selectedAuthor ? 'selected' : '' }}>Pilih penulis...</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $selectedAuthor == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        @if ($selectedAuthor)
        <form method="POST" action="{{ route('ratings.store') }}">
            @csrf

            <!-- Dropdown Buku -->
            <div class="mb-3">
                <label for="book_id" class="form-label">Pilih Buku</label>
                <select name="book_id" id="book_id" class="form-select" required>
                    <option value="" selected disabled>Pilih buku...</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Dropdown Rating -->
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="" selected disabled>Pilih rating...</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit Rating</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
        @endif
    </div>
</body>
</html>
