<!-- resources/views/admin/bundles/approved.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Bundles</title>
</head>
<body>
    <h1>Approved Bundles</h1>

    @if($approvedBundles->isEmpty())
        <p>No approved bundles available.</p>
    @else
        <ul>
            @foreach($approvedBundles as $bundle)
                <li>{{ $bundle->name }} - {{ $bundle->status }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
