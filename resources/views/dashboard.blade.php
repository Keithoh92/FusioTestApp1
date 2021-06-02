<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../fusio.css">
    <title>Dashboard</title>
</head>
<body>
<div class="header">
    <h1>Dashboard</h1>
</div>
@include('header')

<div class="search-bar">
    <input type="text" onkeyup="myFunction()" name="search-b" id="search-b" placeholder="search">
</div>
{{-- Insert Table   --}}
<div class="table-responsive">
    <table class="table table-striped table-sm" id="mytable">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="d-none">Location</th>
                <th scope="col" onclick="sortTable(0)">Location</th>
                <th scope="col" onclick="sortTable(1)">Date</th>
                <th scope="col" onclick="sortTable(2)">Min Temp</th>
                <th scope="col" onclick="sortTable(3)">Max Temp</th>
                <th scope="col" onclick="sortTable(4)">Wind Speed (day)</th>
                <th scope="col" onclick="sortTable(5)">Wind Direction(day)</th>
                <th scope="col" onclick="sortTable(6)">Wind Speed(night)</th>
                <th scope="col" onclick="sortTable(7)">Wind Direction(night)</th>
                <th scope="col" onclick="sortTable(8)">action</th>
            </tr>
            @foreach($forecasts as $item)
            <tr class="table-items">
                <td class="d-none">{{$item['forecast_id']}}</td>
                <td>{{$item['location']}}</td>
                <td>{{$item['date']}}</td>
                <td>{{$item['min_temp']}}</td>
                <td>{{$item['max_temp']}}</td>
                <td>{{$item['wind_speed']}}</td>
                <td>{{$item['wind_dir']}}</td>
                <td>{{$item['wind_speed_night']}}</td>
                <td>{{$item['wind_dir_night']}}</td>
                <td>
                    <a href={{"edit/".$item['forecast_id']}}>Edit</a>
                    <a href={{"delete/".$item['forecast_id']}}>Delete</a>
                </td>
            </tr>
            @endforeach
        </thead>
    </table>
</div>

{{--  Insert DB entry form  --}}
@include('edit')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("mytable");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Each time a switch is done, increase this count by 1:
                switchcount ++;
            } else {
                /* If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search-b");
        filter = input.value.toUpperCase();
        table = document.getElementById("mytable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</body>
</html>

