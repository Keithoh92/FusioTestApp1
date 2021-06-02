<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../fusio.css">
    <title>Edit</title>
</head>
<body>
<div class="db-form">
    <div class="header">
        <h1>Add New/Edit</h1>
    </div>
    <form action="{{ route('add') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="location">ID</label>
            <input type="text" name="id" placeholder="id">
            <span class="text-danger">@error('id'){{ "$message" }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <select class="custom-select" name="counties" id="inputGroupSelect01">
                <option selected>Counties</option>
                <option value="Dublin">Dublin</option>
                <option value="Wexford">Wexford</option>
                <option value="Wicklow">Wicklow</option>
            </select>
            <span class="text-danger">@error('counties'){{ "$message" }} @enderror</span>
        </div>

        <div class="form-group">
            <label class="control-label" for="date">Date</label>
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text">
            <span class="text-danger">@error('date'){{ "$message" }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="min-temp">Min Temp &#176;</label>
            <select class="custom-select" name="min_temp" id="min-temp">
                <?php for($i = -10; $i <= 32; $i++) : ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <span class="text-danger">@error('min_temp'){{ "$message" }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="max-temp">Max Temp &#176;</label>
            <select class="custom-select" name="max_temp" id="max-temp">
                <?php for($i = -10; $i <= 40; $i++) : ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <span class="text-danger">@error('max_temp'){{ "$message" }} @enderror</span>

        </div>

        <div class="form-group">
            <label for="wind-speed-day">Wind Speed (day)</label>
            <select class="custom-select" name="wind_speed_day" id="wind-speed-day">
                <?php for($i = 0; $i <= 80; $i++) : ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <span class="text-danger">@error('wind_speed_day'){{ "$message" }} @enderror</span>

        </div>

        <div class="form-group">
            <label for="wind-dir-day">Wind Direction (day)</label>
            <select class="custom-select" name="wind_dir_day" id="wind_dir_day">
                <option selected>Choose...</option>
                <option value="N">N</option>
                <option value="NNE">NNE</option>
                <option value="NE">NE</option>
                <option value="ENE">ENE</option>
                <option value="NE">E</option>
                <option value="ESE">ESE</option>
                <option value="SE">SE</option>
                <option value="SSE">SSE</option>
                <option value="S">S</option>
                <option value="SSW">SSW</option>
                <option value="SW">SW</option>
                <option value="WSW">WSW</option>
                <option value="W">W</option>
                <option value="WNW">WNW</option>
                <option value="NW">NW</option>
                <option value="NNW">NNW</option>
            </select>
            <span class="text-danger">@error('wind_dir_day'){{ "$message" }} @enderror</span>

        </div>

        <div class="form-group">
            <label for="wind-speed-night">Wind Speed (night)</label>
            <select class="custom-select" name="wind_speed_night" id="wind-speed-night">
                <?php for($i = 0; $i <= 80; $i++) : ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <span class="text-danger">@error('wind_speed_night'){{ "$message" }} @enderror</span>

        </div>

        <div class="form-group">
            <label for="wind-dir-night">Wind Direction (night)</label>
            <select class="custom-select" name="wind_dir_night" id="wind_dir_night">
                <option selected>Choose...</option>
                <option value="N">N</option>
                <option value="NNE">NNE</option>
                <option value="NE">NE</option>
                <option value="ENE">ENE</option>
                <option value="NE">E</option>
                <option value="ESE">ESE</option>
                <option value="SE">SE</option>
                <option value="SSE">SSE</option>
                <option value="S">S</option>
                <option value="SSW">SSW</option>
                <option value="SW">SW</option>
                <option value="WSW">WSW</option>
                <option value="W">W</option>
                <option value="WNW">WNW</option>
                <option value="NW">NW</option>
                <option value="NNW">NNW</option>
            </select>
            <span class="text-danger">@error('wind_dir_night'){{ "$message" }} @enderror</span>

        </div>


        <button type="submit" class="btn btn-primary mb-2">Save</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
</script>


</body>
</html>
