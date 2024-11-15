<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather');
    }

    public function getWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255',
        ]);

        $city = $request->input('city');
        $apiKey = env('OPENWEATHER_API_KEY');
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        $response = Http::get($url);
        $weatherData = $response->json();

        if ($response->failed() || !isset($weatherData['main'])) {
            return redirect('/')->withErrors(['msg' => 'Unable to fetch weather data. Please try again.']);
        }

        return view('weather', [
            'weatherData' => $weatherData,
            'city' => $city
        ]);
    }
}
