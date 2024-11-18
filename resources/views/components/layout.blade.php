<!-- resources/views/components/layout.blade.php -->
<div class="app-container">
    <header>
        <h1>My Application</h1>
        <!-- You can add more header content here -->
    </header>

    <main>
        <!-- Content passed in the $slot will be inserted here -->
        {{ $slot }}
    </main>

    <footer>
        <!-- Footer content -->
        <p>Footer goes here</p>
    </footer>
</div>
