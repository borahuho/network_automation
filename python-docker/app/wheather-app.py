import requests
from tkinter import *
import math

lat = "53.1429957"
long = "7.038123"
api_key = "6d576b0129684448a8b5e41b57b4ced4"

def get_weather(api_key, lat, long):
    url = f"https://api.openweathermap.org/data/2.5/weather?lat={lat}&lon={long}&appid={api_key}"

    r = requests.get(url).json()

    temp = r['main']['temp']
    temp = math.floor((temp - 273)) #convert Kelvin -> Celcius
    print(temp, "Graden")

get_weather(api_key, lat, long)