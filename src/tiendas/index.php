<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publicaciones de Usuarios</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Poppins', 'Open Sans', 'Helvetica Neue', sans-serif;
    }
  </style>
</head>

<body class="bg-slate-50 dark:bg-slate-900 rounded-lg px-6 py-8 flex justify-center flex-col">
  <h1 class="shadow-lg dark:text-white mb-4 font-bold text-[36px] mx-auto my-4 mb-[40px] bg-white border-2 border-slate-100 dark:bg-slate-800 dark:border-slate-700 w-fit rounded-lg py-3 px-6">
    <span>PUBLICACIONES DE USUARIOS ✨</span>
  </h1>
  <form action="#" method="get" class="flex items-center justify-center gap-6 flex-row mb-6">
    <div>
      <span class="inline-flex items-center justify-center p-2 bg-gradient-to-br from-violet-300 to-indigo-600 rounded-md shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
      </span>
    </div>
    <div>
      <label for="usuarios" class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight hidden">Seleccione un Usuario</label>
      <?php
      include('listarUsuarios.php');
      ?>
    </div>
    <button type="submit" name="submit" class="flex flex-row gap-2 justify-center items-center cursor-pointer text-white bg-gradient-to-b from-blue-400 to-indigo-600 hover:bg-gradient-to-b hover:from-blue-500 hover:to-indigo-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm h-[40px] px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 hover:scale-110 transition-all">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
        <path d="M6.5 9a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0Z" />
        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM9 5a4 4 0 1 0 2.248 7.309l1.472 1.471a.75.75 0 1 0 1.06-1.06l-1.471-1.472A4 4 0 0 0 9 5Z" clip-rule="evenodd" />
      </svg>
      <span>Buscar Publicaciones</span>
    </button>
  </form>
  <div class="flex justify-center items-center flex-col">
    <?php
    include('listarPublicaciones.php');
    ?>
  </div>
</body>

</html>