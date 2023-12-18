<?php
    // Create a random hex id for the form to avoid conflicts
    $id = bin2hex(random_bytes(5));
?>
<form id="id_<?php echo $id; ?>" method="get" hx-get="/result.php" hx-trigger="submit" hx-target="#result_<?php echo $id; ?>">
                <div class="flex flex-row justify-between xl:gap-9 gap-2">
                <div class="sm:col-span-2 sm:col-start-1">
                  <div class="mt-2 p-1" title="Evaluate Locally">
                      <input
                        type="checkbox" 
                        placeholder="Local Evaluation"
                        name="local"
                        id="local"
                        value="1"
                        autocomplete="local"
                        class="block w-full rounded-full text-gray-900 shadow-sm
                          
                         w-6 h-6
                         sm:text-sm sm:leading-6">
                    </div>
                  </div>  
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
                      <input type="submit" value="Check 🎁" name="check" id="check" autocomplete="check" 
                      class="block w-full border-0 py-1.5 px-4 bg-gray-100 cursor-pointer text-gray-800 
                      shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                      focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6
                      rounded-full">
                    </div>
                  </div> 
                  <div class="sm:col-span-2">
                    <div class="mt-2">
                      <input 
                      type="reset" 
                      value="♻ Clear"
                      hx-get="/clear.php" hx-trigger="click" hx-target="#result_<?php echo $id; ?>"
                      name="code" id="code" autocomplete="postal-code" class="block w-full rounded-full border-0 py-1.5 
                      px-4 bg-gray-100 cursor-pointer text-gray-600 shadow-sm ring-1 ring-inset 
                      ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                       focus:ring-indigo-600 sm:text-md sm:leading-6">
                    </div>
                  </div> 
                  <div class="sm:col-span-2">
                  
                    <div id="result_<?php echo $id; ?>" class="mt-2 mt-2 sm:w-48 border-b text-center">
                        <?php
                        require __DIR__ . '/clear.php';
                        ?>
                    </div>
                  
                  </div> 
                </div>
                </form>