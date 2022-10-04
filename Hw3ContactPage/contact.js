function activities() {
    var array, checkbox = '';
    var content;
    var array1 = ["City Tours", "Sports", "Cycling", "Museums", "Boating"];
    var array2 = ["Museums", "Sailing", "Beach", "Hiking", "Boating"];
    var array3 = ["Museums", "Theatre", "Parks and Recreation", "City Tours"];
    var array4 = ["Parks and Recreation", "Beaches", "Boating", "Snorkeling"];
    var label = '<label class="bold">Activities:</label>';

    var activities = document.getElementById('activities');
    var destinations = document.getElementById('destinations').value;
    if (destinations == "New Zealand") {
        array = array1;
    } else if (destinations == "Maldives, South Asia") {
        array = array2;
    } else if (destinations == "Venice, Italy") {
        array = array3;
    } else if (destinations == "Cacun") {
        array = array4;
    }

    for (let i = 0; i < array.length; i++) {
        checkbox += "<label><input type='checkbox' name='activities[]' value='" + array[i] + "'> " + array[i] + "</label>";

    }
    content = label + checkbox;
    activities.innerHTML = content;
    activities.style.display = "block";
}