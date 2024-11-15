<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center text-gray-600 mb-8">Weather Application</h1>
        
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-1 duration-300">
            <div class="p-6">
                <!-- Search Form -->
                <form action="{{ route('getWeather') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <input type="text" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-300" placeholder="Enter city name" required autocomplete="off">
                    
                    <div class="flex gap-4">
                        <button type="submit" class="flex-1 bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition duration-300">Get Weather</button>
                        
                        <button type="button" onclick="resetWeather()" class="flex-1 bg-gray-300 text-gray-700 font-semibold py-2 rounded-lg hover:bg-gray-400 transition duration-300">Reset</button>
                    </div>
                </form>

                <!-- Display Errors -->
                @if ($errors->any())
                    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative ">
                        <strong class="font-bold">Error:</strong>
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                @endif

                <!-- Weather Data Display -->
                @if (isset($weatherData))
                <div id="weatherData" class="mt-6 border p-6 rounded-lg text-gray-700 animate-fade-in">
                    <h2 class="text-2xl font-semibold text-center text-blue-700 mb-4">Weather in <span class="text-red-500 capitalize">{{ $city }}</span></h2>
                    
                    <table class="w-full text-left rounded border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2 bg-blue-200 font-semibold text-gray-700">Value</th>
                                <th class="border px-4 py-2 bg-blue-200 font-semibold text-gray-700">Parameter</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Temperature</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $weatherData['main']['temp'] }} °C</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Humidity</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $weatherData['main']['humidity'] }}%</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Wind Speed</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $weatherData['wind']['speed'] }} m/s</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Description</td>
                                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($weatherData['weather'][0]['description']) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Min Temperature</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $weatherData['main']['temp_min'] }} °C</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Max Temperature</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $weatherData['main']['temp_max'] }} °C</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function resetWeather() {
            // Hide the weather data display
            document.getElementById('weatherData')?.remove();
        }
    </script>
</body>
</html>
