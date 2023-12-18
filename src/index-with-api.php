<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amplitude Feature Flags</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.9" integrity="sha384-QFjmbokDn2DjBjq+fM+8LUIVrAgqcNW2s0PjAxHETgRn9l4fvX31ZxDxvwQnyMOX" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="bg-indigo-600 shadow shadow-black">
        <div class=" flex flex-row mx-auto container text-center">
            <a href="/" class="text-white p-4 text-2xl text-bold">Feature Flag Demo</a>
        </div>
    </nav>
    <main class="mx-auto lg:container">
        <div class="flex flex-row justify-center">
            <div class="flex flex-col w-full mx-auto max-lg:m-8">
                <div class="border mt-4 py-4 rounded-xl xl:w-1/3 w-2/3 mx-auto ">
                    <h1 class="text-4xl font-bold text-center mb-4">Check Feature Flags</h1>
                </div>
                <div class="mx-auto m-10 border p-4 rounded shadow divide-y">
                  <div hx-get="/with-api/row.php" hx-trigger="load" hx-target="this" class="py-4">Loading</div>
                  <div hx-get="/with-api/row.php" hx-trigger="load" hx-target="this" class="py-4">Loading</div>
                  <div hx-get="/with-api/row.php" hx-trigger="load" hx-target="this" class="py-4">Loading</div>
                  <div hx-get="/with-api/row.php" hx-trigger="load" hx-target="this" class="py-4">Loading</div>
                  <div hx-get="/with-api/row.php" hx-trigger="load" hx-target="this" class="py-4">Loading</div>
                 
                </div>   
            </div>
    </main>
</body>
</html>