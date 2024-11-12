<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://gorest.co.in/public/v2/users",
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
  $usuarios = json_decode($response);
?>
  <select name="usuarios" id="users" for="usuarios" class="cursor-pointer block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="N/A" class="cursor-pointer">SELECCIONE UN USUARIO</option>
    <?php
    foreach ($usuarios as $usuario) {
    ?>
      <option value="<?= $usuario->id ?>" class="cursor-pointer"><?= $usuario->name ?></option>
    <?php
    }
    ?>
  </select>
<?php
}
?>