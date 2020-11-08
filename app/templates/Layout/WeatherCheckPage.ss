<main role="main" class="container main-container">
    <h1>$Title</h1>
    <hr>
    <p>$Content</p>
    <div class="container">
        <% with checkweather() %>
            <h3>$city_name</h3>
            <hr>
            <img src=$icon_link alt="weather icon"><br />
            Weather: $weather_data <br />
            Temp: $temp degC <br />
        <% end_with %>
    </div>
<main role="main" class="container main-container">