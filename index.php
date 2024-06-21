<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather PHP App</title>
  <link rel="stylesheet" href="./output.css">
</head>
<body>
  
  <main class="max-w-full min-h-screen flex items-center justify-center">
    <article class="w-[70%] md:w-[40%] h-[430px] rounded-md shadow-md flex items-center flex-col p-4 space-y-8">
      <h2 class="font-semibold text-xl">Weather App</h2>

      <section class="w-full text-center flex items-center justify-center flex-col">
        <h3 id="place" class="font-bold text-lg underline underline-offset-2"></h3>

        <section>
          <h4 class="capitalize" id="description"></h4>
          <img class="mx-auto" id="icon" src="" alt="" />
          <span class="block" id="temp"></span>
          <span id="feelsLike"></span>
        </section>

      </section>
    </article>
  </main>

  <script defer src="/script.js"></script>
</body>
</html>