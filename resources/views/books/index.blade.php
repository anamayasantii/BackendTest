<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Buku</h1>

        <!-- Filter dan Pencarian -->
        <form method="GET" action="{{ route('books.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" placeholder="Cari buku atau penulis" class="form-control" value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <select name="per_page" class="form-select">
                        <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/popular-authors" class="btn btn-success">Popular Authors</a>
                    <a href="/ratings/create" class="btn btn-success">Rate</a>
                </div>
            </div>
        </form>

        <!-- Daftar Buku -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Rating Rata-rata</th>
                    <th>Jumlah Voter</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration + $books->firstItem() - 1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author ? $book->author->name : 'Penulis tidak ditemukan' }}</td>
                        <td>{{ number_format($book->average_rating, 1) }}</td>
                        <td>{{ $book->total_voters }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>

    <!-- Link Bootstrap JS (Opsional untuk interaksi JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
