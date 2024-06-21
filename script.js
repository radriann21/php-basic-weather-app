document.addEventListener('DOMContentLoaded', () => {

  if (navigator.geolocation) {

    navigator.geolocation.getCurrentPosition((position) => {

      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;

      fetch('process_location.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'json/application'
        },
        body: JSON.stringify({
          latitude,
          longitude
        })
      })
      .then(response => response.json())
      .then(data => {
        displayWeatherData(data)
      })
    })
  } else {
    alert('No hay geolocalización disponible!')
  }
})

function displayWeatherData(data) {

  const $ = selector => document.getElementById(selector); // helper
  
  const place = $('place');
  const description = $('description');
  const icon = $('icon');
  const temperature = $('temp');
  const feelsLike = $('feelsLike');

  const { name, weather, main, sys } = data   

  let transformedTemp = main.temp - 273.15;
  let transformedFeelsLike = main.feels_like - 273.15;

  place.innerHTML = `${name} - ${sys.country}`;
  description.innerHTML = weather[0].description;
  icon.src = `https://openweathermap.org/img/wn/${weather[0].icon}.png`;
  temperature.innerHTML = `Temperature: ${transformedTemp.toFixed(2)}ºC`;
  feelsLike.innerHTML = `Feels Like: ${transformedFeelsLike.toFixed(2)}ºC`;
}