<?php
if (isset($_GET['submit'])) {
  $user_id = $_GET["usuarios"];

  if ($user_id !== "N/A") {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://gorest.co.in/public/v2/users/{$user_id}/posts",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } elseif (empty(json_decode($response))) {
      echo '<h3 class="flex flex-row gap-2 justify-center items-center text-white bg-blue-500 mb-4 font-bold text-lg py-2 px-6 rounded-lg">';
      echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>';
      echo '<span>ESTE USUARIO NO TIENE PUBLICACIONES</span>';
      echo '</h3>';
      echo '<img src="images/nope.png" alt="sin_publicaciones_splash_img" class="h-[300px]">';
    } else {
      $publicaciones = json_decode($response);
?>
      <h3 class="dark:text-white mb-4 font-bold text-xl flex flex-row gap-2 justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <span>TODOS LOS POSTS DE - <?= $user_id ?></span>
      </h3>
      <div class="relative overflow-x-auto mx-24">
        <table id="publicaciones" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="border-[1.5px] border-slate-200 dark:border-slate-600">
              <th class="px-6 py-3">ID</th>
              <th class="px-6 py-3">TITULO</th>
              <th class="px-6 py-3">CUERPO</th>
            </tr>
          </thead>

          <tbody>
            <?php
            foreach ($publicaciones as $publicacion) {
            ?>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> <?= $publicacion->id ?> </th>
                <td class="px-6 py-4"> <?= $publicacion->title ?> </td>
                <td class="px-6 py-4"> <?= $publicacion->body ?> </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    <?php
    }
  } else {
    echo '<h3 class="flex flex-row gap-2 justify-center items-center text-white bg-rose-500 mb-4 font-bold text-lg py-2 px-6 rounded-lg">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>';
    echo '<span>POR FAVOR SELECCIONE UN USUARIO VALIDO</span>';
    echo '</h3>';
    echo '<img src="images/error.png" alt="error_de_entrada_splash_img" class="h-[300px]">';
  }
} else {
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://gorest.co.in/public/v2/posts",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $publicaciones = json_decode($response);
    ?>
    <h3 class="dark:text-white mb-4 font-bold text-xl flex flex-row gap-2 justify-center items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
      </svg>
      <span>TODOS LOS POSTS</span>
    </h3>
    <div class="relative overflow-x-auto mx-24">
      <table id="publicaciones" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr class="border-[1.5px] border-slate-200 dark:border-slate-600">
            <th class="px-6 py-3">ID</th>
            <th class="px-6 py-3">USUARIO</th>
            <th class="px-6 py-3">TITULO</th>
            <th class="px-6 py-3">CUERPO</th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($publicaciones as $publicacion) {
          ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> <?= $publicacion->id ?> </th>
              <td class="px-6 py-4"> <?= $publicacion->user_id ?> </td>
              <td class="px-6 py-4"> <?= $publicacion->title ?> </td>
              <td class="px-6 py-4"> <?= $publicacion->body ?> </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
<?php
  }
}
?>