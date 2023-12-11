<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. "/../");
$dotenv->load();

$dotenv->required('APP_NAME')->notEmpty();
$dotenv->required('AMPLITUDE_API_KEY')->notEmpty();

function printForm($id) {
  ?>
  <form id="id_<?php echo $id; ?>" method="get" hx-get="/result.php" hx-trigger="submit" hx-target="#result_<?php echo $id; ?>">
                <div class="flex flex-row xl:gap-9 gap-2">
                  <div class="sm:col-span-2 sm:col-start-1">
                    <div class="mt-2">
                      <input
                        type="number" 
                        placeholder="Client ID"
                        name="cid"
                        id="cid"
                        autocomplete="cid"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                         ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                         focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                         sm:text-sm sm:leading-6 px-2">
                    </div>
                  </div>

                  <div class="sm:col-span-2">
                    <div class="mt-2">
                      <input 
                        type="number" 
                        placeholder="Property ID" 
                        name="property_id" 
                        id="property_id" 
                        autocomplete="property_id" 
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm 
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                        sm:text-sm sm:leading-6 px-2">
                    </div>
                  </div>

                  <div class="sm:col-span-2">
                    <div class="mt-2">
                      <input
                        type="text" 
                        name="device"
                        id="device" 
                        placeholder="Device"
                        autocomplete="device"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                        focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                        sm:text-sm sm:leading-6 px-2">
                    </div>
                  </div>
                  <div class="sm:col-span-2">
                    <div class="mt-2">
                      <input type="submit" name="check" id="check" autocomplete="check" class="block w-full rounded-md border-0 py-1.5 px-4 bg-blue-500 cursor-pointer text-white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div> 
                  <div class="sm:col-span-2">
                    <div class="mt-2">
                      <input 
                      type="reset" 
                      value="Clear"
                      hx-get="/clear.php" hx-trigger="click" hx-target="#result_<?php echo $id; ?>"
                      name="code" id="code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 px-4 bg-gray-700 cursor-pointer text-white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div> 
                  <div class="sm:col-span-2">
                    <div id="result_<?php echo $id; ?>" class="mt-2">
                        
                    </div>
                  </div> 
                </div>
                </form>
  <?php
}
?>
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
    <main class="mx-auto container">
        <div class="flex flex-row justify-center">
            <div class="flex flex-col w-full mx-auto">
                <div class="border mt-4 py-4 rounded-xl w-1/3 mx-auto ">
                    <h1 class="text-4xl font-bold text-center mb-4">Check Feature Flags</h1>
                </div>
                <div class="mx-auto m-10 border p-8 rounded shadow">
                <?php
                
                printForm(1);
                printForm(2);
                printForm(3);
                printForm(4);
                printForm(5);
                ?>
                </div>
                
                
            </div>
    </main>

</body>
</html>
